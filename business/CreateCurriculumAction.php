<?php

include './CurriculumBusiness.php';

$year = $_POST['year'];
$name = $_POST['name'];

if(isset($year) && isset($name)){
    
    $curriculumBusiness = new CurriculumBusiness();
    $curriculum = new Curriculum(NULL, $name, $year);
    if($curriculumBusiness->insert($curriculum)){
        header("location: ../view/ShowCurriculum.php?action=1&msg=Maya_curricular_creada_correctamente");
    }else{
        header("location: ../view/CreateCurriculum.php?action=0&msg=Erro_al_crear_maya_curricular");
    }
}else{
    header("location: ../view/CreateCurriculum.php?action=0&msg=Erro_al_crear_maya_curricular_(DATOS_ERRONEOS)");
}