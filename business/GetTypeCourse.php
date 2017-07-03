<?php

include './CourseBusiness.php';

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getType();
echo json_encode($result);
?>

