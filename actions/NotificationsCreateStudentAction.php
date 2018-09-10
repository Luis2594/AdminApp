<?php

include_once '../business/NotificationBusiness.php';

$text = $_POST['text'];

if(isset($text) && $text != ""){
    $notificationBusiness = new NotificationBusiness();
    $notification = new Notification(NULL, $text,NULL);
    
    if($notificationBusiness->insertStudentNotification($notification) != 0){
        header("location: ../view/NotificationsShowStudents.php?action=1&msg=Registro_creado_correctamente");
    }else{
        header("location: ../view/NotificationsCreateStudent.php?action=0&msg=Registro_fallido");
    }
}else{
    header("location: ../view/NotificationsCreateStudent.php?action=0&msg=Error_en_los_datos");
}
