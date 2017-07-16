<?php

//Cargar
//post
//Recibe username y userpassword
//Retorna las conversaciones de ese usuario si los credenciales son válidos, nulo si no es valido
include '../business/UserBusiness.php';
if (!empty($_POST)) {
    if (isset($_POST['funcion']) && isset($_POST['username']) && isset($_POST['userpassword'])) {
        if ($_POST['funcion'] == 'Cargar') {
            $userBusiness = new UserBusiness();
            $person = $userBusiness->isUser($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                include '../business/ConversationBusiness()';
                $business = new ConversationBusiness();
                echo json_encode($business->getConversationsByUser($person->getPersonId()));
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