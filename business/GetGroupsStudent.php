<?php

include_once __DIR__.'/./GroupBusiness.php';

$id = $_POST['id'];

$groupBusiness = new GroupBusiness();
$result = $groupBusiness->getGroupByStudent($id);
echo json_encode($result);
