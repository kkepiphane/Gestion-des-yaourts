<?php

require_once '../db/bdd.php';
class ModelFacturePaie
{
    public function addFactCommande($designFact, $idComFactDis, $userCreate, $dateCreate)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO fact_com_paie(designation_paie, id_DisCom_fact, user_create,date_create) VALUES (?,?,?,?)");
            $executPaie = $query->execute(array($designFact, $idComFactDis, $userCreate, $dateCreate));
            return $executPaie;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * La facturation des produit pour la distribution
     */
    public function addFactDistribution($designFact, $idLineDis, $userCreate, $dateCreate)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO fact_dis_paie(designationPaie, id_dis_line, user_create,date_create) VALUES (?,?,?,?)");
            $executPaie = $query->execute(array($designFact, $idLineDis, $userCreate, $dateCreate));
            return $executPaie;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Récupération des clients qui sont lié la commande
     */
    public function getClientIDN($IDClicli)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distribu_com, clients, commande WHERE distribu_com.id_com_liv = commande.id_com AND  distribu_com.id_clt = clients.id_client AND distribu_com.id_com_liv = ? AND etat_paiement LIKE '%non_payer%'");
            $query->execute(array($IDClicli));
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Récupération d'un id de distribution par commande
     */
    public function getIdDisCommm($idComm, $IDClicli)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distribu_com, clients, commande WHERE distribu_com.id_com_liv = commande.id_com AND  distribu_com.id_clt = clients.id_client AND distribu_com.id_com_liv = ? AND distribu_com.id_clt = ?");
            $query->execute(array($idComm, $IDClicli));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Récupération de la date des clients
     */
    public function getClientDATE($IDClicli)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distribu_com, clients, commande WHERE distribu_com.id_com_liv = commande.id_com AND  distribu_com.id_clt = clients.id_client AND distribu_com.id_com_liv = ? AND etat_paiement LIKE '%non_payer%'");
            $query->execute(array($IDClicli));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Livré et Non payé
     */
    public function getAllLivr()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT *, COUNT(distribu_com.id_com_liv) AS comptDate FROM commande, distribu_com,clients WHERE distribu_com.id_com_liv  = commande.id_com AND distribu_com.id_clt = clients.id_client AND livraison like '%livre%' AND etat_paiement LIKE '%non_payer%' GROUP BY id_com");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * La liste des distributions qui sont pas encore payé
     */
    public function getAllDistributions()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT *, COUNT(idDis) AS comId FROM distributions, livreur, clients, distribu_produit WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client AND distribu_produit.id_distribu  = distributions.idDis AND etat_paie_Dis LIKE '%non_payer%' GROUP BY idDis");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getDateDis($disDate)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, livreur, clients, distribu_produit WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client AND distribu_produit.id_distribu  = distributions.idDis AND idDis = ?");
            $query->execute(array($disDate));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * Modification d un etat si le client à payer ou pas
     */
    public function updFactComm($idDistriCom, $datePaie, $etatPaie)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE distribu_com SET date_paiment_com = ?, etat_paiement = ? WHERE id_dis_com  = '" . $idDistriCom . "'");
            $updateFactCom = $query->execute(array($datePaie, $etatPaie));
            return $updateFactCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updFactDisss($idDisLine, $datePaieLine, $etatPaieLine)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE distributions SET date_paiment = ?, etat_paie_Dis = ? WHERE idDis  = '" . $idDisLine . "'");
            $updateFactCom = $query->execute(array($datePaieLine, $etatPaieLine));
            return $updateFactCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * Affichage des factures pour les commandes
     */


    public function FactureCommandeHead($idFactCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM  distribu_com,clients, fact_com_paie WHERE distribu_com.id_clt = clients.id_client AND fact_com_paie.id_DisCom_fact = distribu_com.id_dis_com  AND distribu_com.id_dis_com = ?");
            $query->execute(array($idFactCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function FactureCommandeBody($idFactCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM  distribu_com,commande, prod_commande,produits WHERE prod_commande.id_comma_pro  = commande.id_com  AND prod_commande.id_produit_com  = produits.id_prod AND distribu_com.id_com_liv = commande.id_com AND distribu_com.id_dis_com = ?");
            $query->execute(array($idFactCom));
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * Affichage des factures pour les distributions
     */

    public function factureDistributionDirectH($disH)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, clients, fact_dis_paie WHERE fact_dis_paie.id_dis_line  = distributions.idDis  AND  distributions.idClient = clients.id_client AND distributions.idDis  =? ");
            $query->execute(array($disH));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function factureDistributionDirectB($disBdy)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, clients, distribu_produit, produits WHERE  distributions.idClient = clients.id_client AND distribu_produit.id_distribu  = distributions.idDis AND distribu_produit.idProduits_dis = produits.id_prod  AND distributions.idDis  = ?");
            $query->execute(array($disBdy));
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
