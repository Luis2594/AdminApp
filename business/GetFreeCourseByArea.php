<?php

include_once __DIR__.'/./FreeCourseBusiness.php';

$area = $_POST['area'];

$freeCourseBusiness = new FreeCourseBusiness();
$result = $freeCourseBusiness->getCourseByArea($area);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
