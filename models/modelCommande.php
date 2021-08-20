<?php

require_once '../db/bdd.php';
class ModelCommande
{
    public function addCommande($dateCom, $idPro, $quantit, $idClt, $livraison, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO commande(date_com, id_pro, quantite, id_clt, livraison, user_create, dateCreate) VALUES (?,?,?,?,?,?,?)");
            $executCom = $query->execute(array($dateCom, $idPro, $quantit, $idClt, $livraison, $user_create, $date_create));
            return $executCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getCommande()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, produits, clients,yaourt, type_yaout WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND livraison like '%non_livre%' ORDER BY id_com DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllCommandes()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, produits, clients, yaourt, type_yaout WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND livraison like '%non_livre%' ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function commandeDetail($idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM commande, produits, clients, yaourt, type_yaout WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND commande.id_pro = produits.id_prod AND commande.id_clt = clients.id_client AND id_com=?");
            $query->execute(array($idCom));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateCommande($idCom, $dateCom, $idPro, $quantit, $idClt)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE commande SET date_com = ?, id_pro = ?, quantite =?, id_clt=? WHERE id_com = '" . $idCom . "'");
            $executIngrediant = $query->execute(array($dateCom, $idPro, $quantit, $idClt));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteCommande($idCom)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM commande WHERE id_com=?");
            $delCom = $query->execute(array($idCom));
            return $delCom;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}
