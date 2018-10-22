<?php

include '../../../business/InstitutionBusiness.php';
$business = new InstitutionBusiness();

echo json_encode($business->getInstitutionAPI());
