<?php

include_once __DIR__.'/./AreasBusiness.php';

$areaBusiness = new AreasBusiness();
$result = $areaBusiness->getAllToSelect();

echo json_encode($result);
