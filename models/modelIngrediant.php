<?php

require_once '../db/bdd.php';
class ModelIngrediant
{
    public function addTIngrediant($ref, $nomIng, $prixUniatre, $quantite, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO type_ingrediant(references_ing, nom_ing, prixUnitaireIng, quantiteIng, user_create, dateCreate) VALUES (?,?,?,?,?,?)");
            $executIngrediant = $query->execute(array($ref, $nomIng, $prixUniatre, $quantite, $user_create, $date_create));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function addIngredFour($TypeIng, $nameFour, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO ingrediants(id_type_ing, id_fou, user_create, dateCreate) VALUES (?,?,?,?)");
            $executIngrediant = $query->execute(array($TypeIng, $nameFour, $user_create, $date_create));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getTypeIngrediant()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM type_ingrediant ORDER BY nom_ing");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getIngrediant()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT *, COUNT(ingrediants.id_fou) as IIng FROM type_ingrediant, ingrediants, fournisseur WHERE type_ingrediant.id_TIng = ingrediants.id_type_ing AND ingrediants.id_fou = fournisseur.id_four  GROUP BY ingrediants.id_type_ing  ORDER BY type_ingrediant.nom_ing");
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
            $query = $db->prepare("SELECT * FROM type_ingrediant, ingrediants, fournisseur WHERE type_ingrediant.id_TIng = ingrediants.id_type_ing  AND ingrediants.id_fou = fournisseur.id_four  GROUP BY ingrediants.id_type_ing ORDER BY type_ingrediant.nom_ing");
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
            $query = $db->prepare("SELECT * FROM type_ingrediant WHERE id_TIng =?");
            $query->execute(array($idIng));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateTIngrediant($idIng, $refIng, $nomIng, $prixUniatre, $quantite)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE type_ingrediant SET references_ing = ?, nom_ing = ?, prixUnitaireIng = ?, quantiteIng =? WHERE id_TIng = '" . $idIng . "'");
            $executIngrediant = $query->execute(array($refIng, $nomIng, $prixUniatre, $quantite));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteTIngred($idIng)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM type_ingrediant WHERE id_TIng=?");
            $deleting = $query->execute(array($idIng));
            return $deleting;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    public function deleteFourniTypeIng($idIng)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM ingrediants WHERE id_ingrediant =?");
            $deleting = $query->execute(array($idIng));
            return $deleting;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
