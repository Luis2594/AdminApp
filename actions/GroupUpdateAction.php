<?php

include_once __DIR__.'/../business/GroupBusiness.php';

$name = (string) $_POST['name'];
$id = (int) $_POST['id'];

if (isset($name) && isset($id) && is_int($id)) {
    $business = new GroupBusiness();
    $business->updateGroup($id, $name);

    header("location: ../view/ShowGroups.php?action=1&msg=Registro_actualizado_correctamente");
} else {
    header("location: ../view/UpdateGroupNUmber.php?id=" . $id . "&action=0&msg=Error_al_actualizar_registro");
}
