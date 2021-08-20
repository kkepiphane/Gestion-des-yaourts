<?php

require_once '../db/bdd.php';
class ModelIngrediant
{
    public function addIngrediant($ref, $nomIng, $prixUniatre, $quantite, $mesure, $fourn, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO ingrediants(references_ing, nom_ing, prixUnitaire, quantite_dispo,uniteMesure,id_fou, user_create, dateCreate) VALUES (?,?, ?,?,?,?,?,?)");
            $executIngrediant = $query->execute(array($ref, $nomIng, $prixUniatre, $quantite, $mesure, $fourn, $user_create, $date_create));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getIngrediant()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM ingrediants, fournisseur WHERE ingrediants.id_fou = fournisseur.id_four  ORDER BY id_ing DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllIngrediant()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM ingrediants, fournisseur WHERE ingrediants.id_fou = fournisseur.id_four ORDER BY nom_ing");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function ingrediantDetail($idIng)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM ingrediants, fournisseur WHERE ingrediants.id_fou = fournisseur.id_four AND id_ing=?");
            $query->execute(array($idIng));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateIngrediant($idIng, $refIng, $nomIng, $prixUniatre, $quantite, $mesure, $fourn)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE ingrediants SET references_ing = ?, nom_ing = ?, prixUnitaire = ?, quantite_dispo =?, uniteMesure= ?, id_fou = ? WHERE id_ing = '" . $idIng . "'");
            $executIngrediant = $query->execute(array($refIng, $nomIng, $prixUniatre, $quantite, $mesure, $fourn));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteIngred($idIng)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM ingrediants WHERE id_ing=?");
            $deleting = $query->execute(array($idIng));
            return $deleting;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
