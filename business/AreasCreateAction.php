<?php

include_once '../business/AreasBusiness.php';

$description = $_POST['description'];

if(isset($description)){
    $areaBusiness = new AreasBusiness();
    $area = new Area(0, $description, true, $_SESSION["name"]);
    $id_last = $areaBusiness->insert($area);
    
    if($id_last != 0){
        header("location: ../view/AreasShow.php?action=1&msg=Registro_creado_correctamente");
    }else{
        header("location: ../view/AreasCreate.php?action=0&msg=Error_al_crear_registro");
    }
}else{
    header("location: ../view/AreasCreate.php?action=0&msg=Error_en_la_información_de_los_datos");
}