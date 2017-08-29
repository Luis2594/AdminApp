<?php

//Cargar
//post
//Recibe username y userpassword
//Retorna las conversaciones de ese usuario si los credenciales son válidos, nulo si no es valido
include '../business/UserBusiness.php';
//if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['userpassword'])) {
//        if ($_POST['funcion'] == 'Cargar') {
            $userBusiness = new UserBusiness();
            $person = $userBusiness->isUser($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                include '../business/ConversationBusiness()';
                $business = new ConversationBusiness();
                $result = [];
                foreach ($business->getConversationsByUser($person->getPersonId()) as $conversation) {
                    $array[] = array("forumconversationid" => $conversation->getForumConversationId(),
                        "forumid" => $conversation->getForumId(),
                        "forumconversation" => $conversation->getForumConversation()
                        );
                    array_push($result, $array);
                }
                echo json_encode($result);
            } else {
                echo json_encode(NULL);
            }
//        } else {
//            echo json_encode(NULL);
//        }
    } else {
        echo json_encode(NULL);
    }
//} else {
//    echo json_encode(NULL);
//}