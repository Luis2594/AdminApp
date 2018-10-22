<?php

include_once '../../../business/UserBusiness.php';

if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != null) {
        include_once '../../../business/ScheduleBusiness.php';
        $scheduleBusiness = new ScheduleBusiness();
        $result = $scheduleBusiness->getScheduleByStudent($person['personid']);
        echo json_encode($result);
    } else {
        echo json_encode(null);
    }
} else {
    echo json_encode(null);
}
