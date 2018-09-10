<?php

include_once './FreeCourseBusiness.php';

$id = (int) $_GET['id'];

if (isset($id) && is_int($id)) {
    $courseBusiness = new FreeCourseBusiness();
    if ($courseBusiness->delete($id)) {
        header("location: ../view/ShowCoursesEmergent.php?action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/ShowCoursesEmergent.php?action=0&msg=Error_al_eliminar_registro");
    }
} else {
    header("location: ../view/ShowCoursesEmergent.php?action=0&msg=Error_al_capturar_los_datos");
}
