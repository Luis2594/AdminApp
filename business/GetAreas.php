<?php

include_once './AreasBusiness.php';

$areaBusiness = new AreasBusiness();
$result = $areaBusiness->getAllToSelect();
//echo json_encode($result);
echo json_encode($result);

