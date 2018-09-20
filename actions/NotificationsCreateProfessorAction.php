<?php

include_once '../business/NotificationBusiness.php';

$text = $_POST['text'];
$admin = $_POST['admin'];

if (isset($text) && $text != "" && isset($admin) && $admin != "") {
    $notificationBusiness = new NotificationBusiness();
    $notification = new Notification($admin, $text, null);

    if ($notificationBusiness->insertProfessorNotification($notification) != 0) {
        header("location: ../view/NotificationsShowProfessors.php?action=1&msg=Registro_creado_correctamente");
    } else {
        header("location: ../view/CreateNotificationProfessor.php?action=0&msg=Registro_fallido");
    }
} else {
    header("location: ../view/NotificationsShowProfessors.php?action=0&msg=Error_en_los_datos");
}
