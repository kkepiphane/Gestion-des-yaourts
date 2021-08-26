<?php

require_once '../db/bdd.php';
class ModelDistribution
{
    public function addDistibution($dateDis, $datePai, $idLivreur, $client, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO distributions(date_livraison, date_paiment, id_livreur,idClient, user_create, dateCreate) VALUES (?,?,?,?,?,?)");
            $executDis = $query->execute(array($dateDis, $datePai, $idLivreur, $client, $user_create, $date_create));
            return $executDis;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function addDisProduit($idDistri, $idProduit, $quantitePro)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO distribu_produit(id_distribu, idProduits_dis, quantite_venduPro) VALUES (?,?,?)");
            $executDis = $query->execute(array($idDistri, $idProduit, $quantitePro));
            return $executDis;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getDerniersIdDis()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, livreur, clients WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client ORDER BY idDis DESC LIMIT 0,1");
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
            $query = $db->prepare("SELECT * FROM distributions, livreur, clients WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client");
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
            $query = $db->prepare("SELECT * FROM distributions, livreur, clients WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client AND idDis=?");
            $query->execute(array($idCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateDistribution($idDis, $dateDis, $datePai, $idLivreur, $idClient)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE distributions SET date_livraison = ?, date_paiment = ?, id_livreur =?, idClient=? WHERE idDis = '" . $idDis . "'");
            $executIngrediant = $query->execute(array($dateDis, $datePai, $idLivreur, $idClient));
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
    public function updateProd($idProd, $Quantite)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE produits SET quantite_pro = ? WHERE id_prod = '" . $idProd . "'");
            $upLivraison = $query->execute(array($Quantite));
            return $upLivraison;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Fonction pour la modification des livraison en livré si la quantité égal à 0
     */
    public function updateLivraisonDis($idProd, $livraison)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE produits SET niveauPro = ? WHERE id_prod = '" . $idProd . "'");
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
            $query = $db->prepare("SELECT * FROM commande, produits, clients WHERE commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND id_com=?");
            $query->execute(array($idCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
