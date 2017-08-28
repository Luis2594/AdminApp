<?php
//cargar
//get
//sin parametros
//retorna todas las mallas

include '../business/CurriculumBusiness.php';
$business = new CurriculumBusiness();

$result = [];
foreach ($business->getAll() as $current) {
    $array[] = array("curriculumid" => $current->getCurriculumId(),
        "curriculumname" => $current->getCurriculumName(),
        "curriculumyear" => $current->getCurriculumYear() 
    );
    array_push($result, $array);
}

echo json_encode($result);