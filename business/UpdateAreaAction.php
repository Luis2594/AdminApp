<?php

include_once './AreaBusiness.php';

$pk = $_GET['pk'];
$description = $_POST['description'];
$datastate = $_POST['datastate'];
$usertransacction = (int) $_POST['usertransacction'];

if (isset($pk) && $pk != "" &&
        isset($description) && $description != "" &&
        isset($datastate) && $datastate != "" &&
        isset($usertransacction) && $usertransacction != ""
) {
    $areaBusiness = new AreaBusiness();
    $area = new Area($pk, $description, $datastate, $usertransacction);   
    if ($areaBusiness->update($area) != 0) {
        header("location: ../view/InformationInstitution.php?action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/UpdateInstitution.php?action=0&msg=Registro_fallido");
    }
} else {
    header("location: ../view/UpdateInstitution.php?action=0&msg=Error_en_los_datos");
}