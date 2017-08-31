<?php

include './UserBusiness.php';

$user = $_POST['username'];
$passOld = $_POST['userpassword'];
$passNew = $_POST['passUpdate'];

if (isset($user) && isset($passOld) && isset($passNew) && $user != "" && $passOld != "" && $passOld != "" && isset($id)) {
    $userBusiness = new UserBusiness();
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != NULL) {
        if ($userBusiness->updatePassword($person->getPersonId(), $passOld, $passNew) == 1) {
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

