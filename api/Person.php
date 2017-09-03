<?php

include '../business/UserBusiness.php';

//Cargar
//post
//Recibe username y userpassword
//Retorna la persona con ese usuario si los
//credenciales son válidos, nulo si no es valido

if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != NULL) {
        echo json_encode($person);
    } else {
        echo null;
    }
} else {
    echo null;
}