<?php

include_once __DIR__.'/./CourseBusiness.php';

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getType();
echo json_encode($result);
