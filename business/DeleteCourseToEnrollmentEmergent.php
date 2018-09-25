<?php

include './EnrollmentEmergentBusiness.php';

$id = (int) $_POST['id'];

if (isset($id) && is_int($id)) {
    $enrollmentBusiness = new EnrollmentEmergentBusiness();
    if ($enrollmentBusiness->delete($id)) {
        echo TRUE;
    } else {
        echo FALSE;
    }
} else {
    echo FALSE;
}