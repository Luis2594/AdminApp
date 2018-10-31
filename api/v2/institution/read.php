<?php

include_once __DIR__.'/../../../business/InstitutionBusiness.php';
$business = new InstitutionBusiness();

echo json_encode($business->getInstitutionAPI());
