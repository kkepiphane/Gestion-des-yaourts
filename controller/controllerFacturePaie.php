<?php

require('../models/modelFacturePaie.php');
require('../models/modelCommande.php');
require('../models/modelLivraison.php');
$facPaie = new ModelFacturePaie();
$commPaie = new ModelCommande();
$DisPaie = new ModelDistribution();


/**
 * Affichage des Commande qui sont mentionné comme livré
 */
$lireComm = $facPaie->getAllLivr();

/**
 * Affichage des distributions non payer dans le selecteur
 */
$LireDis = $facPaie->getAllDistributions();


/**
 * 
 * Partie | Commande par un Client
 * 
 * 
 */

/**
 * Onchange récupération des Client lié à la commande
 */
if (isset($_POST['id_IDclient'])) {
    $listeID_client = $facPaie->getClientIDN($_POST['id_IDclient']);

    $output = '';
    if ($listeID_client > 0) {
        foreach ($listeID_client as $lire_clientID) :;
            $output .= ' <option value=' . $lire_clientID->id_client  . '>' . $lire_clientID->nom_client . '</option>';
        endforeach;
    } else {
        $output .= ' <option>Aucun ingrédiant fourni </option>';
    }
    echo $output;
}
/**
 * Onchange récupère la date lié à la commande
 */
if (isset($_POST['dateComPaie'])) {
    $getDatePaie = $facPaie->getClientDATE($_POST['dateComPaie']);

    $output = '';
    if ($getDatePaie->id_dis_com  > 0) {
        $output .= ' <input class=" form-control" id="datePaieDis" name="datePaie" minlength="2" type="date"  value=' . $getDatePaie->date_paiment_com . '>';
    } else {
        $output .= ' <input class=" form-control" id="cname" name="datePaie" minlength="2" type="date" >';
    }
    echo $output;
}

/**
 * 
 * Facturation des commandes pour chaque Clients
 * 
 */
if (isset($_POST['BtnaddFactCom'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    /**
     * Récupération de l'id de distribution
     * 
     */
    $echDisCm = $facPaie->getIdDisCommm($_POST['CommandeID'], $_POST['IdClient']);
    $recuPID = $echDisCm->id_dis_com;

    $facPaie->addFactCommande($_POST['ref_fact_com'], $recuPID, $nomUser, $date);

    $facPaie->updFactComm($recuPID, $_POST['datePaie'], $_POST['etat_paie']);
    header('location:../views/addFacture.php');
}




/**
 * 
 * PArtie || Distribution direct pour un clients
 * 
 * 
 */

/**
 * Récupération des clients lié à la reférence de distribution
 */
if (isset($_POST['clientDiss'])) {
    $Dis_client = $facPaie->getDateDis($_POST['clientDiss']);

    $output = '';
    if ($Dis_client > 0) {
        $output .= ' <option value=' . $Dis_client->id_client  . '>' . $Dis_client->nom_client . '</option>';
    } else {
        $output .= ' <option>Aucun ingrédiant fourni </option>';
    }
    echo $output;
}
/**
 * Onchange récupère la date lié à la livraison direct
 */
if (isset($_POST['datePaieDissss'])) {
    $getDisDatePaie = $facPaie->getDateDis($_POST['datePaieDissss']);

    $output = '';
    if ($getDisDatePaie->idDis > 0) {
        $output .= ' <input class=" form-control" id="datePaieDis" name="dateLiv" minlength="2" type="date"  value=' . $getDisDatePaie->date_paiment . '>';
    } else {
        $output .= ' <input class=" form-control" id="cname" name="dateLiv" minlength="2" type="date" >';
    }
    echo $output;
}


/**
 * 
 * Partie de Facturation des distributions pour Chaque Clients
 * 
 * 
 */
if (isset($_POST['bttAddFactDisDirect'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $facPaie->addFactDistribution($_POST['ref_fact_dis'], $_POST['dis_prod'], $nomUser, $date);
    $facPaie->updFactDisss($_POST['dis_prod'], $_POST['dateLiv'], $_POST['etat_paie']);
    header('location:../views/addFacture_distribution.php');
}



/**
 * Affichage de la facture Partie des commandes
 */

if (isset($_GET['id_fac_paie_com'])) {

    $factCommmm = $facPaie->FactureCommandeHead($_GET['id_fac_paie_com']);
    
    $factprooodFactt = $facPaie->FactureCommandeBody($_GET['id_fac_paie_com']);
}

/**
 * Affichage de la facture Partie des commandes
 */

if (isset($_GET['id_fact_livraison'])) {

    $factDissH = $facPaie->factureDistributionDirectH($_GET['id_fact_livraison']);
    
    $factprooodDisBy = $facPaie->factureDistributionDirectB($_GET['id_fact_livraison']);
}
