<?php

//Cargar
//Get
//Sin parametros
//Retorna todos los cursos

include '../business/CourseBusiness.php';
$business = new CourseBusiness();

$result = [];
foreach ($business->getAllParsed() as $current) {
    $array = array(
        "courseid" => $current->getCourseId(),
        "coursecode" => $current->getCourseCode(),
        "coursename" => $current->getCourseName(),
        "coursecredits" => $current->getCourseCredits(),
        "courselesson" => $current->getCourseLesson(),
        "coursepdf" => $current->getCoursePdf(),
        "coursespeciality" => $current->getCourseSpeciality(),
        "coursetype" => $current->getCourseType()
    );
    array_push($result, $array);
}
echo json_encode($result);
