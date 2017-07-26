<?php
//Cargar
//get
//Sin Parametros
//Retorna todas las realciones de cursos y malla

include '../business/CurriculumBusiness';
$business = new CurriculumBusiness();
echo json_encode($business->getAllCurriculumCourseParsed());