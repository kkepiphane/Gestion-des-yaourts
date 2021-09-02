<?php
require  '../models/modelTypeYaourt.php';
require  '../models/modelIngrediant.php';
require  '../models/modelCompte.php';
$nameProGestion = new ModelCompte();

$TYaourt = new ModelTypeY();
$modelIng = new ModelIngrediant();


$typ = $TYaourt->prendTousTYaourt();
$getN = $nameProGestion->getNameProd();
/**
 * Cette methode permet d'affichier les ingrédiant
 */
$affichIn = $modelIng->getTypeIngrediant();
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
if (isset($_POST['btn_type_pro'])) {
    foreach ($_POST['refPro'] as $key => $value) {

        $refPro = $_POST['refPro'][$key];
        $namePro = $_POST['nomYPro'][$key];

        $nomUser = $_SESSION['nom_user'];
        $date = date('Y:m:d');
        $TYaourt->addTypeY($refPro, $namePro, $nomUser, $date);
    }
    header('location:../views/addType_yaourt.php');
}

if (isset($_POST['btnAddTypeY'])) {
    foreach ($_POST['TYIng'] as $key => $value) {

        $ing = $_POST['TYIng'][$key];

        $date = date('Y:m:d');
        $TYaourt->addCompositionPro($_POST['tyTY'], $ing, $date);
    }
    header('location:../views/addType_yaourt.php');
}
/**
 * Supression d'un type de Yaourt
 */
if (isset($_GET['id_Del_Ty'])) {
    $TYaourt->deleteTYaourt($_GET['id_Del_Ty']);
    header('location:../views/addType_yaourt.php');
}

if (isset($_GET['id_Del_comp'])) {
    $TYaourt->deleteComposition($_GET['id_Del_Ty']);
    header('location:../views/addType_yaourt.php');
}

/**Modification et affichage des données à modifiers*/

if (isset($_GET['id_upd_TY'])) {
    $idUp = $_GET['id_upd_TY'];
    if (isset($_POST['btn_upd_TY'])) {
        $TYaourt->updateTYaourt($idUp, $_POST['Refy'], $_POST['typeY']);
    }
    $lireTYaoutUp = $TYaourt->TYDetail($idUp);
}
