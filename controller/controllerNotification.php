<?php
require  '../models/modelNotification.php';
$notifiers = new ModelNotification();



$allNotifications = $notifiers->getAllNotifications();


/**
 * AJOUT DES CLIENTS
 */
if (isset($_POST['btnaddNotification'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $notifiers->addNotification($_POST['sujet'], $_POST['dateAvnt'], $_POST['daysD'], $nomUser, $date);
    header('location:../views/addSystemNot.php');
}
/**
 * Supression d'un clients
 */
if (isset($_GET['idDelNot'])) {
    $notifiers->deleteNotification($_GET['idDelNot']);
    header('location:../views/addSystemNot.php');
}


if (isset($_GET['idUpdNotif'])) {
    $idUp = $_GET['idUpdNotif'];
    if (isset($_POST['btnUpdNotification'])) {
        $notifiers->updateNotification($idUp, $_POST['sujet'], $_POST['dateAvnt'], $_POST['daysD']);
        echo "<script> alert('Modification réussi avec sucess')</script>";
    }

    $lireUpdNot = $notifiers->idNotification($idUp);
}
