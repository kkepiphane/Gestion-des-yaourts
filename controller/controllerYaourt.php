<?php
require  '../models/modelYaourt.php';
$yaourts = new ModelYaourt();


/**
 * Tous les yaourts
 */
$allTYa = $yaourts->getCompositions();

if (isset($_POST['btnIdYa'])) {
    echo $_SESSION['idY'] = $_POST['typeYaourt'];
    $lisIng = $yaourts->getAllProdQuantYao($_POST['typeYaourt']);
} else {
    if (isset($_POST)) {
        $lisIng = $yaourts->getAllProdQuantYao($_SESSION['idY']);
    }
}



/**
 * Affichage des composition
 */
// $allYaoComp = $yaourts->getAllYaourtAProduit();

/**
 * Affichage de tout les de Yaourt
 * 
 */
// $allYaourts = $yaourts->getAllYaourts();
/**
 * Récupération des ingrediant saisi dans la base des factures
 */
// $allIngred = $yaourts->getAllIngrediantsAchats();
/**
 * affichage des derniers ajout de yaourt
 */

$aDYaourts = $yaourts->getYaourts();
/**
 * Onchange pour voir la quantité du produit sélectionné restant
 */ $recapComptY = 0;


/**
 * Ajout d'un yaourt
 */
if (isset($_POST['btnAddYa'])) {

    //Récupération de la quantité pour faire de la soustration
    foreach ($_POST['typeIng'] as $key => $value) {

        $nomUser = 'Epiphane';
        $date = date('Y:m:d');

        $idY = $_SESSION['idY'];
        $nmeIng = $_POST['typeIng'][$key];
        $quantite = $_POST['quantiteY'][$key];

        $yaourts->addYaourt($nmeIng, $idY, $quantite, $nomUser, $date);
    }
    /**
     * Aprés soutraction on fait le divison
     */
    $echoRecpName =  $yaourts->getAllProdQuantYao($_SESSION['idY']);
    foreach ($echoRecpName as $ke => $recPValue) {
        $namIng = $recPValue->id_typeI;
        $compteName = $yaourts->getAllQuantiteIng($recPValue->id_typeI);
        $recapCompt = $compteName->Compt;

        $quantiteRes = $_POST['quantiteSou'][$ke] - $_POST['quantiteY'][$ke];
        $quantiteDiv = $quantiteRes / $recapCompt;
        $yaourts->updateQuantiteProd($namIng, $quantiteDiv);
    }
}
/**
 * Supression d'un Yaourt
 */
if (isset($_GET['idDelYa'])) {
    $yaourts->deleteYaourt($_GET['idDelYa']);
    header('location:../views/addYaourt.php');
} elseif (isset($_GET['idDelLYa'])) {
    $yaourts->deleteYaourt($_GET['idDelLYa']);
    header('location:../views/listeYaourts.php');
}

/**Modification et affichage des données à modifiers*/

