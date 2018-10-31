<?php

include_once __DIR__.'/./SpecialityBusiness.php';

$specialityBusiness = new SpecialityBusiness();
$result = $specialityBusiness->getAllSpecialitiesForCourse();
echo json_encode($result);
