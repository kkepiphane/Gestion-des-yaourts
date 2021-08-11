<?php
require_once '../db/bdd.php';

class ModelLivreur
{
    public function addLivreur($nomLiv, $telephoneLiv, $nomUser, $date)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO livreur(nom_dis, telephone_dis,user_create, date_create) VALUES (?,?,?,?)");
            $executLivreur = $query->execute(array($nomLiv, $telephoneLiv, $nomUser, $date));
            return $executLivreur;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getLivreur()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM livreur ORDER BY idLivreur DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllLivreurs()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM livreur ORDER BY nom_dis");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function idLivreur($idLiv)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT idLivreur, nom_dis, telephone_dis FROM livreur WHERE idLivreur=?");
            $query->execute(array($idLiv));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateLivreur($idLivreur, $upNomLiv, $upTelephoneLiv)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE livreur SET nom_dis = ?, telephone_dis = ? WHERE idLivreur = '" . $idLivreur . "'");
            $deletClt = $query->execute(array($upNomLiv, $upTelephoneLiv));
            return $deletClt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function deleteLiv($idLivreur)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM livreur WHERE idLivreur=?");
            $deletClt = $query->execute(array($idLivreur));
            return $deletClt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
