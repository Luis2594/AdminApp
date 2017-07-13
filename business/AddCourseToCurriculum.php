<?php

include './CurriculumBusiness.php';

$id = (int) $_GET['id'];
$coursesId = $_GET['courses'];

if (isset($id) && isset($coursesId) && is_int($id)) {

    $curriculumBusiness = new CurriculumBusiness();

    $array = explode(",", $coursesId);
    foreach ($array as $idCourse) {
        $curriculumBusiness->insertCurriculumCourse($id, $idCourse);
    }

    header("location: ../view/ShowCoursesToCurriculum.php?id=" . $id . "&action=1&msg=Registros_creados_correctamente");
} else {
    header("location: ../view/ShowCoursesToCurriculum.php?id=" . $id . "&action=1&msg=Registro_creado_correctamente");
}    