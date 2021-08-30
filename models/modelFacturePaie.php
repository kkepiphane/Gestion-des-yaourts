<?php

require_once '../db/bdd.php';
class ModelFacturePaie
{
    public function addFactCommande($designFact, $idComFact, $idFactClient, $datePaie, $etatPaie, $userCreate, $dateCreate)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO fact_com_paie(designation_paie, id_com_fact, id_fact_client,date_FactPaie,etat_paiment, user_create,date_create) VALUES (?,?,?,?,?,?,?)");
            $executPaie = $query->execute(array($designFact, $idComFact, $idFactClient, $datePaie, $etatPaie, $userCreate, $dateCreate));
            return $executPaie;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * La facturation des produit pour la distribution
     */
    public function addFactDistribution($designFact, $idComFact, $idFactClient, $datePaie, $etatPaie, $userCreate, $dateCreate)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO fact_dis_paie(designationPaie, dateFactDis, id_dis,id_client_dis,etat_paie, user_create,date_create) VALUES (?,?,?,?,?,?,?)");
            $executPaie = $query->execute(array($designFact, $idComFact, $idFactClient, $datePaie, $etatPaie, $userCreate, $dateCreate));
            return $executPaie;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getClientIDN($IDClicli)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distribu_com, clients, commande WHERE distribu_com.id_com_liv = commande.id_com AND  distribu_com.id_clt = clients.id_client AND distribu_com.id_com_liv = ? ");
            $query->execute(array($IDClicli));
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getClientDATE($IDClicli)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distribu_com, clients, commande WHERE distribu_com.id_com_liv = commande.id_com AND  distribu_com.id_clt = clients.id_client AND distribu_com.id_com_liv = ? ");
            $query->execute(array($IDClicli));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Livré
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
     * Clients 
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
    public function getAllFacturePaies()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_paie ORDER BY nom_four");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function idFacturePaie($idFacPaie)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_paie WHERE id_fact=?");
            $query->execute(array($idFacPaie));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateFactCom($idPaieCom, $designFact, $idComFact, $idFactClient, $datePaie, $etatPaie)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE fact_com_paie SET designation_paie = ?, id_com_fact = ?, id_fact_client = ?, date_FactPaie = ?, etat_paiment = ? WHERE id_fact = '" . $idPaieCom . "'");
            $updateFactCom = $query->execute(array($designFact, $idComFact, $idFactClient, $datePaie, $etatPaie));
            return $updateFactCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteFacturePaie($idPaie)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM fact_com_paie WHERE id_fact=?");
            $delFacPaie = $query->execute(array($idPaie));
            return $delFacPaie;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
