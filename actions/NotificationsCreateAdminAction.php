<?php

include_once '../business/NotificationBusiness.php';

$text = $_POST['text'];

if (isset($text) && $text != "") {
    $notificationBusiness = new NotificationBusiness();
    $notification = new Notification(null, $text, null);

    if ($notificationBusiness->insertAdminNotification($notification) != 0) {
        header("location: ../view/NotificationsShowAdmin.php?action=1&msg=Registro_creado_correctamente");
    } else {
        header("location: ../view/NotificationsCreateAdmin.php?action=0&msg=Registro_fallido");
    }
} else {
    header("location: ../view/NotificationsShowAdmin.php?action=0&msg=Error_en_los_datos");
}
