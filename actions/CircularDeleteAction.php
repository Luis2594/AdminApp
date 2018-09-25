<?php

include_once '../business/CircularBusiness.php';

$id = $_GET['id'];

if (isset($id)) {
    $business = new CircularBusiness();
    
    $circular = $business->get($id);

    if ($business->delete($id)) {
        unlink("../../documents/circular/".$circular->getCircularGUID().".pdf");
        header("location: ../view/CircularShow.php?action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/CircularShow.php?action=0&msg=Error_al_eliminar_registro");
    }
} else {
    header("location: ../view/CircularShow.php?action=0&msg=Error_al_capturar_los_datos");
}
