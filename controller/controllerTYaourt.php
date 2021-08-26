<?php
require  '../models/modelTypeYaourt.php';
require  '../models/modelIngrediant.php';
require  '../models/modelCompte.php';
$nameProGestion = new ModelCompte();

$TYaourt = new ModelTypeY();
$modelIng = new ModelIngrediant();



$getN = $nameProGestion->getNameProd();
/**
 * Cette methode permet d'affichier les ingrédiant
 */
$affichIn = $modelIng->getAllIngrediant();
/**
 * Affichage de tout les Types de Yaourt
 */
$allTYaout = $TYaourt->getAllTYaourts();


/**
 * affichage des derniers ajout d'un type de yaourt
 */

/**
 * Ajout d'un type de yaourt
 */
if (isset($_POST['btnAddTypeY'])) {
    foreach ($_POST['TYIng'] as $key => $value) {
        $ing = $_POST['TYIng'][$key];
        $nomUser = $_SESSION['nom_user'];
        $date = date('Y:m:d');
        $TYaourt->addTypeY($_POST['typeY'], $ing, $nomUser, $date);
    }
    header('location:../views/addType_yaourt.php');
}
/**
 * Supression d'un type de Yaourt
 */
if (isset($_GET['idDelTY'])) {
    $TYaourt->deleteTYaourt($_GET['idDelTY']);
    header('location:../views/addType_yaourt.php');
} elseif (isset($_GET['idDelLTY'])) {
    $TYaourt->deleteTYaourt($_GET['idDelLTY']);
    header('location:../views/listeType_yaourt.php');
}

/**Modification et affichage des données à modifiers*/

if (isset($_GET['idUpTYa'])) {
    $idUp = $_GET['idUpTYa'];
    if (isset($_POST['btnUpTY'])) {
        $TYaourt->updateTYaourt($idUp, $_POST['typeY'], $_POST['TYIng']);
    }
    $lireTYaoutUp = $TYaourt->TYDetail($idUp);
}
