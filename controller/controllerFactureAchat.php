<?php
require  '../models/modelFactureAchat.php';
$factureAchts = new ModelFactureAchats();


$getOneFacture = $factureAchts->getFactureAchat();
/**
 * La liste de les facture achats
 */
$getAllFactureA = $factureAchts->getFactureAlls();
/**
 * Onchange de valeurs directement dans la base
 */
if (isset($_POST['id_fourSS'])) {
    $listeIng = $factureAchts->idFournisseursIng($_POST['id_fourSS']);

    if ($listeIng > 0) {
        echo '<option>------------</option>';
        foreach ($listeIng as $echoIngredFourn) :;
            echo ' <option value=' . $echoIngredFourn->id_ing . '>' . $echoIngredFourn->references_ing . '</option>';
        endforeach;
    } else {
        echo ' <option>Aucun ingrédiant fourni </option>';
    }
}



/**
 * Ajout des données de facture avec les réferance et en mettant tous les id ensemble
 */
if (isset($_POST['btnRef_FacAcht'])) {

    $nomUser = "Epiphane";
    $date = date('Y:m:d');

    $ingred = implode(",", $_POST['idIngrd']);

    $factureAchts->addFactureAchat($_POST['refFact'], $_POST['dateAch'], $_POST['idFour'], $ingred, $nomUser, $date);
    $_SESSION['cacheElemment'] = 2;

    header('location:../views/addFactureAchat.php');
}


//récupération des donné en découpant sa en plusieurs partie
if (isset($_POST['btnAddFactProd'])) {
    $idFac = $factureAchts->idFact();
    $echoIdF = $idFac->id_fac_ach;
    foreach ($_POST['refIng'] as $key => $val) :;
        $idFacIng =  $_POST['refIng'][$key];
        $prixU = $_POST['prixU'][$key];
        $quantiteFac = $_POST['quantiteIng'][$key];
        $factureAchts->addFactureAchatProduit($echoIdF, $idFacIng, $prixU, $quantiteFac);
        $factureAchts->addFactureAchatStock($echoIdF, $idFacIng, $prixU, $quantiteFac);
    endforeach;
    $_SESSION['cacheElemment'] = 3;

    header('location:../views/addFactureAchat.php');
}

/**
 * Ici c'est le derniers ajout pour affichier dans les input avec le nombre d'ingrédiant selectionné
 * 
 */


$lisIng = $factureAchts->idDernierAdd();
/**
 * Supression d'une 
 */
if (isset($_GET['idDelCompte'])) {
    $factureAchts->deleteFactureAchat($_GET['idDelCompte']);
    header('location:../views/addFactureAchat.php');
}

/**
 * Mofification d'un produit sur la facture 
 */

if (isset($_GET['idUpdFacA'])) {
    $idUp = $_GET['idUpdFacA'];
    if (isset($_POST['idUpdFactAcha'])) {

        $ingred = implode(",", $_POST['idIngrd']);
        $factureAchts->updateFactureAchats($idUp, $_POST['refFact'], $_POST['dateAch'], $_POST['idFour'], $ingred);
    }
    $lireUpdFact = $factureAchts->idFactureAchat($idUp);
}
if (isset($_POST['btnupdtFactProd'])) {
    $idFac = $factureAchts->idFact();
    $echoIdF = $idFac->id_fac_ach;
    foreach ($_POST['refIng'] as $key => $val) :;
        $idFacIng =  $_POST['refIng'][$key];
        $prixU = $_POST['prixU'][$key];
        $quantiteFac = $_POST['quantiteIng'][$key];
        $factureAchts->addFactureAchatProduitM($echoIdF, $idFacIng, $prixU, $quantiteFac);
    endforeach;
}


/**
 * 
 * Affichage des factures 
 */
if (isset($_GET['idFactureInfo'])) {
    $allFactAch = $factureAchts->getAllFactureAchats($_GET['idFactureInfo']);
}
