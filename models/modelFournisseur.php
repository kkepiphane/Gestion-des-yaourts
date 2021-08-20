<?php

require_once '../db/bdd.php';
class ModelFournisseurs
{
    public function addFournisseur($nomFourni, $adresseFourni, $telFourni, $typeFourni, $nomUser, $date)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO fournisseur(nom_four, adresse_four, tel_four, typeFourni, user_create,date_create) VALUES (?,?,?,?,?,?)");
            $executFourni = $query->execute(array($nomFourni, $adresseFourni, $telFourni, $typeFourni, $nomUser, $date));
            return $executFourni;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getFournisseur()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM fournisseur ORDER BY id_four DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllFournisseurs()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM fournisseur ORDER BY nom_four");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function idFourniseur($idFourni)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM fournisseur WHERE id_four=?");
            $query->execute(array($idFourni));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateFournisseurs($idFourni, $nomFourni, $adresseFourni, $telFourni, $typeFourni)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE fournisseur SET nom_four = ?, adresse_four = ?, tel_four = ?,typeFourni= ? WHERE id_four = '" . $idFourni . "'");
            $updateFourni = $query->execute(array($nomFourni, $adresseFourni, $telFourni, $typeFourni));
            return $updateFourni;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function deleteFournisseur($idFourni)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM fournisseur WHERE id_four=?");
            $delFourni = $query->execute(array($idFourni));
            return $delFourni;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
