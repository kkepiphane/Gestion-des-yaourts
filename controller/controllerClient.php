<?php
require  '../models/modelClient.php';
$client = new ModelClients();



/**
 * affichage des derniers ajout
 */

/**
 * AJOUT DES CLIENTS
 */
if (isset($_POST['btnClient'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $client->addClient($_POST['nomClt'], $_POST['adresse'], $_POST['telephone'], $nomUser, $date);
    header('location:../views/addClient.php');
} else {
    $aaClient = $client->getClients();
}
/**
 * Supression d'un clients
 */
if (isset($_GET['id_Dclt'])) {
    $client->deleteClt($_GET['id_Dclt']);
    $aaClient = $client->getClients();
} elseif (isset($_GET['id_DLclt'])) {
    $client->deleteClt($_GET['id_DLclt']);

    $allClient = $client->getAllClients();
} else {

    $allClient = $client->getAllClients();
}


if (isset($_GET['id_clt'])) {
    $idUp = $_GET['id_clt'];
    if (isset($_POST['btnUpClient'])) {
        $client->updateClient($idUp, $_POST['nomClt'], $_POST['adresse'], $_POST['telephone']);
    }
    $lireClient = $client->idClient($idUp);
}
