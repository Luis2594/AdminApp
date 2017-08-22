<?php

include '../business/UserBusiness.php';

//Cargar
//post
//Recibe username y userpassword
//Retorna la persona con ese usuario si los
//credenciales son válidos, nulo si no es valido

//if (!empty($_POST)) {
//    if (isset($_POST['funcion']) && isset($_POST['username']) && isset($_POST['userpassword'])) {
    if (isset($_POST['username']) && isset($_POST['userpassword'])) {
//        if ($_POST['funcion'] == 'Cargar') {
            $userBusiness = new UserBusiness();
            $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                echo json_encode($person);
            } else {
//                echo json_encode(NULL);
                echo null;
            }
//        } else {
//            echo json_encode(NULL);
//        }
    } else {
//        echo json_encode(NULL);
        echo null;
    }
//} else {
//    echo json_encode(NULL);
//}