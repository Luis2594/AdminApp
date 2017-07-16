<?php
//Cargar
//get
//Sin Parametros
//Retorna todas las realciones de cursos y malla


include '../business/CurriculumCourseBusiness';
$business = new CurriculumCourseBusiness();
echo json_encode($business->getAll());