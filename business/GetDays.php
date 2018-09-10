<?php

include_once './Days_HoursBusiness.php';

$dayBusiness = new Days_HoursBusiness();
$result = $dayBusiness->getDays();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
