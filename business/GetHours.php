<?php

include_once './Days_HoursBusiness.php';

$hourBusiness = new Days_HoursBusiness();
$result = $hourBusiness->getHours();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
