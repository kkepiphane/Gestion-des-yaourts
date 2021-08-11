<?php
require  '../models/modelCommande.php';
$commande = new ModelCommande();

/**
 * Affichage de tout les ingrédaints
 */
$allComs = $commande->getAllCommandes();


/**
 * affichage des derniers ajout d'un ingrédaint
 */
$aDcoms = $commande->getCommande();

/**
 * AJOUT DES CLIENTS
 */
if (isset($_POST['btnAddComm'])) {
        
    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $livraison = "non_livre";
         $commande->addCommande($_POST['dateCom'], $_POST['produit'], $_POST['quantite'],$_POST['nclient'],$livraison, $nomUser,$date);
         header('location:../views/addCommande.php');
    }
/**
 * Supression d'un clients
 */
    if (isset($_GET['idDel_com'])) {
        $commande->deleteCommande($_GET['idDel_com']);
        header('location:../views/addCommande.php');
    }elseif (isset($_GET['idDel_listCom'])) {
        $commande->deleteCommande($_GET['idDel_listCom']);
        header('location:../views/listeCommande.php');
    }

/**Modification et affichage des données à modifiers*/

if(isset($_GET['idUpdCom'])){
    $idUp = $_GET['idUpdCom'];
if (isset($_POST['btnUpdCom'])) {
$commande->updateCommande($idUp, $_POST['dateCom'], $_POST['produit'], $_POST['quantite'],$_POST['nclient']);
}
$lireUpdCom = $commande->commandeDetail($idUp);
}

if(isset($_GET['idAddDistribtion'])){
    $echoCom = $commande->commandeDetail($_GET['idAddDistribtion']);
}
