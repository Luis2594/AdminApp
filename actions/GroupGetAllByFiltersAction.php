<?php

include_once '../business/GroupBusiness.php';

$period = (int)$_POST['period'];
$year = (int)$_POST['year'];

$business = new GroupBusiness();
$result = $business->getAllGroupsByFilters($period, $year);
echo json_encode($result);

