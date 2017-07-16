<?php

//Cargar
//post
//Recibe username y userpassword
//Retorna el horario si los credenciales son válidos, nulo si no es valido
//Luis me dijo que lo iban a hacer por grupos, pero no lo veo así en la base
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