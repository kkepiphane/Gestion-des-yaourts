<?php
require  '../models/modelLivreur.php';
$livreur = new ModelLivreur();

/**
 * Affichage de l'infromation de tout les Livreurs
 */
$allLiv = $livreur->getAllLivreurs();


/**
 * affichage des derniers ajout des Livreur
 */
$daLiv = $livreur->getLivreur();

/**
 * AJOUT DES LIVREUR
 */
if (isset($_POST['btnAddLiv'])) {    
    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
         $livreur->addLivreur($_POST['nomLiv'], $_POST['telLivreur'],$nomUser,$date);
         header('location:../views/addLivreur.php');
    }
/**
 * Supression d'un Livreur
 */
if(isset($_GET['id_dLiv'])){
    $livreur->deleteLiv($_GET['id_dLiv']);
    header('location:../views/addLivreur.php');
}elseif(isset($_GET['id_dLLiv'])){
    $livreur->deleteLiv($_GET['id_dLLiv']);
    header('location:../views/listeLivreur.php');
}

/**Modification et affichage des données à Livreur*/

if(isset($_GET['id_liv'])){
    $idUpLiv = $_GET['id_liv'];
if (isset($_POST['btnUpLivreur'])) {
$livreur->updateLivreur($idUpLiv, $_POST['nomLiv'], $_POST['telLivreur']);
}
$lireLivreur = $livreur->idLivreur($idUpLiv);
}
