<?php

include './PersonBusiness.php';

$id = $_GET['id'];

if(isset($id)){
    $personBusiness = new PersonBusiness();
    if($personBusiness->delete($id)){
        header("location: ../view/ShowStudentDelete.php?action=1&msg=Estudiante_eliminado_correctamente");
    }else{
        header("location: ../view/ShowStudentDelete.php?action=0&msg=Error_al_eliminar_estudiante");
    }
}else{
    header("location: ../view/ShowStudentDelete.php?action=0&msg=Error_al_capturar_los_datos");
}
