<?php

//Cargar
//post
//Recibe username y userpassword
//Retorna el horario si los credenciales son válidos, nulo si no es valido

include_once '../business/UserBusiness.php';

if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != NULL) {
        include_once '../business/ScheduleBusiness.php';
        $scheduleBusiness = new ScheduleBusiness();
        $result = $scheduleBusiness->getScheduleByStudent($person['personid']);
        echo json_encode($result);
    } else {
        echo json_encode(NULL);
    }
} else {
    echo json_encode(NULL);
}