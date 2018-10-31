<?php

include_once __DIR__.'/./GroupBusiness.php';

$groupBusiness = new GroupBusiness();
$result = $groupBusiness->getAll();
echo json_encode($result);
