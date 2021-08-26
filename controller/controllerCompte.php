<?php
require  '../models/modelCompte.php';
$comptes = new ModelCompte();



$allCompte = $comptes->getAllCompte();

/**
 * AJOUT DES CLIENTS
 */
if (isset($_POST['btnAddCompte'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $comptes->addCompte($_POST['nomSociet'], $_POST['mail'], $_POST['adresseSociet'], $_POST['telCompt'], $_POST['GestPro'], $date, $nomUser);
    header('location:../views/addCompte.php');
}
/**
 * Supression d'un clients
 */
if (isset($_GET['idDelCompte'])) {
    $comptes->deleteCompte($_GET['idDelCompte']);
    header('location:../views/addCompte.php');
}


if (isset($_GET['idUpdCompte'])) {
    $idUp = $_GET['idUpdCompte'];
    if (isset($_POST['btnUpdCompte'])) {
        $comptes->updateCompte($idUp, $_POST['nomSociet'], $_POST['mail'], $_POST['adresseSociet'], $_POST['telCompt'], $_POST['GestPro']);
    }
    $lirecompte = $comptes->idCompte($idUp);
}
