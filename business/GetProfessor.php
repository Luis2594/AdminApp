<?php
include_once __DIR__.'/./ProfessorBusiness.php';

$professorBusiness = new ProfessorBusiness();
$result = $professorBusiness->getAllSchedule();

echo json_encode($result);
