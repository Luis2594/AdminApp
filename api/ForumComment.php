<?php

//Cargar
//post
//Recibe username y userpassword
//Retorna los comentarios que involucran ese usuario si los credenciales son válidos, nulo si no es valido
//Insertar
//post
//Recibe username, userpassword, idforumconversation y nuevo comentario
//Retorna los comentarios de esa conversacion si los credenciales son válidos, nulo si no es valido
include '../business/CommentBusiness.php';
if (!empty($_POST)) {
    if (isset($_POST['funcion']) && isset($_POST['username']) && isset($_POST['userpassword'])) {

        $userBusiness = new UserBusiness();
        $person = $userBusiness->isUser($_POST['username'], $_POST['userpassword']);
        if ($person == NULL) {
            echo json_encode(NULL);
            return;
        }

        include '../business/CommentBusiness.php';
        $business = new CommentBusiness();
        switch ($_POST['funcion']) {

            case 'Cargar':
                echo json_encode($business->getCommentsByUser($person->getPersonId()));
                break;

            case 'Insertar':
                if (isset($_POST['numero'])) {
                    $business->insert(new Comment(0, $_POST['idforumconversation'], $person->getPersonId(), $_POST['comment']));
                    echo json_encode($business->getCommentsByUser($person->getPersonId()));
                } else {
                    echo json_encode(NULL);
                }
                break;
            default:
                echo json_encode(NULL);
                break;
        }
    } else {
        echo json_encode(NULL);
    }
} else {
    echo json_encode(NULL);
}