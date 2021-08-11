<?php
require  '../models/modelTypeYaourt.php';
$TYaourt = new ModelTypeY();

/**
 * Affichage de tout les Types de Yaourt
 */
$allTYaout = $TYaourt->getAllTYaourts();


/**
 * affichage des derniers ajout d'un type de yaourt
 */
$aDTYaout = $TYaourt->getTYaourt();

/**
 * Ajout d'un type de yaourt
 */
if (isset($_POST['btnAddTypeY'])) {
        
    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
         $TYaourt->addTypeY($_POST['typeY'], $nomUser,$date);
         header('location:../views/addType_yaourt.php');
    }
/**
 * Supression d'un type de Yaourt
 */
    if (isset($_GET['idDelTY'])) {
        $TYaourt->deleteTYaourt($_GET['idDelTY']);
        header('location:../views/addType_yaourt.php');
    }elseif (isset($_GET['idDelLTY'])) {
        $TYaourt->deleteTYaourt($_GET['idDelLTY']);
        header('location:../views/listeType_yaourt.php');
    }

/**Modification et affichage des données à modifiers*/

if(isset($_GET['idUpTYa'])){
    $idUp = $_GET['idUpTYa'];
if (isset($_POST['btnUpTY'])) {
$TYaourt->updateTYaourt($idUp, $_POST['typeY']);
}
$lireTYaoutUp = $TYaourt->TYDetail($idUp);
}
