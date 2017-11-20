<?php

include_once './PhoneEmergentBusiness.php';

$idPerson = (int) $_GET['idPerson'];
$idPhone = (int) $_GET['idPhone'];

if (isset($idPerson) && is_int($idPerson) && isset($idPhone) && is_int($idPhone)) {
    $phoneBusiness = new PhoneEmergentBusiness();
    if ($phoneBusiness->delete($idPhone)) {
        header("location: ../view/UpdatePhonesEmergent.php?id=" . $idPerson . "&action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/UpdatePhonesEmergent.php?id=" . $idPerson . "&action=0&msg=Error_al_eliminar_registros");
    }
} else {
    header("location: ../view/UpdatePhonesEmergent.php?id=" . $idPerson . "&action=0&msg=Datos_erroneos");
}