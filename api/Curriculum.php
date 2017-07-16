<?php
//cargar
//get
//sin parametros
//retorna todas las mallas

include '../business/CurriculumBusiness.php';
$business = new CurriculumBusiness();
echo json_encode($business->getAll());