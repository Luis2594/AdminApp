<?php

include_once './StudentEmergentBusiness.php';

$id = $_GET['id'];

if (isset($id)) {
    $studentEmergentBusiness = new StudentEmergentBusiness();
    if ($studentEmergentBusiness->delete($id)) {
        header("location: ../view/ShowStudentsEmergent.php?delete=delete&action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/InformationStudentEmergent.php?id=" . $id . "&action=0&msg=Error_al_eliminar_registro");
    }
} else {
    header("location: ../view/ShowStudentDelete.php?action=0&msg=Error_al_capturar_los_datos");
}
