<?php

require_once '../db/bdd.php';

class ModelProduit
{
    public function addProduit($refPro, $nomPro, $quantitPro, $prixUnitairePro, $niv, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO produits(ref_Pro, id_yaourt, quantite_pro, prix_produit, niveauPro, user_create, date_create) VALUES (?,?,?,?,?,?,?)");
            $executProd = $query->execute(array($refPro, $nomPro, $quantitPro, $prixUnitairePro, $niv, $user_create, $date_create));
            return $executProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllProduits()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM produits WHERE niveauPro LIKE '%no_finish%' ORDER BY id_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Ici on fait appel à tous les p aprés leurs ajout dans la base de données sans 
     */
    public function getAllGroupProduits()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt GROUP BY idType_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Récupération des id produits ou 
     */
    public function produitDetail($idProd)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM produits WHERE id_prod=?");
            $query->execute(array($idProd));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateProduit($idProd, $refPro, $nomY, $prixUniatre, $quantite)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE produits SET ref_Pro =?, id_yaourt = ?, quantite_pro = ?, prix_produit =? WHERE id_prod = '" . $idProd . "'");
            $executProd = $query->execute(array($refPro, $nomY, $prixUniatre, $quantite));
            return $executProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteProduit($idPro)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM produits WHERE id_prod=?");
            $delProd = $query->execute(array($idPro));
            return $delProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateVenduPro($idProd, $quantite)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE produits SET quantite_pro = ? WHERE id_prod = '" . $idProd . "'");
            $executProd = $query->execute(array($quantite));
            return $executProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateNivoPro($idProd, $nivo)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE produits SET niveauPro = ? WHERE id_prod = '" . $idProd . "'");
            $executProd = $query->execute(array($nivo));
            return $executProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
