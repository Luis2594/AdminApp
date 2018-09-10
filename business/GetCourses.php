<?php

include_once './CourseBusiness.php';

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCourseToAssignProfessor($_POST['professor']);

echo json_encode($result);
