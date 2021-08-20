<?php

require_once '../db/bdd.php';
class ModelFacturePaie
{
    public function addFacturePaie($montant, $etatPaie, $datePaie, $idDistribution, $userCreate, $dateCreate)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO facture_paie(montant, etat_paiment, date_paiement,id_distribution, user_create,date_create) VALUES (?,?,?,?,?,?)");
            $executPaie = $query->execute(array($montant, $etatPaie, $datePaie, $idDistribution, $userCreate, $dateCreate));
            return $executPaie;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getFacturePaie()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_paie ORDER BY id_fact DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllFacturePaies()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_paie ORDER BY nom_four");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function idFacturePaie($idFacPaie)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_paie WHERE id_fact=?");
            $query->execute(array($idFacPaie));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateFacturePaies($idPaie, $montant, $etatPaie, $datePaie, $idDistribution)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE facture_paie SET montant = ?, etat_paiment = ?, date_paiement = ?, id_distribution = ? WHERE id_fact = '" . $idPaie . "'");
            $updateFourni = $query->execute(array($montant, $etatPaie, $datePaie, $idDistribution));
            return $updateFourni;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function deleteFacturePaie($idPaie)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM facture_paie WHERE id_fact=?");
            $delFacPaie = $query->execute(array($idPaie));
            return $delFacPaie;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
