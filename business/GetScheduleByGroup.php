<?php

include_once __DIR__.'/./ScheduleBusiness.php';

$group = (int) $_POST['group'];

$scheduleBusiness = new ScheduleBusiness();
$result = $scheduleBusiness->getScheduleBYGroup($group);

echo json_encode($result);
