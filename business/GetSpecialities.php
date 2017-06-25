<?php

include './SpecialityBusiness.php';

$specialityBusiness = new SpecialityBusiness();
$result = $specialityBusiness->getAllSpecialitiesForCourse();
echo json_encode($result);
?>

