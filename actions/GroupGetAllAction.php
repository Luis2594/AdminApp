<?php

include_once __DIR__.'/../business/GroupBusiness.php';

$business = new GroupBusiness();
$result = $business->getAllGroups();
echo json_encode($result);
