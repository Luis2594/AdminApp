<?php

include_once './CourseBusiness.php';

$period = (int)$_POST['period'];
$year = (int)$_POST['year'];
$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCoursesAllProfessorsByFilters($period, $year);
echo json_encode($result);

