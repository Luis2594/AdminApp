<?php
//Editar
//Post
//Recibe username, userpassword y newpassword
//Retorna la contraseña de ese usuario si los
//credenciales son válidos, nulo si no es valido

include '../business/UserBusiness.php';

//if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['userpassword'])) {
//        if ($_POST['funcion'] == 'Cargar') {
            $userBusiness = new UserBusiness();
            $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                echo json_encode($_POST['username']);
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