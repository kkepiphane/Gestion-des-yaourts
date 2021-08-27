<?php

require_once '../db/bdd.php';
class ModelCommande
{
    public function addCommande($ref_com, $dateCom, $livraison, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO commande(reference_commande, date_com, livraison, user_create, dateCreate) VALUES (?,?,?,?,?)");
            $executCom = $query->execute(array($ref_com, $dateCom, $livraison, $user_create, $date_create));
            return $executCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function dernierAddCom()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande ORDER BY id_com DESC LIMIT 0,1");
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
    //Non Livré
    public function getAllCommandes()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT *, COUNT(prod_commande.id_comma_pro) AS comptDate FROM commande, produits, prod_commande WHERE prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod AND livraison like '%non_livre%' GROUP BY id_com");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Livré ou non livré
     */
    public function getAllCommandeliv()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT *, COUNT(prod_commande.id_comma_pro) AS comptDate FROM commande, produits, prod_commande WHERE prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod GROUP BY id_com");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
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
            $query = $db->prepare("SELECT *, COUNT(distribu_com.id_com_liv) AS comptDate FROM commande, distribu_com,clients WHERE distribu_com.id_com_liv  = commande.id_com AND distribu_com.id_clt = clients.id_client AND livraison like '%livre%' GROUP BY id_com");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Produit livré à un client
     */
    public function getProLiv($idProCleint)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, distribu_com,clients, prod_commande,produits WHERE prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod  AND distribu_com.id_com_liv  = commande.id_com AND distribu_com.id_clt = clients.id_client AND distribu_com.id_clt = ? AND livraison like '%livre%' GROUP BY id_com");
            $query->execute(array($idProCleint));
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Facture des client
     */
    public function getidCltCom($idClientCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, distribu_com,clients WHERE distribu_com.id_com_liv  = commande.id_com AND distribu_com.id_clt = clients.id_client AND distribu_com.id_clt = ? AND commande.livraison like '%livre%'");
            $query->execute(array($idClientCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getidCltFac($idClientCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, distribu_com,clients WHERE distribu_com.id_com_liv  = commande.id_com AND distribu_com.id_clt = clients.id_client AND distribu_com.id_clt = ? AND commande.livraison like '%livre%'");
            $query->execute(array($idClientCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function commandeDetail($idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande WHERE id_com=?");
            $query->execute(array($idCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateCommande($idCom, $refCom, $dateCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE commande SET reference_commande =?, date_com = ? WHERE id_com = '" . $idCom . "'");
            $executCom = $query->execute(array($refCom, $dateCom));
            return $executCom;
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

    public function addLivraisonCommande($idCom, $clt, $idlivreur, $dateLiv, $datePai)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO distribu_com(id_com_liv, id_clt, id_livreurCom, date_livraison,date_paiment_com) VALUES (?,?,?,?,?)");
            $executCom = $query->execute(array($idCom, $clt, $idlivreur, $dateLiv, $datePai));
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
