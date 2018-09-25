<?php

include './EnrollmentEmergentBusiness.php';

$id = (int) $_POST['id'];
$modules = $_POST['modules'];

if (isset($id) && is_int($id) && isset($modules)) {

    $enrollmentEmergentBusiness = new EnrollmentEmergentBusiness();

    $arrayCourses = explode(",", $modules);

    for ($i = 0; $i < count($arrayCourses); $i++) {
        $enrollment = new EnrollmentEmergent(NULL, $id, $arrayCourses[$i], (date("Y") + 1), 1, "", "");
        $enrollmentEmergentBusiness->insert($enrollment);
    }

    echo TRUE;
} else {
    echo FALSE;
}
