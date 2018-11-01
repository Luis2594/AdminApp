<?php

include_once __DIR__.'/./PeriodBusiness.php';

$periodBusiness = new PeriodBusiness();
$result = $periodBusiness->getAllPeriods();
echo json_encode($result);
