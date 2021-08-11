<?php

require_once '../db/bdd.php';
class ModelDistribution
{
    public function addDistibution($dateDis, $datePai, $idLivreur, $idCom, $quantit, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO distributions(date_livraison, date_paiment, id_livreur, idCommande,quantite_venduPro, user_create, dateCreate) VALUES (?,?,?,?,?,?,?)");
            $executCom = $query->execute(array($dateDis, $datePai, $idLivreur, $idCom, $quantit, $user_create, $date_create));
            return $executCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function addDisSeconde($dateDis, $datePai, $idLivreur, $idClt, $prod, $quantit, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO distributions(date_livraison, date_paiment, id_livreur, idClient, idProduit ,quantite_venduPro, user_create, dateCreate) VALUES (?,?,?,?,?,?,?,?)");
            $executCom = $query->execute(array($dateDis, $datePai, $idLivreur, $idClt, $prod, $quantit, $user_create, $date_create));
            return $executCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getDistibution()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, commande, produits, clients,yaourt, type_yaout WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND livraison like '%non_livre%' ORDER BY idDis DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllDistributions()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, commande, produits, clients, yaourt, type_yaout WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND livraison like '%non_livre%' ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function detailDistribution($idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, commande, produits, clients, yaourt, type_yaout WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND idDis=?");
            $query->execute(array($idCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateDistribution($idDis, $dateDis, $datePai, $idLivreur, $idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE distributions SET date_livraison = ?, date_paiment = ?, id_livreur =?, idCommande=? WHERE idDis = '" . $idDis . "'");
            $executIngrediant = $query->execute(array($dateDis, $datePai, $idLivreur, $idCom));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteDistibution($idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM distributions WHERE idDis=?");
            $delCom = $query->execute(array($idCom));
            return $delCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateCom($idCom, $Quantite)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE commande SET quantite = ? WHERE id_com = '" . $idCom . "'");
            $upLivraison = $query->execute(array($Quantite));
            return $upLivraison;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Fonction pour la modification des livraison en livré si la quantité égal à 0
     */
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
    /**
     * Vérification des commandes avec un id pour faire la modification apres quantité et livraison
     */
    public function commandeVerification($idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, produits, clients, yaourt, type_yaout WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND id_com=?");
            $query->execute(array($idCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
