<?php

include_once './FreeCourseBusiness.php';

$area = $_POST['area'];

$freeCourseBusiness = new FreeCourseBusiness();
$result = $freeCourseBusiness->getCourseByArea($area);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
