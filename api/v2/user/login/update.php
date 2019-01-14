<?php

include_once __DIR__ . '/../../../../business/UserBusiness.php';
include_once __DIR__ . '/../../../../resource/Constants.php';

if (isset($_POST['username']) && isset($_POST['userpassword']) && isset($_POST['passupdate'])) {
    $user = $_POST['username'];
    $passOld = $_POST['userpassword'];
    $passNew = $_POST['passupdate'];
    if (isset($user) && isset($passOld) && isset($passNew) && $user != "" && $passOld != "" && $passOld != "") {
        $userBusiness = new UserBusiness();
        $person = $userBusiness->isStudent($user, $passOld);
        if ($person != null) {
            if ($userBusiness->updatePassword($person['personid'], $passOld, $passNew) == 1) {
                $user = $userBusiness->getUserId($person['personid']);
                echo json_encode(array("username" => $user->getUserUsername()
                    , "userpassword" => $user->getUserPass(), "token" => Constants::KEY));
            } else {
                echo json_encode("Update Error");
            }
        } else {
            echo json_encode("User Error");
        }
    } else {
        echo json_encode("Parameters Error");
    }
} else {
    echo json_encode("User Error");
}
