<?php

//cargar
//get
//sin parametros
//retorna la institución

include_once __DIR__.'/../business/InstitutionBusiness.php';
$business = new InstitutionBusiness();

echo json_encode($business->getInstitutionAPI());
