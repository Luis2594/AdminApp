<?php

include_once __DIR__.'/./CurriculumBusiness.php';

$curriculumBusiness = new CurriculumBusiness();
$result = $curriculumBusiness->getAllEnrollment();
echo json_encode($result);
