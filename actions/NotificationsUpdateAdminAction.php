<?php

include_once '../business/NotificationBusiness.php';

$id = $_POST['id'];
$text = $_POST['text'];

if(isset($text) && $text != ""){
    $notificationBusiness = new NotificationBusiness();
    $notification = new Notification($id, $text,NULL);
    
    if($notificationBusiness->updateAdminNotification($notification) != 0){
        header("location: ../view/NotificationsShowAdmins.php?action=1&msg=Registro_actualizado_correctamente");
    }else{
        header("location: ../view/NotificationsUpdateAdmin.php?id=".$id."&action=0&msg=Actualización_fallida");
    }
}else{
    //error
    header("location: ../view/NotificationsUpdateAdmin.php?id=".$id."&action=0&msg=Error_en_los_datos");
}
