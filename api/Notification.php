<?php

//cargar
//post
//Recibe username y userpassword
//Retorna las notificaciones si los credenciales son válidos, nulo si no es valido
include_once __DIR__.'/../business/UserBusiness.php';
if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != null) {
        include_once __DIR__.'/../business/NotificationBusiness.php';
        $notificationBusiness = new NotificationBusiness();
        $result = [];
        foreach ($notificationBusiness->getAllNotificationsByStudent($person['personid']) as $current) {
            $array = array("notificationid" => $current->getNotificationId(),
                "notificationtext" => $current->getNotificationText(),
                "notificationdate" => $current->getNotificationDate(),
            );
            array_push($result, $array);
        }
        echo json_encode($result);
    } else {
        echo json_encode(null);
    }
} else {
    echo json_encode(null);
}
