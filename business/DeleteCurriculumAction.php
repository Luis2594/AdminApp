<?php

include './CurriculumBusiness.php';

$id = $_GET['id'];

if(isset($id)){
    $curriculumBusiness = new CurriculumBusiness();
    if($curriculumBusiness->delete($id)){
        header("location: ../view/ShowCurriculumDelete.php?action=1&msg=Maya_curricular_eliminada_correctamente");
    }else{
        header("location: ../view/ShowCurriculumDelete.php?action=0&msg=Error_al_eliminar_maya_curricular");
    }
}else{
    header("location: ../view/ShowCurriculumDelete.php?action=0&msg=Error_al_capturar_los_datos");
}