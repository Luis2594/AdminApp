<?php

include_once __DIR__.'/../../../business/UserBusiness.php';

if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != null) {
        echo json_encode($person);
    } else {
        echo null;
    }
} else {
    echo null;
}
