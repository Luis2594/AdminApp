<?php

include_once '../business/GroupBusiness.php';

$business = new GroupBusiness();
$result = $business->getAllGroups();
echo json_encode($result);
