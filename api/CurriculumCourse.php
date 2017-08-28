<?php

//Cargar
//get
//Sin Parametros
//Retorna todas las realciones de cursos y malla

include '../business/CurriculumBusiness';
$business = new CurriculumBusiness();

$result = [];
foreach ($business->getAllCurriculumCourseParsed() as $current) {
    $array[] = array("curriculumcourseid" => $current->getId(),
        "curriculumcoursecurriculum" => $current->getCurriculum(),
        "curriculumcoursecourse" => $current->getCourse(),
        "period" => $current->ggetPeriod()
    );
    array_push($result, $array);
}

echo json_encode($result);
