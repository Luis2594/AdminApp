<?php

include_once './AreaBusiness.php';

$pk = $_GET['pk'];

if (isset($pk)) {
    $areaBusiness = new AreaBusiness();
    if ($areaBusiness->delete($pk)) {
        header("location: ../view/AreasShow.php?action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/AreasShow.php?action=0&msg=Error_al_eliminar_registro");
    }
} else {
    header("location: ../view/AreasShow.php?action=0&msg=Error_al_capturar_los_datos");
}
