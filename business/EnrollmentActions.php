<?php

include './EnrollmentBusiness.php';

$enrollment = (int) $_POST['enrollment'];
$value = (int) $_POST['value'];

$enrollmentBusiness = new EnrollmentBusiness();
$result = $enrollmentBusiness->enrollmentActions($enrollment, $value);
echo json_encode($result);
