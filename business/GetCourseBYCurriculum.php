<?php

include_once __DIR__.'/./CurriculumBusiness.php';

$id = $_POST['id'];
$curriculumBusiness = new CurriculumBusiness();
$result = $curriculumBusiness->getCurriculumCourseEnrollment($id);
echo json_encode($result);
