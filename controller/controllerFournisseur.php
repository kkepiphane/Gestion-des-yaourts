<?php
require  '../models/modelFournisseur.php';
$fourniseurs = new ModelFournisseurs();



$allFournis = $fourniseurs->getAllFournisseurs();
/**
 * affichage des derniers ajout
 */

$aaFourni = $fourniseurs->getFournisseur();
/**
 * AJOUT DES CLIENTS
 */
if (isset($_POST['btnFourn'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $fourniseurs->addFournisseur($_POST['nomFour'], $_POST['adresseFour'], $_POST['telephoneFour'], $_POST['typeFour'], $nomUser, $date);
    header('location:../views/addFournisseur.php');
}
/**
 * Supression d'un clients
 */
if (isset($_GET['idDelFornni'])) {
    $fourniseurs->deleteFournisseur($_GET['idDelFornni']);
    header('location:../views/addFournisseur.php');
} elseif (isset($_GET['idDelFournListe'])) {
    $fourniseurs->deleteFournisseur($_GET['idDelFournListe']);
    header('location:../views/listeFournisseur.php');
}


if (isset($_GET['idUpdCompte'])) {
    $idUp = $_GET['idUpdCompte'];
    if (isset($_POST['btnUpdCompte'])) {
        $fourniseurs->updateFournisseurs($idUp, $_POST['nomFour'], $_POST['adresseFour'], $_POST['telephoneFour'], $_POST['typeFour']);
        echo "<script> alert('Modification reussi avec sucess')</script>";
    }

    $lireFournisseur = $fourniseurs->idFourniseur($idUp);
}
