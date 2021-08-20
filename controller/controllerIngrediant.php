<?php
require  '../models/modelIngrediant.php';
$ingrediant = new ModelIngrediant();

/**
 * Affichage de tout les ingrédaints
 */
$allIng = $ingrediant->getAllIngrediant();


/**
 * affichage des derniers ajout d'un ingrédaint
 */
$aDing = $ingrediant->getIngrediant();

/**
 * AJOUT DES CLIENTS
 */
if (isset($_POST['btnAddIng'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $ingrediant->addIngrediant($_POST['refIng'], $_POST['nomIng'], $_POST['prixU'], $_POST['quantiteIng'], $_POST['mesure'], $_POST['fourni'], $nomUser, $date);
    header('location:../views/addIngrediant.php');
}
/**
 * Supression d'un clients
 */
if (isset($_GET['idDelIng'])) {
    $ingrediant->deleteIngred($_GET['idDelIng']);
    header('location:../views/addIngrediant.php');
} elseif (isset($_GET['idDelLIng'])) {
    $ingrediant->deleteIngred($_GET['idDelLIng']);
    header('location:../views/listeIngrediant.php');
}

/**Modification et affichage des données à modifiers*/

if (isset($_GET['idUpIng'])) {
    $idUp = $_GET['idUpIng'];
    if (isset($_POST['btnUpIng'])) {
        $ingrediant->updateIngrediant($idUp, $_POST['refIng'], $_POST['nomIng'], $_POST['prixU'], $_POST['quantiteIng'], $_POST['mesure'], $_POST['fourni']);
    }
    $lireIngreD = $ingrediant->ingrediantDetail($idUp);
}
