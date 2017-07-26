<?php
//cargar
//post
//Recibe username y userpassword
//Retorna las notificaciones si los credenciales son válidos, nulo si no es valido
include '../business/UserBusiness.php';
if (!empty($_POST)) {
    if (isset($_POST['funcion']) && isset($_POST['username']) && isset($_POST['userpassword'])) {
        if ($_POST['funcion'] == 'Cargar') {
            $userBusiness = new UserBusiness();
            $person = $userBusiness->isUser($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                include '../business/NotificationBusiness.php';
                $notificationBusiness = new NotificationBusiness();
                
                //TODO
                //para proximas versiones se podrá leer notificaciones de tipo:
                //general y relacionadas al usuario
                
                echo json_encode($notificationBusiness->getAllNotificationByStudent());
            } else {
                echo json_encode(NULL);
            }
        } else {
            echo json_encode(NULL);
        }
    } else {
        echo json_encode(NULL);
    }
} else {
    echo json_encode(NULL);
}