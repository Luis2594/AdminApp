<?php

include './EnrollmentBusiness.php';

$dateStart = $_GET['dateStart'];
$dateEnd = $_GET['dateEnd'];

$enrollmentBusiness = new EnrollmentBusiness();
$result[] = array("totalParcialEnrollment" => $enrollmentBusiness->getAllParcialStudentsEnrollment($dateStart, $dateEnd),
    "totalStudentsSecondLevel" => $enrollmentBusiness->getTotalStudentsSecondLevel($dateStart, $dateEnd),
    "totalStudentsSecondLevelWoman" => $enrollmentBusiness->getTotalStudentsSecondLevelWoman($dateStart, $dateEnd),
    "totalStudentsSecondLevelMen" => $enrollmentBusiness->getTotalStudentsSecondLevelMan($dateStart, $dateEnd),
    "totalStudentsThirdLevel" => $enrollmentBusiness->getTotalStudentsThirdLevel($dateStart, $dateEnd),
    "totalStudentsThirdLevelWoman" => $enrollmentBusiness->getTotalStudentsThirdLevelWoman($dateStart, $dateEnd),
    "totalStudentsThirdLevelMen" => $enrollmentBusiness->getTotalStudentsThirdLevelMan($dateStart, $dateEnd));

//$result[] = array("totalStudentsSecondLevel" => $enrollmentBusiness->getTotalStudentsSecondLevel());

echo json_encode($result);
