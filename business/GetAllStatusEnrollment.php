<?php

include_once __DIR__.'/./EnrollmentBusiness.php';

$enrollmentBusiness = new EnrollmentBusiness();
$result[] = array("totalStudents" => $enrollmentBusiness->getTotalStudents(),
    "totalEnrollment" => $enrollmentBusiness->getAllStudentEnrollmented());

echo json_encode($result);
