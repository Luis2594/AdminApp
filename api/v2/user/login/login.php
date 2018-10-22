<?php

include '../business/UserBusiness.php';
include_once '../../../../resource/Constants.php';

if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != null) {
        echo json_encode(array("token" => Constants::KEY, "username" => $_POST['username']));
    } else {
        echo null;
    }
} else {
    echo null;
}
