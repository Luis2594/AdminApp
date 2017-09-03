<?php

//Change
//Post
//Recibe username, userpassword y newpassword
//Retorna la contraseña de ese usuario si los
//credenciales son válidos, nulo si no es valido

include '../business/UserBusiness.php';

if (isset($_POST['option']) && isset($_POST['username']) && isset($_POST['userpassword'])) {
    switch ($_POST['option']) {

        case 'Login':
            $userBusiness = new UserBusiness();
            $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                echo json_encode($_POST['username']);
            } else {
                echo NULL;
            }
            break;
        case 'Change':
            include './UserBusiness.php';

            $user = $_POST['username'];
            $passOld = $_POST['userpassword'];
            $passNew = $_POST['passUpdate'];
            
            if (isset($user) && isset($passOld) && isset($passNew) && $user != "" && $passOld != "" && $passOld != "") {
                $userBusiness = new UserBusiness();
                $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
                if ($person != NULL) {
                    if ($userBusiness->updatePassword($person['personid'], $passOld, $passNew) == 1) {
                        echo json_encode($person);
                    } else {
                        echo NULL;
                    }
                } else {
                    echo null;
                }
            } else {
                echo NULL;
            }
            break;
    }
} else {
    echo json_encode(NULL);
}