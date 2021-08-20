<?php

require_once '../db/bdd.php';
class ModelNotification
{
    public function addNotification($subjectNot, $dateD, $dateFin, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO notifications(suject_not, date_debut_noti, datefin, user_create, date_create) VALUES (?,?,?,?,?)");
            $executNot = $query->execute(array($subjectNot, $dateD, $dateFin, $user_create, $date_create));
            return $executNot;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllNotifications()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM notifications");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function idNotification($idNot)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM notifications WHERE id_not=?");
            $query->execute(array($idNot));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateNotification($idNot, $subjectNot, $dateD, $dateFin)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE notifications SET suject_not = ?, date_debut_noti = ?, datefin =? WHERE id_not = '" . $idNot . "'");
            $executNotifi = $query->execute(array($subjectNot, $dateD, $dateFin));
            return $executNotifi;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteNotification($idNot)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM notifications WHERE id_not=?");
            $delNot = $query->execute(array($idNot));
            return $delNot;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
