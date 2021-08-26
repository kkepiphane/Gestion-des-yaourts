<?php

require_once '../db/bdd.php';
class ModelCommande
{
    public function addCommande($ref_com, $dateCom, $idClt, $livraison, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO commande(reference_commande, date_com, id_clt, livraison, user_create, dateCreate) VALUES (?,?,?,?,?,?)");
            $executCom = $query->execute(array($ref_com, $dateCom, $idClt, $livraison, $user_create, $date_create));
            return $executCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function dernierAddCom()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, clients WHERE commande.id_clt = clients.id_client ORDER BY id_com DESC LIMIT 0,1");
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function addComPro($idCom, $idComn, $iQuant)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO prod_commande(id_comma_pro, id_produit_com, quantite_com) VALUES (?,?,?)");
            $executCom = $query->execute(array($idCom, $idComn, $iQuant));
            return $executCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getAllCommandes()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT *, COUNT(prod_commande.id_comma_pro) AS comptDate FROM commande, produits, clients, prod_commande WHERE prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod AND commande.id_clt = clients.id_client AND livraison like '%non_livre%' GROUP BY id_com");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function commandeDetail($idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, produits, clients WHERE commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND id_com=?");
            $query->execute(array($idCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateCommande($idCom, $refCom, $dateCom, $idPro, $quantit, $idClt)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE commande SET reference_commande =?, date_com = ?, id_pro = ?, quantite =?, id_clt=? WHERE id_com = '" . $idCom . "'");
            $executIngrediant = $query->execute(array($refCom, $dateCom, $idPro, $quantit, $idClt));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteCommande($idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM prod_commande WHERE id_prd_q_com=?");
            $delCom = $query->execute(array($idCom));
            return $delCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * récupération des information pour la livraison
     */
    public function getAllCommandeForLiv()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande WHERE livraison like '%non_livre%'");
            $query->execute();
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * Partie concernant la livraison des produits par des livreurs
     * 
     */

    public function addLivraisonCommande($idCom, $idlivreur, $dateLiv, $datePai)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO distribu_com(id_com_liv, id_livreurCom, date_livraison,date_paiment_com) VALUES (?,?,?,?)");
            $executCom = $query->execute(array($idCom, $idlivreur, $dateLiv, $datePai));
            return $executCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateLivraisonCom($idCom, $livraison)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE commande SET livraison = ? WHERE id_com = '" . $idCom . "'");
            $upLivraison = $query->execute(array($livraison));
            return $upLivraison;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
