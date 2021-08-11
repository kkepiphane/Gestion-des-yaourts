<?php

require_once '../db/bdd.php';
class ModelTypeY
{
    public function addTypeY($nomTY, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO type_yaout(nom_yaourt, user_create, dateCreate) VALUES (?,?,?)");
            $executTY = $query->execute(array($nomTY, $user_create, $date_create));
            return $executTY;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getTYaourt()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT id_ty, nom_yaourt FROM type_yaout ORDER BY id_ty DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllTYaourts()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT id_ty, nom_yaourt FROM type_yaout ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function TYDetail($idTy)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT id_ty, nom_yaourt FROM type_yaout WHERE id_ty=?");
            $query->execute(array($idTy));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateTYaourt($dTY, $nomTY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE type_yaout SET nom_yaourt = ? WHERE id_ty = '" . $dTY . "'");
            $executIngrediant = $query->execute(array($nomTY));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteTYaourt($idTY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM type_yaout WHERE id_ty=?");
            $deletTY = $query->execute(array($idTY));
            return $deletTY;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
