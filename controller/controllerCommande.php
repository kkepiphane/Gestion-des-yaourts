<?php
require  '../models/modelCommande.php';
require  '../models/modelProduit.php';
$commande = new ModelCommande();
$prod = new ModelProduit();

//Affichage des produits dans le selecteur
$allProds = $prod->getAllProduits();
/**
 * affichage des derniers ajout d'un ingrédaint
 */
$aDcoms = $commande->getCommande();

/**
 * Onchange pour voir la quantité du produit sélectionné restant
 */ $recapCompt = 0;
if (isset($_POST['idQuantitPro'])) {
    $lireEchQuant = $prod->produitDetail($_POST['idQuantitPro']);
    $quantiDispoPro = $lireEchQuant->quantite_pro;
    if ($quantiDispoPro > 0) {
        echo '<input class=" form-control" minlength="2" id ="quanRecapDiso" name="QProduitDispo" type="text" value=' . $quantiDispoPro . '>';
    } else {
        echo ' <input class=" form-control" minlength="2"  type="text" required>';
    }
}
/**
 * Ajout des commandes
 */
if (isset($_POST['btnAddComm'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $livraison = "non_livre";
    $commande->addCommande($_POST['dateCom'], $_POST['produit'], $_POST['quantite'], $_POST['nclient'], $livraison, $nomUser, $date);

    

    header('location:../views/addCommande.php');
}
/**
 * Supression d'un clients
 */
if (isset($_GET['idDel_com'])) {
    $commande->deleteCommande($_GET['idDel_com']);
    header('location:../views/addCommande.php');
} elseif (isset($_GET['idDel_listCom'])) {
    $commande->deleteCommande($_GET['idDel_listCom']);
    header('location:../views/listeCommande.php');
}

/**Modification et affichage des données à modifiers*/

if (isset($_GET['idUpdCom'])) {
    $idUp = $_GET['idUpdCom'];
    if (isset($_POST['btnUpdCom'])) {
        $commande->updateCommande($idUp, $_POST['dateCom'], $_POST['produit'], $_POST['quantite'], $_POST['nclient']);
    }
    $lireUpdCom = $commande->commandeDetail($idUp);
}

if (isset($_GET['idAddDistribtion'])) {
    $echoCom = $commande->commandeDetail($_GET['idAddDistribtion']);
}
