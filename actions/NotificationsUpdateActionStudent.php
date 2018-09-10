<?php

include_once '../business/NotificationBusiness.php';

$id = $_POST['id'];
$text = $_POST['text'];

if (isset($text) && $text != "") {
    $notificationBusiness = new NotificationBusiness();
    $notification = new Notification($id, $text, null, null, null, null, null, null);

    if ($notificationBusiness->updateStudentNotification($notification) != 0) {
        header("location: ../view/NotificationsShowStudents.php?action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/NotificationsUpdateStudent.php?id=" . $id . "&action=0&msg=Actualización_fallida");
    }
} else {
    //error
    header("location: ../view/NotificationsUpdateStudent.php?id=" . $id . "&action=0&msg=Error_en_los_datos");
}
