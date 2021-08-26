<?php
require  '../models/modelLivraison.php';
require  '../models/modelProduit.php';
$distribution = new ModelDistribution();
$ProduitModel = new ModelProduit();

/**
 * Affichage de tout les ingrédaints
 */

$allProds = $ProduitModel->getAllProduits();
$allDiss = $distribution->getAllDistributions();


/**
 * affichage des derniers ajout d'un ingrédaint
 */
$aDdis = $distribution->getDistibution();

/**
 * AJOUT DES CLIENTS
 */
if (isset($_POST['btnAddLivraison'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    //Récupération de id
    $idCommande = $_GET['idADLivraison'];
    $QuanLivrer = $_POST['quantitePro'];
    $distribution->addDistibution($_POST['dateLivraison'], $_POST['datePaie'], $_POST['nomLivreur'], $idCommande, $QuanLivrer, $nomUser, $date);

    /**
     * Vérification npuis récupertation de la quantité
     */
    $recupData = $distribution->commandeVerification($idCommande);
    $calQuant = $recupData->quantite;
    /**
     * Soustration et Modification de la quantité du commande
     */
    $rest = $calQuant - $QuanLivrer;
    $distribution->updateCom($idCommande, $rest);

    /**
     * Modification du nom livré ou non
     */
    $reupQuant = $distribution->commandeVerification($idCommande);
    $Condi = $reupQuant->quantite;
    if ($Condi <= 0) {
        $Livraison = "livre";
        $distribution->updateLivraisonCom($idCommande, $Livraison);
    }
    header('location:../views/listeCommande.php');
}
/**
 * Dsitribution avec clients
 */
if (isset($_POST['btnAddDistribution'])) {
    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $quatiteLivrer = $_POST['quantitePro'];
    $typeIdPro = $_POST['typeProd'];
    $distribution->addDisSeconde($_POST['dateLivraison'], $_POST['datePaie'], $_POST['nomLivreur'], $_POST['nomClient'], $typeIdPro, $quatiteLivrer, $nomUser, $date);

    /**
     * Récupération
     */
    $RecuPRODUIT = $ProduitModel->produitDetail($typeIdPro);
    $dataPro = $RecuPRODUIT->quantite_pro;
    //calcul et Modification d'un Produit
    $restePro = $dataPro - $quatiteLivrer;

    $ProduitModel->updateVenduPro($typeIdPro, $restePro);
    /**
     * Vérification si la quantité d'un Produit est fini ou pas
     */
    $RecuPRODUIT = $ProduitModel->produitDetail($typeIdPro);
    $condiPro = $RecuPRODUIT->quantite_pro;
    if ($condiPro <= 0) {
        $Livraison = "fini";
        $ProduitModel->updateNivoPro($typeIdPro, $Livraison);
    }
    header('location:../views/addLivraison.php');
}
/**
 * Supression d'un clients
 */
if (isset($_GET['idDel_Dis'])) {
    $distribution->deleteDistibution($_GET['idDel_Dis']);
    header('location:../views/addLivraison.php');
} elseif (isset($_GET['idDel_listDis'])) {
    $distribution->deleteDistibution($_GET['idDel_listDis']);
    header('location:../views/listeLivraison.php');
}

/**Modification et affichage des données à modifiers*/

if (isset($_GET['idUpdDis'])) {
    $idUp = $_GET['idUpdDis'];
    if (isset($_POST['btnUpdDis'])) {
        $distribution->updateDistribution($idUp, $_POST['dateCom'], $_POST['produit'], $_POST['quantite'], $_POST['nclient']);
    }
    $lireUpdDis = $distribution->detailDistribution($idUp);
}
