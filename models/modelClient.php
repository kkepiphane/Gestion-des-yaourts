<?php

require_once '../db/bdd.php';
class ModelClients
{
    public function addClient($nomclient, $telephone, $adresse, $nomUser, $date)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO clients(nom_client, telephone, adresse_client, user_create, date_create) VALUES (?,?,?,?,?)");
            $executIngrediant = $query->execute(array($nomclient, $telephone, $adresse, $nomUser, $date));
            return $executIngrediant;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getClients()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM clients ORDER BY id_client DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllClients()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM clients ORDER BY nom_client");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function idClient($idClient)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT id_client, nom_client, telephone, adresse_client FROM clients WHERE id_client=?");
            $query->execute(array($idClient));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateClient($idClient, $upNom, $upTelephone, $upAdresse)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE clients SET nom_client = ?, adresse_client = ?, telephone = ? WHERE id_client = '" . $idClient . "'");
            $updateClt = $query->execute(array($upNom, $upTelephone, $upAdresse));
            return $updateClt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function deleteClt($idClient)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM clients WHERE id_client=?");
            $deletClt = $query->execute(array($idClient));
            return $deletClt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
