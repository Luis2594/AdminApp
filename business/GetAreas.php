<?php

include_once './AreaBusiness.php';

$areaBusiness = new AreaBusiness();
$result = $areaBusiness->getAllToSelect();
//echo json_encode($result);
echo json_encode($result, JSON_UNESCAPED_UNICODE);

