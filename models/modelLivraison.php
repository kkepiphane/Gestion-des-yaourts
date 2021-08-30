<?php

require_once '../db/bdd.php';
class ModelDistribution
{
    public function addDistibution($ref_dis, $dateDis, $datePai, $idLivreur, $client, $etatDis, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO distributions(ref_dis, date_livraison, date_paiment, id_livreur, idClient, etat_paie_Dis, user_create, dateCreate) VALUES (?,?,?,?,?,?,?,?)");
            $executDis = $query->execute(array($ref_dis, $dateDis, $datePai, $idLivreur, $client, $etatDis, $user_create, $date_create));
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
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getID_clientDis($ID_dis)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, livreur, clients WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client AND idDis = ?");
            $query->execute(array($ID_dis));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getBon_DisID($ID_dis)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, livreur, clients, distribu_produit, produits WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client AND distribu_produit.id_distribu  = distributions.idDis AND distribu_produit.id_distribu = ? AND distribu_produit.idProduits_dis = produits.id_prod");
            $query->execute(array($ID_dis));
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
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
    public function detailDistribution($idLivraison)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM distributions, livreur, clients WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client AND idDis=?");
            $query->execute(array($idLivraison));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateDistribution($idDis, $ref_dis, $dateDis, $datePai, $idLivreur, $idClient)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE distributions SET ref_dis = ? date_livraison = ?, date_paiment = ?, id_livreur =?, idClient=? WHERE idDis = '" . $idDis . "'");
            $executIngrediant = $query->execute(array($ref_dis, $dateDis, $datePai, $idLivreur, $idClient));
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
    /**
     * Fonction pour la modification des livraison en livré si la quantité égal à 0
     */
    /**
     * Vérification des commandes avec un id pour faire la modification apres quantité et livraison
     */
}
