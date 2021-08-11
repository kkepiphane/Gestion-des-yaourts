<?php

require_once '../db/bdd.php';
class ModelYaourt
{
    public function addYaourt($idTYa, $idIngY, $quantiteDY, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO yaourt(idType_yaourt,id_ingred, quantiteDispoY, user_create, dateCreate) VALUES (?,?,?,?,?)");
            $executYaourt = $query->execute(array($idTYa, $idIngY, $quantiteDY, $user_create, $date_create));
            return $executYaourt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getYaourts()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt, type_yaout, ingrediants  WHERE yaourt.idType_yaourt = type_yaout.id_ty AND yaourt.id_ingred = ingrediants.id_ing ORDER BY id_yaourt  DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllYaourts()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt, type_yaout, ingrediants WHERE yaourt.idType_yaourt = type_yaout.id_ty AND yaourt.id_ingred = ingrediants.id_ing  ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function yaourtDetail($idY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt, type_yaout, ingrediants  WHERE yaourt.idType_yaourt = type_yaout.id_ty AND yaourt.id_ingred = ingrediants.id_ing AND id_yaourt =?");
            $query->execute(array($idY));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateYaourts($idY, $idTYa, $idIngY, $quantiteDY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE yaourt SET idType_yaourt = ?,id_ingred = ?, quantiteDispoY = ? WHERE id_yaourt  = '" . $idY . "'");
            $executYaourt = $query->execute(array($idTYa, $idIngY, $quantiteDY));
            return $executYaourt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteYaourt($idYa)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM yaourt WHERE id_yaourt =?");
            $deletYa = $query->execute(array($idYa));
            return $deletYa;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
