<?php

include_once '../business/GroupBusiness.php';

$id = (int) $_GET['id'];

if (isset($id) && is_int($id)) {
    $business = new GroupBusiness();
    if ($business->deleteGroup($id)) {
        header("location: ../view/ShowGroups.php?action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/ShowGroups.php?action=0&msg=Error_al_eliminar_registro");
    }
} else {
    header("location: ../view/ShowGroups.php?action=0&msg=Error_al_capturar_los_datos");
}
