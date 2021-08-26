<?php
require  '../models/modelNotification.php';
$notifiers = new ModelNotification();


//Système de notificationave JSON et Jquery

$output = '';
if (isset($_POST["view"])) {
    if ($_POST["view"] != '') {
        $notifiers->updateN();
    }
    $allNotifications = $notifiers->getAllNotifications();
    if ($allNotifications > 0) {
        foreach ($allNotifications as $echoNotf) :;
            $output .= '
        <li>
            <a href="#">
                <strong>' . $echoNotf->suject_not . '</strong><br/>
                <strong><em>' . $echoNotf->date_debut_noti . '</em></strong>
            </a>
        </li>
        ';
        endforeach;
    } else {
        $output .= '<li><a href="#" class="text-italic">Pas de Notification</a></li>';
    }

    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM notifications WHERE statu_notif = 0");
    $query->execute();

    $count = $query->rowCount();

    $data = array(
        'notification' => $output,
        'unseen_notification' => $count,
    );
    echo json_encode($data);
}

/**
 * AJOUT DES CLIENTS
 */
if (isset($_POST['sujet'])) {

    $nomUser = $_SESSION['nom_user'];
    $date = date('Y:m:d');
    $notifiers->addNotification($_POST['sujet'], $_POST['dateAvnt'], $_POST['daysD'], $nomUser, $date);
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
