<?php

include_once __DIR__.'/../business/NotificationBusiness.php';

$text = $_POST['text'];
$admin = $_POST['admin'];

if (isset($text) && $text != "" && isset($admin) && $admin != "") {
    $notificationBusiness = new NotificationBusiness();
    $notification = new Notification($admin, $text, null);

    if ($notificationBusiness->insertAdminNotification($notification) != 0) {
        header("location: ../view/NotificationsShowAdmins.php?action=1&msg=Registro_creado_correctamente");
    } else {
        header("location: ../view/CreateNotificationAdmin.php?action=0&msg=Registro_fallido");
    }
} else {
    header("location: ../view/NotificationsShowAdmins.php?action=0&msg=Error_en_los_datos");
}
