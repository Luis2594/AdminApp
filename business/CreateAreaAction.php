<?php

include_once '../business/AreaBusiness.php';

$description = (int) $_POST['description'];
$datastate = (int) $_POST['datastate'];
$usertransacction =  $_POST['usertransacction'];

if(isset($description) && isset($datastate) && isset($usertransacction){
    $areaBusiness = new AreaBusiness();
    $area = new Area(0, $description, $datastate, $usertransacction);
    $id_last = $areaBusiness->insert($area);
    
    if($id_last != 0){
        header("location: ../view/ShowAres.php?action=1&msg=Registro_creado_correctamente");
    }else{
        header("location: ../view/CreateArea.php?action=0&msg=Error_al_crear_registro");
    }
}else{
    header("location: ../view/CreateArea.php?action=0&msg=Error_en_la_información_de_los_datos");
}