<?php

include_once __DIR__.'/./CurriculumBusiness.php';

$id = $_GET['id'];

if (isset($id)) {
    $curriculumBusiness = new CurriculumBusiness();
    if ($curriculumBusiness->delete($id)) {
        header("location: ../view/ShowCurriculum.php?action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/ShowCurriculum.php?action=0&msg=Error_al_eliminar_registro");
    }
} else {
    header("location: ../view/ShowCurriculum.php?action=0&msg=Error_al_capturar_los_datos");
}
