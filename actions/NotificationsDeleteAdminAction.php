<?php

include_once './NotificationBusiness.php';

$id = $_GET['id'];

if(isset($id)){
    $notificationBusiness = new NotificationBusiness();
    if($notificationBusiness->deteleAdminNotification($id)){
        header("location: ../view/NotificationsShowAdmin.php?action=1&msg=Registro_eliminado_correctamente");
    }else{
        header("location: ../view/NotificationsShowAdmin.php?action=0&msg=Error_al_eliminar_registro");
    }
}else{
    header("location: ../view/NotificationsShowAdmin.php?action=0&msg=Error_al_capturar_los_datos");
}
