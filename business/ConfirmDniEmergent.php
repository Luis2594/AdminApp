<?php

include './StudentEmergentBusiness.php';

$dni = $_GET['dni'];

if (isset($dni)) {
    $studentEmergentBusiness = new StudentEmergentBusiness();
    if ($studentEmergentBusiness->confirmDni($dni) == '0') {
        echo TRUE;
    } else {
        echo FALSE;
    }
} else {
    echo FALSE;
}
