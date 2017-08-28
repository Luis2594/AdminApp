<?php
//cargar
//post
//Recibe username y userpassword
//Retorna los foros de ese usuario si los credenciales son válidos, nulo si no es valido

include '../business/UserBusiness.php';
    
//if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['userpassword'])) { //isset($_POST['funcion']) && 
//        if ($_POST['funcion'] == 'Cargar') {
            $business = new UserBusiness();
            $person = $business->isUser($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                include '../business/ForumBusiness.php';
                $forumBusiness = new ForumBusiness();
                $result = [];
                foreach ($forumBusiness->getForumsByUser($person->getPersonId()) as $current) {
                    $array[] = array("forumid" => $current->getId(),
                        "forumname" => $current->getName(),
                        "forumcourse" => $current->getCourse(),
                        "forumpofessor" => $current->getProfessor()
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