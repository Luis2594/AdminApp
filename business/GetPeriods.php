<?php

include './PeriodBusiness.php';

$periodBusiness = new PeriodBusiness();
$result = $periodBusiness->getAllPeriods();
echo json_encode($result);
?>

