<?php

include_once __DIR__.'/./PersonBusiness.php';

$id = $_GET['id'];

if (isset($id)) {
    $personBusiness = new PersonBusiness();
    if ($personBusiness->delete($id)) {
        header("location: ../view/ShowStudents.php?delete=delete&action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/ShowStudents.php?delete=delete&action=0&msg=Error_al_eliminar_registro");
    }
} else {
    header("location: ../view/ShowStudents.php?delete=delete&action=0&msg=Error_al_capturar_los_datos");
}
