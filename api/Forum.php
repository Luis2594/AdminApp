<?php
//cargar
//post
//Recibe username y userpassword
//Retorna los foros de ese usuario si los credenciales son válidos, nulo si no es valido

include '../business/UserBusiness.php';
    
if (!empty($_POST)) {
    if (isset($_POST['funcion']) && isset($_POST['username']) && isset($_POST['userpassword'])) {
        if ($_POST['funcion'] == 'Cargar') {
            $business = new UserBusiness();
            $person = $business->isUser($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                include '../business/ForumBusiness.php';
                $forumBusiness = new ForumBusiness();
                echo json_encode($forumBusiness->getForumsByUser($person->getPersonId()));
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