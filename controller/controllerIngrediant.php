<?php
require  '../models/modelIngrediant.php';
$ingrediant = new ModelIngrediant();

$typeIng = $ingrediant->getTypeIngrediant();
/**
 * Affichage de tout les ingrédaints
 */
$allIng = $ingrediant->getAllIngrediant();


/**
 * affichage des derniers ajout d'un ingrédaint
 */
$aDing = $ingrediant->getIngrediant();

if (isset($_POST['btnAddTypeIng'])) {
    foreach ($_POST['refIngd'] as $key => $value) {
        $ref_ing = $_POST['refIngd'][$key];
        $nom_ref = $_POST['nomIngd'][$key];
        $prixIng = $_POST['prixUnt'][$key];
        $quantitIng = $_POST['quantiteIng'][$key];

        $nomUser = $_SESSION['nom_user'];
        $date = date('Y:m:d');
        $ingrediant->addTIngrediant($ref_ing, $nom_ref, $prixIng, $quantitIng, $nomUser, $date);
    }
    header('location:../views/addIngrediant.php');
}


/**
 * Supression d'un clients
 */
if (isset($_GET['id_Del_Ing'])) {
    $ingrediant->deleteTIngred($_GET['id_Del_Ing']);
    header('location:../views/addIngrediant.php');
}
if (isset($_GET['id_del_four_typeI'])) {
    $ingrediant->deleteFourniTypeIng($_GET['id_del_four_typeI']);
    header('location:../views/addIngrediant.php');
}
/**Modification et affichage des données à modifiers*/

if (isset($_GET['id_up_Ing'])) {
    $idUp = $_GET['id_up_Ing'];
    if (isset($_POST['btn_upd_Ing'])) {
        $ingrediant->updateTIngrediant($idUp, $_POST['refIng'], $_POST['nomIng'], $_POST['prixU'], $_POST['quantiteIng']);
    }
    $lireIngreD = $ingrediant->ingrediantDetail($idUp);
}

/**
 * Chaque Ingrédiant est lié à un fournisseur
 */

if (isset($_POST['btn_add_fourn_Ty'])) {
    foreach ($_POST['fourni'] as $mutlFourni => $val) :;

        $founir =  $_POST['fourni'][$mutlFourni];
        $nomUser = $_SESSION['nom_user'];
        $date = date('Y:m:d');
        $ingrediant->addIngredFour($_POST['typeIng'], $founir, $nomUser, $date);
    endforeach;
    header('location:../views/addIngrediant.php');
}
