<?php

include './EnrollmentBusiness.php';

$option = (int) $_POST['option'];

$enrollmentBusiness = new EnrollmentBusiness();
$result;
switch ($option) {
    case 0:
        $result = $enrollmentBusiness->getTotalEnrrollment();
        break;
    case 1:
        $result = $enrollmentBusiness->getTotalStudentsActive();
        break;
    case 2:
        $result = $enrollmentBusiness->getTotalStudentsInactive();
        break;
    case 3:
        $result = $enrollmentBusiness->getTotalStudentsSecondLevel();
        break;
    case 4:
        $result = $enrollmentBusiness->getTotalStudentsSecondLevelWoman();	
        break;
    case 5:
        $result = $enrollmentBusiness->getTotalStudentsSecondLevelMan();
        break;
    case 6:
        $result = $enrollmentBusiness->getTotalStudentsThirdLevel();
        break;
    case 7:
        $result = $enrollmentBusiness->getTotalStudentsThirdLevelWoman();
        break;
    case 8:
        $result = $enrollmentBusiness->getTotalStudentsThirdLevelMan();
        break;
    default:
        $result = 0;
        break;
}

echo json_encode($result);