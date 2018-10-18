<?php

//Change
//Post
//Recibe username, userpassword y newpassword
//Retorna la contraseña de ese usuario si los
//credenciales son válidos, nulo si no es valido

include '../business/UserBusiness.php';
include_once '../resource/Constants.php';

if (isset($_POST['option']) && isset($_POST['username']) && isset($_POST['userpassword'])) {
    switch ($_POST['option']) {

        case 'Login':
            $userBusiness = new UserBusiness();
            $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
            $key = $userBusiness->getKey();
            if ($person != null) {
                echo json_encode( array("key" => $key,"username" => $_POST['username']));
            } else {
                echo null;
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
                if ($person != null) {
                    if ($userBusiness->updatePassword($person['personid'], $passOld, $passNew) == 1) {
                        $user = $userBusiness->getUserId($person['personid']);
                        echo json_encode(array("username" => $user->getUserUsername()
                            , "userpassword" => $user->getUserPass(), "token" => Constants::KEY));
                    } else {
                        echo null;
                    }
                } else {
                    echo null;
                }
            } else {
                echo null;
            }
            break;
    }
} else {
    echo null;
}
