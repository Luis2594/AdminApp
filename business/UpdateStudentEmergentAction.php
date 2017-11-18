<?php

//includes
include_once './StudentEmergentBusiness.php';

$id = $_POST['id'];
$dni = $_POST['dni'];
$name = $_POST['name'];
$firstlastname = $_POST['firstlastname'];
$secondlastname = $_POST['secondlastname'];
$birthdate = $_POST['birthdate'];
$genderTemp = $_POST['optionsRadios'];
$nationality = $_POST['nationality'];

$managerStudent = $_POST['managerStudent'];
//$yearOut = $_POST['yearOut'];
$localitation = $_POST['localitation'];

if (isset($id) &&
        isset($dni) &&
        isset($name) &&
        isset($firstlastname) &&
        isset($secondlastname) &&
        isset($birthdate) &&
        isset($genderTemp) &&
        isset($nationality) &&
        isset($managerStudent) &&
        isset($localitation)) {

    $name = ucwords(strtolower($name));
    $firstlastname = ucwords(strtolower($firstlastname));
    $secondlastname = ucwords(strtolower($secondlastname));
    $managerStudent = ucwords(strtolower($managerStudent));

    $studentEmergentBusiness = new StudentEmergentBusiness();

    //Verificamos el genero de la persona
    $gender = "M";
    if ($genderTemp == 2) {
        $gender = "F";
    }

    //Esto es por si ocupo algo de la persona
    //$personTemp = $personBusiness->getPersonId($id);
    //Creamos instancia de persona
    $student = new StudentEmergent($id, $dni, $name, $firstlastname, $secondlastname, date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), $gender, $nationality, (date("Y") + 1), $managerStudent, $localitation, "", "");

    $res = $studentEmergentBusiness->update($student);

    if ($res == 1) {
        header("location: ../view/InformationStudentEmergent.php?id=" . $id . "&action=1&msg=Estudiante_actualizado_correctamente");
    } else {
        //error
        header("location: ../view/InformationStudentEmergent.php?id=" . $id . "&action=0&msg=Error_al_actualizar_estudiante");
    }
} else {
    header("location: ../view/InformationStudentEmergent.php?id=" . $id . "&action=0&msg=Datos_erroneos");
}
?>
