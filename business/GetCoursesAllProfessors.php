<?php

include_once './CourseBusiness.php';

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCoursesAllProfessors();
echo json_encode($result);
