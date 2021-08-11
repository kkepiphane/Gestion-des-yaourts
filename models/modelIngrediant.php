<?php

require_once '../db/bdd.php';
class ModelIngrediant
{
    public function addIngrediant($nomIng, $prixUniatre, $quantite, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO ingrediants(nom_ing, prixUnitaire, quantite_dispo, user_create, dateCreate) VALUES (?,?,?,?,?)");
            $executIngrediant = $query->execute(array($nomIng, $prixUniatre, $quantite, $user_create, $date_create));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getIngrediant()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT id_ing, nom_ing, prixUnitaire, quantite_dispo FROM ingrediants ORDER BY id_ing DESC LIMIT 0,10");
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
            $query = $db->prepare("SELECT id_ing, nom_ing, prixUnitaire, quantite_dispo FROM ingrediants ORDER BY nom_ing");
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
            $query = $db->prepare("SELECT id_ing, nom_ing, prixUnitaire, quantite_dispo FROM ingrediants WHERE id_ing=?");
            $query->execute(array($idIng));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateIngrediant($idIng, $nomIng, $prixUniatre, $quantite)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE ingrediants SET nom_ing = ?, prixUnitaire = ?, quantite_dispo =? WHERE id_ing = '" . $idIng . "'");
            $executIngrediant = $query->execute(array($nomIng, $prixUniatre, $quantite));
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
