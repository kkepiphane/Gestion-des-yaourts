<?php

require_once '../db/bdd.php';
class ModelCompte
{
    public function addCompte($nomSociete, $emailSociete, $adresseSociete, $telComp, $produitGest, $nomUser, $date)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO compte(nom_societe, emailSocet, adresseSociet,telComp,produitGest, user_create,dateCreate) VALUES (?,?,?,?,?,?,?)");
            $executCompte = $query->execute(array($nomSociete, $emailSociete, $adresseSociete, $telComp, $produitGest, $nomUser, $date));
            return $executCompte;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getCompte()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM compte");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllCompte()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM compte ORDER BY nom_societe");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function idCompte($idCompt)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM compte WHERE id_compte =?");
            $query->execute(array($idCompt));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateCompte($idCompte, $nomSociete, $emailSociete, $adresseSociete, $telComp, $produitGest)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE compte SET nom_societe = ?, emailSocet = ?, adresseSociet = ?, telComp = ? produitGest = ? WHERE id_compte  = '" . $idCompte . "'");
            $delCompte = $query->execute(array($nomSociete, $emailSociete, $adresseSociete, $telComp, $produitGest));
            return $delCompte;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function deleteCompte($idCompt)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM compte WHERE id_compte =?");
            $delCompte = $query->execute(array($idCompt));
            return $delCompte;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
