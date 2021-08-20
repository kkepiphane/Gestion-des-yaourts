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
$aDproduit = $produits->getProduit();

/**
 * Ici on fait appel à tous les p aprés leurs ajout dans la base de données sans 
 */
$allGroupPro = $produits->getAllGroupProduits();
/**
 * Ajout d'un type de yaourt
 */
if (isset($_POST['btnAddProd'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $niveau = "no_finish";
    $produits->addProduit($_POST['yaourt'], $_POST['quantitePro'], $_POST['prixUnitaire'], $niveau, $nomUser, $date);
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
        $produits->updateProduit($idUp, $_POST['yaourt'], $_POST['quantitePro'], $_POST['prixUnitaire']);
    }
    $lireUpdProd = $produits->produitDetail($idUp);
}
