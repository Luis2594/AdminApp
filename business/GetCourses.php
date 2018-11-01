<?php

include_once __DIR__.'/./CourseBusiness.php';

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCourseToAssignProfessor($_POST['professor']);

echo json_encode($result);
