<?php

include_once './EnrollmentEmergentBusiness.php';

$id = $_POST['id'];

$enrollmentEmergentBusiness = new EnrollmentEmergentBusiness();
$result = $enrollmentEmergentBusiness->enrollmentCourseByPerson($id);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
