<?php

include_once __DIR__.'/../business/NotificationBusiness.php';

$id = $_GET['id'];

if (isset($id)) {
    $notificationBusiness = new NotificationBusiness();
    if ($notificationBusiness->deleteStudentNotification($id)) {
        header("location: ../view/NotificationsShowStudents.php?action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/NotificationsShowStudents.php?action=0&msg=Error_al_eliminar_registro");
    }
} else {
    header("location: ../view/NotificationsShowStudents.php?action=0&msg=Error_al_capturar_los_datos");
}
