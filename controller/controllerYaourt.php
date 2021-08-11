<?php
require  '../models/modelYaourt.php';
$yaourts = new ModelYaourt();

/**
 * Affichage de tout les de Yaourt
 * 
 */
$allYaourts = $yaourts->getAllYaourts();

/**
 * affichage des derniers ajout de yaourt
 */

$aDYaourts = $yaourts->getYaourts();

/**
 * Ajout d'un yaourt
 */
if (isset($_POST['btnAddYa'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $yaourts->addYaourt($_POST['typeYaourt'], $_POST['typeIng'], $_POST['typeYaourt'], $nomUser, $date);
    header('location:../views/addYaourt.php');
}
/**
 * Supression d'un Yaourt
 */
if (isset($_GET['idDelYa'])) {
    $yaourts->deleteYaourt($_GET['idDelYa']);
    header('location:../views/addYaourt.php');
} elseif (isset($_GET['idDelLYa'])) {
    $yaourts->deleteYaourt($_GET['idDelLYa']);
    header('location:../views/listeYaourts.php');
}

/**Modification et affichage des données à modifiers*/

if (isset($_GET['idUpYa'])) {
    $idUp = $_GET['idUpYa'];
    if (isset($_POST['btnUpYa'])) {
        $yaourts->updateYaourts($idUp, $_POST['typeYaourt'], $_POST['typeIng'], $_POST['quantiteY']);
    }
    $lireYaoutUps = $yaourts->yaourtDetail($idUp);
}