if (isset($_GET['idUpYa'])) {
    $idUp = $_GET['idUpYa'];
    if (isset($_POST['btnUpYa'])) {
        $lireYaoutUps = $yaourts->yaourtDetail($idUp);
        /**
         * Dans cette condition si l'utilisateur décide de modifier seulement la quantité dans la base
         */
        if ($lireYaoutUps->id_ty == $_POST['typeYaourt'] && $lireYaoutUps->id_typeI == $_POST['typeIng'] && $lireYaoutUps->quantiteDispoY != $_POST['quantiteY'] && !isset($_POST['quantiteSou'])) {

            if ($lireYaoutUps->quantiteDispoY < $_POST['quantiteY']) {
                //Ici on fait la soustration
                $quantiteRes = $_POST['quantiteY'] - $lireYaoutUps->quantiteDispoY;

                $restF = $lireYaoutUps->quantiteDispoY - $quantiteRes;
                /**
                 * Aprés soutraction on fait le divison
                 */
                $echoQuant = $yaourts->getAllQuantiteIng($_POST['typeIng']);
                $recapCompt = $echoQuant->Compt;
                $quantiteDiv = $restF / $recapCompt;
                $yaourts->updateQuantiteProd($_POST['typeIng'], $quantiteDiv);
            } elseif ($lireYaoutUps->quantiteDispoY > $_POST['quantiteY']) {

                $quantiteRes =  $lireYaoutUps->quantiteDispoY - $_POST['quantiteY'];
                $retsFinal = $quantiteRes + $lireYaoutUps->quantiteDispoY;
                /**
                 * Aprés soutraction on fait le divison
                 * 
                 *$yaourts->updateYaourts($idUp, $_POST['typeYaourt'], $_POST['typeIng'], $_POST['quantiteY']);
                 */
                $echoQuant = $yaourts->getAllQuantiteIng($_POST['typeIng']);
                $recapCompt = $echoQuant->Compt;
                $quantiteDiv = $retsFinal / $recapCompt;
                $yaourts->updateQuantiteProd($_POST['typeIng'], $quantiteDiv);
            }
        } elseif ($lireYaoutUps->id_ty == $_POST['typeYaourt'] && $lireYaoutUps->id_typeI == $_POST['typeIng'] && $lireYaoutUps->quantiteDispoY != $_POST['quantiteY'] && isset($_POST['quantiteSou'])) {

            if ($lireYaoutUps->quantiteDispoY < $_POST['quantiteY']) {
                //Ici on fait la soustration
                $quantiteRes = $_POST['quantiteY'] - $lireYaoutUps->quantiteDispoY;

                $restF = $lireYaoutUps->quantiteDispoY - $quantiteRes;
                /**
                 * Aprés soutraction on fait le divison
                 */
                $echoQuant = $yaourts->getAllQuantiteIng($_POST['typeIng']);
                $recapCompt = $echoQuant->Compt;
                $quantiteDiv = $restF / $recapCompt;
                $yaourts->updateQuantiteProd($_POST['typeIng'], $quantiteDiv);
            } elseif ($lireYaoutUps->quantiteDispoY > $_POST['quantiteY']) {

                $quantiteRes =  $lireYaoutUps->quantiteDispoY - $_POST['quantiteY'];
                $retsFinal = $quantiteRes + $lireYaoutUps->quantiteDispoY;
                /**
                 * Aprés soutraction on fait le divison
                 * 
                 *
                 */
                $echoQuant = $yaourts->getAllQuantiteIng($_POST['typeIng']);
                $recapCompt = $echoQuant->Compt;
                $quantiteDiv = $retsFinal / $recapCompt;
                $yaourts->updateQuantiteProd($_POST['typeIng'], $quantiteDiv);
                //Cette vérification nous permetra de voir lap
            } elseif ($lireYaoutUps->id_ing != $_POST['typeIng'] && $lireYaoutUps->quantiteDispoY == $_POST['quantiteY'] && isset($_POST['quantiteSou'])) {

                if ($_POST['quantiteSou'] < $_POST['quantiteY']) {
                    echo '<script>alert("Vérifer le sock s\'il vous plait")</script>';
                } elseif ($_POST['quantiteSou'] > $_POST['quantiteY']) {

                    $quantiteRes = $_POST['quantiteSou'] - $_POST['quantiteY'];
                    /**
                     * Aprés soutraction on fait le divison
                     */
                    $echoQuant = $yaourts->getAllQuantiteIng($_POST['typeIng']);
                    $recapCompt = $echoQuant->Compt;
                    $quantiteDiv = $quantiteRes / $recapCompt;
                }
            }
        }
        $yaourts->updateYaourts($idUp, $_POST['typeYaourt'], $_POST['typeIng'], $_POST['quantiteY']);
    }
    $lireYaoutUps = $yaourts->yaourtDetail($idUp);
}
