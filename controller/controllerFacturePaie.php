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
 * Onchange de valeurs directement dans la base
 */
if (isset($_POST['dateComPaie'])) {
    $getDatePaie = $facPaie->getClientDATE($_POST['dateComPaie']);

    $output = '';
    if ($getDatePaie->id_dis_com  > 0) {
        $output .= ' <input class=" form-control" id="datePaieDis" name="dateLivraison" minlength="2" type="date"  value=' . $getDatePaie->date_paiment_com . '>';
    } else {
        $output .= ' <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date" >';
    }
    echo $output;
}
