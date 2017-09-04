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
if (isset($_POST['option']) && isset($_POST['username']) && isset($_POST['userpassword'])) {

    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person == NULL) {
        echo json_encode(NULL);
        return;
    }

    include '../business/CommentBusiness.php';
    $business = new CommentBusiness();
    switch ($_POST['option']) {

        case 'Load':
            $result = [];
            foreach ($business->getCommentsByUser($person['personid']) as $current) {
                $array = array("forumcommentid" => $current->getId(),
                    "forumcommentcomment" => $current->getComment(),
                    "forumcommentforumconversation" => $current->getConversation(),
                    "person" => $current->getPerson()
                );
                array_push($result, $array);
            }
            echo json_encode($result);
            break;
        case 'Insert':
            if (isset($_POST['number'])) {
                $business->insert(new Comment(0, $_POST['idforumconversation'], $person['personid'], $_POST['comment']));
                $result = [];
                foreach ($business->getCommentsByUser($person['personid']) as $current) {
                    $array = array("forumcommentid" => $current->getId(),
                        "forumcommentcomment" => $current->getComment(),
                        "forumcommentforumconversation" => $current->getConversation(),
                        "person" => $current->getPerson()
                    );
                    array_push($result, $array);
                }
                echo json_encode($result);
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