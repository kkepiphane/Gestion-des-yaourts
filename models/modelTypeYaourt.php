<?php

require_once '../db/bdd.php';
class ModelTypeY
{
    public function addTypeY($ref_y, $nomTY, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO type_yaout(ref_yaourt, nom_yaourt, user_create, dateCreate) VALUES (?,?,?,?)");
            $executTY = $query->execute(array($ref_y, $nomTY, $user_create, $date_create));
            return $executTY;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function addCompositionPro($nomTY, $TyIng, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO composition_produit(id_typeY, id_typeI, dateCreate) VALUES (?,?,?)");
            $executTY = $query->execute(array($nomTY, $TyIng, $date_create));
            return $executTY;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function prendTousTYaourt()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM type_yaout ORDER BY nom_yaourt");
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
            $query = $db->prepare("SELECT *, COUNT(composition_produit.id_typeY) AS idTYao FROM type_yaout, composition_produit, type_ingrediant WHERE composition_produit.id_typeY  = type_yaout.id_ty AND composition_produit.id_typeI = type_ingrediant.id_TIng GROUP BY nom_yaourt ORDER BY nom_yaourt");
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
            $query = $db->prepare("SELECT * FROM type_yaout WHERE  id_ty=?");
            $query->execute(array($idTy));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateTYaourt($dTY, $ref_yt, $nomTY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE type_yaout SET ref_yaourt = ?, nom_yaourt = ? WHERE id_ty = '" . $dTY . "'");
            $executIngrediant = $query->execute(array($ref_yt, $nomTY));
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
    public function deleteComposition($idTY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM composition_produit WHERE id_comp =?");
            $deletTY = $query->execute(array($idTY));
            return $deletTY;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
