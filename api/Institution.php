<?php

//cargar
//get
//sin parametros
//retorna la institución

include '../business/InstitutionBusiness.php';
$business = new InstitutionBusiness();

echo json_encode($business->getInstitutionAPI());
