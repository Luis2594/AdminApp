<?php

include_once __DIR__.'/./CourseBusiness.php';

$id = (int)$_POST['id'];

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCourseToAssignProfessor($id);
echo json_encode($result);

