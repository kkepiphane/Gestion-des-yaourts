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
$aDdis = $distribution->getAllDistributions();


/**
 * Dsitribution avec clients
 */
if (isset($_POST['btnAddDistribution'])) {
    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $livraison = "non_livre";
    $distribution->addDistibution($_POST['dateLivraison'], $_POST['datePaie'], $_POST['nomLivreur'], $_POST['nomClient'], $nomUser, $date);
    /**
     * Récupération de la derniére id
     */
    $recapIdDis = $distribution->getDerniersIdDis();
    $idDispro = $recapIdDis->idDis;
    foreach ($_POST['produit'] as $key => $value) {
        $prod_idd = $_POST['produit'][$key];
        $quantCOM = $_POST['quantite'][$key];
        $distribution->addDisProduit($idDispro, $prod_idd, $quantCOM);
    }
    /**
     * Vérification et calculé le reste de la quantité dans la tableau produit
     */
    foreach ($_POST['produit'] as $ke => $valuePro) {
        $prod_id = $_POST['produit'][$ke];
        $addQ = $_POST['quantite'][$ke];

        $recupData = $ProduitModel->produitDetail($prod_id);
        $calQuant = $recupData->quantite_pro;
        /**
         * Soustration et Modification de la quantité du commande
         */
        $rest = $calQuant - $addQ;
        $ProduitModel->updateVenduPro($prod_id, $rest);

        /**
         * Modification du fini ou non
         */
        $reupQuant = $ProduitModel->produitDetail($prod_id);
        $Condi = $reupQuant->quantite_pro;
        if ($Condi <= 0) {
            $Livraison = "fini";
            $ProduitModel->updateNivoPro($idCommande, $Livraison);
        }
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

if (isset($_GET['id_upd_livraison'])) {
    $idUp = $_GET['id_upd_livraison'];
    if (isset($_POST['upLivraison'])) {
        $distribution->updateDistribution($idUp, $_POST['dateLivraison'], $_POST['datePaie'], $_POST['nomLivreur'], $_POST['nomClient']);
    }
    $lire_upd_livraison = $distribution->detailDistribution($idUp);
}
