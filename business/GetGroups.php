<?php

include './GroupBusiness.php';

$groupBusiness = new GroupBusiness();
$result = $groupBusiness->getAll();
echo json_encode($result);

