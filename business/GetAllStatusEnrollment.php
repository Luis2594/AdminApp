<?php

include './EnrollmentBusiness.php';

$enrollmentBusiness = new EnrollmentBusiness();
$result[] = array("totalStudents" => $enrollmentBusiness->getTotalStudents(),
    "totalEnrollment" => $enrollmentBusiness->getAllStudentEnrollmented());

echo json_encode($result);
