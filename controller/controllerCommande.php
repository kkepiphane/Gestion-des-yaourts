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
$aDcoms = $commande->getAllCommandes();

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
    $commande->addCommande($_POST['ref_com'], $_POST['dateCom'], $_POST['nclient'], $livraison, $nomUser, $date);
    /**
     * Récupération de la derniére id
     */
    $recapIdcom = $commande->dernierAddCom();
    $idCompro = $recapIdcom->id_com;
    foreach ($_POST['produit'] as $key => $value) {
        $prod_idd = $_POST['produit'][$key];
        $quantCOM = $_POST['quantite'][$key];
        $commande->addComPro($idCompro, $prod_idd, $quantCOM);
    }
    /**
     * Vérification et calculé le reste de la quantité dans la tableau produit
     */
    foreach ($_POST['produit'] as $ke => $valuePro) {
        $prod_id = $_POST['produit'][$ke];
        $addQ = $_POST['quantite'][$ke];

        $recupData = $prod->produitDetail($prod_id);
        $calQuant = $recupData->quantite_pro;
        /**
         * Soustration et Modification de la quantité du commande
         */
        $rest = $calQuant - $addQ;
        $prod->updateVenduPro($prod_id, $rest);

        /**
         * Modification du nom livré ou non
         */
        $reupQuant = $prod->produitDetail($prod_id);
        $Condi = $reupQuant->quantite_pro;
        if ($Condi <= 0) {
            $Livraison = "livre";
            $prod->updateNivoPro($idCommande, $Livraison);
        }
    }
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
        $commande->updateCommande($idUp, $_POST['ref_com'], $_POST['dateCom'], $_POST['produit'], $_POST['quantite'], $_POST['nclient']);
    }
    $lireUpdCom = $commande->commandeDetail($idUp);
}


/**
 * Cette partie concerne le livraison via commande
 */
if (isset($_POST['btnLivraisonIdCom'])) {
    foreach ($_POST['id_com_liv'] as $key => $value) {
        $id_comme = $_POST['id_com_liv'][$key];

        $commande->addLivraisonCommande($id_comme, $_POST['nomLivreur'], $_POST['dateLivraison'], $_POST['datePaie']);
        $livraison = "livre";
        $commande->updateLivraisonCom($id_comme, $livraison);
        header('location:../views/commandLiv.php');
    }
}
$echoCom = $commande->getAllCommandeForLiv();
