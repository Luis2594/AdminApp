<?php

include_once '../business/UserBusiness.php';

if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != NULL) {
        include_once '../business/CourseBusiness.php';
        $courseBusiness = new CourseBusiness();
        $result = $courseBusiness->getCourseByStudent($person['personid']);
        echo json_encode($result);
    } else {
        echo json_encode(NULL);
    }
} else {
    echo json_encode(NULL);
}
