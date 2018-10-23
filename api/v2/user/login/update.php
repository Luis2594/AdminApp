<?php

include '../../../../business/UserBusiness.php';
include_once '../../../../resource/Constants.php';

if (isset($_POST['username']) && isset($_POST['userpassword'])) {
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
} else {
    echo null;
}
