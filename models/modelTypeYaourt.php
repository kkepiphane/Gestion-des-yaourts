<?php

require_once '../db/bdd.php';
class ModelTypeY
{
    public function addTypeY($ref_y, $nomTY, $TyIng, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO type_yaout(ref_yaourt, nom_yaourt, idIngred, user_create, dateCreate) VALUES (?,?,?,?,?)");
            $executTY = $query->execute(array($ref_y, $nomTY, $TyIng, $user_create, $date_create));
            return $executTY;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllTYaourts()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT *, COUNT(type_yaout.idIngred) AS idTYao FROM type_yaout, ingrediants WHERE type_yaout.idIngred  = ingrediants.id_ing GROUP BY nom_yaourt ORDER BY nom_yaourt");
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
            $query = $db->prepare("SELECT * FROM type_yaout, ingrediants WHERE type_yaout.idIngred  = ingrediants.id_ing AND id_ty=?");
            $query->execute(array($idTy));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateTYaourt($dTY, $ref_yt, $nomTY, $ingdI)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE type_yaout SET ref_yaourt = ?, nom_yaourt = ?, idIngred = ? WHERE id_ty = '" . $dTY . "'");
            $executIngrediant = $query->execute(array($ref_yt, $nomTY, $ingdI));
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
