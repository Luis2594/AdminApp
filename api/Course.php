<?php

//Cargar
//Get
//Sin parametros
//Retorna todos los cursos

include '../business/CourseBusiness.php';
$business = new CourseBusiness();
echo json_encode($business->getAll());