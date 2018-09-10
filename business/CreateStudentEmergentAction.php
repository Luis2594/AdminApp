<?php

include './StudentEmergentBusiness.php';
include './PhoneEmergentBusiness.php';

$dni = $_POST['dni'];
$name = $_POST['name'];
$firstlastname = $_POST['firstlastname'];
$secondlastname = $_POST['secondlastname'];
$birthdate = $_POST['birthdate'];
$genderTemp = $_POST['optionsRadios'];
$nationality = $_POST['nationality'];

$managerStudent = $_POST['managerStudent'];
$localitation = $_POST['localitation'];

$quantityPhones = (int) $_POST['phones'];

if (isset($dni) &&
    isset($name) &&
    isset($firstlastname) &&
    isset($secondlastname) &&
    isset($birthdate) &&
    isset($genderTemp) &&
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

    //Creamos instancia de persona
    $student = new StudentEmergent(NULL, $dni, $name, $firstlastname, $secondlastname, date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), $gender, $nationality, (date("Y") + 1), $managerStudent, $localitation, "", "");

    $id_last = $studentEmergentBusiness->insert($student);

    if ($id_last != 0) {
        if (isset($quantityPhones)) {
            $phoneEmergentBusiness = new PhoneEmergentBusiness();
            for ($i = 0; $i <= $quantityPhones; $i++) {
                $number = $_POST['phone' . $i];
                if (isset($number) && $number != "") {
                    $phone = new PhoneEmergent(NULL, $number, $id_last, "", "");
                    $phoneEmergentBusiness->insert($phone);
                }
            }
        }
        header("location: ../view/InformationStudentEmergent.php?id=" . $id_last . "&action=1&msg=Registro_creado_correctamente");
    } else {
        //error
        $studentEmergentBusiness->delete($id_last);
        header("location: ../view/CreateStudentEmergent.php?action=0&msg=Error_al_crear_estudiante");
    }
} else {
    header("location: ../view/CreateStudent.php?action=0&msg=Datos_erroneos");
}
