<?php

include_once __DIR__.'/../business/GroupBusiness.php';

$name = $_POST['name'];

if (isset($name)) {
    $business = new GroupBusiness();
    $business->insertGroup($name);

    header("location: ../view/ShowGroups.php?id=" . $id . "&action=1&msg=Registro_creado_correctamente");
} else {
    header("location: ../view/CreateGroup.php?id=" . $id . "&action=0&msg=Error_al_crear_registros");
}
