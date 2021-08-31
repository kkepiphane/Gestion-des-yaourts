<?php
require  '../models/modelProduit.php';
$produits = new ModelProduit();

/**
 * Affichage de tout les Produits
 */

$allProds = $produits->getAllProduits();

/**
 * affichage des derniers ajout d'un Produits
 */

/**
 * Ici on fait appel à tous les p aprés leurs ajout dans la base de données sans 
 */
$allGroupPro = $produits->getAllGroupProduits();
/**
 * Ajout d'un type de yaourt
 */
if (isset($_POST['btnAddProd'])) {
    foreach ($_POST['yaourt'] as $kePro => $value) {

        $refPro = $_POST['ref_Prod'][$kePro];
        $prod = $_POST['yaourt'][$kePro];
        $quantitPro = $_POST['quantitePro'][$kePro];
        $prixUniPro = $_POST['prixUnitaire'][$kePro];

        $nomUser = $_SESSION['nom_user'];
        $date = date('Y:m:d');
        $niveau = "no_finish";
        $produits->addProduit($refPro, $prod, $quantitPro, $prixUniPro, $niveau, $nomUser, $date);
    }
    header('location:../views/addProduit.php');
}
/**
 * Supression d'un type de Yaourt
 */
if (isset($_GET['idDel_Prod'])) {
    $produits->deleteProduit($_GET['idDel_Prod']);
    header('location:../views/addProduit.php');
} elseif (isset($_GET['idDel_listePro'])) {
    $produits->deleteProduit($_GET['idDel_listePro']);
    header('location:../views/listeProduit.php');
}

/**Modification et affichage des données à modifiers*/

if (isset($_GET['idUpdProd'])) {
    $idUp = $_GET['idUpdProd'];
    if (isset($_POST['btnUpdProd'])) {
        $produits->updateProduit($idUp, $_POST['ref_Prod'], $_POST['yaourt'], $_POST['quantitePro'], $_POST['prixUnitaire']);
    }
    $lireUpdProd = $produits->produitDetail($idUp);
}
