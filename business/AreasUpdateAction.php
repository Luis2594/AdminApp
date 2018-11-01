<?php

include_once __DIR__.'/./AreasBusiness.php';

$pk = $_GET['pk'];
$description = $_POST['description'];

if (isset($pk) && $pk != "" &&
    isset($description) && $description != ""
) {
    $areaBusiness = new AreasBusiness();
    $area = new Area($pk, $description, true, $_SESSION["name"]);
    if ($areaBusiness->update($area) != 0) {
        header("location: ../view/AreasShow.php?action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/AreasUpdate.php?pk=" . $pk . "&action=0&msg=Registro_fallido");
    }
} else {
    header("location: ../view/AreasUpdate.php?pk=" . $pk . "&action=0&msg=Error_en_los_datos");
}
