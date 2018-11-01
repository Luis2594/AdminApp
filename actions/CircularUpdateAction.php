<?php

include_once __DIR__.'/../business/CircularBusiness.php';

$text = (string) $_POST['text'];
$id = (int) $_POST['id'];

if (isset($text) && isset($id) && is_int($id)) {
    $business = new CircularBusiness();
    $business->update($id, $text);

    header("location: ../view/CircularShow.php?action=1&msg=Registro_actualizado_correctamente");
} else {
    header("location: ../view/CircularUpdate.php?id=" . $id . "&action=0&msg=Error_al_actualizar_registro");
}
