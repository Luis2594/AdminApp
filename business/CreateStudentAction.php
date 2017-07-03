<?php

//includes
include './PersonBusiness.php';
include './StudentBusiness.php';
include './UserBusiness.php';
include './PhoneBusiness.php';

$dni = $_POST['dni'];
$name = $_POST['name'];
$firstlastname = $_POST['firstlastname'];
$secondlastname = $_POST['secondlastname'];
$birthdate = $_POST['birthdate'];
$genderTemp = $_POST['optionsRadios'];
$nationality = $_POST['nationality'];

$yearIncome = $_POST['yearIncome'];
$managerStudent = $_POST['managerStudent'];
$localitation = $_POST['localitation'];
$adecuacyTemp = $_POST['adecuacy'];

$quantityPhones = (int) $_POST['phones'];

if (isset($dni) &&
        isset($name) &&
        isset($firstlastname) &&
        isset($secondlastname) &&
        isset($birthdate) &&
        isset($genderTemp) &&
        isset($yearIncome) &&
        isset($managerStudent) &&
        isset($localitation)) {

    $name = ucwords(strtolower($name));
    $firstlastname = ucwords(strtolower($firstlastname));
    $secondlastname = ucwords(strtolower($secondlastname));
    $managerStudent = ucwords(strtolower($managerStudent));

    $personBusiness = new PersonBusiness();

    //Verificamos el genero de la persona
    $gender = 1;
    if ($genderTemp == 2) {
        $gender = 2;
    }

    //Creamos instancia de persona
    $person = new Person(NULL, $dni, $name, $firstlastname, $secondlastname, "", date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), NULL, $gender, $nationality, "1.png");

    $id_last = $personBusiness->insert($person);

    if ($id_last != 0) {

        $studentBusiness = new StudentBusiness();

        //Verificamos la adecuación de la persona
        $adecuacy = 0;
        if ($adecuacyTemp == 1) {
            $adecuacy = 1;
        }

        $student = new Student(NULL, $adecuacy, $yearIncome, NULL, $localitation, NULL, $managerStudent, $id_last);
        $pass = strtoupper(substr($firstlastname, 0, 2)) . strtoupper(substr($secondlastname, 0, 2)) . substr($dni, -3);
        if ($studentBusiness->insertStudentWithCredentials($student, $pass)) {
//            if ($userBusiness->insertProfessorWithCredentials($user)) {
            if (isset($quantityPhones)) {
                $phoneBusiness = new PhoneBusiness();
                for ($i = 0; $i <= $quantityPhones; $i++) {
                    $number = $_POST['phone' . $i];
                    if (isset($number) && $number != "") {
                        $phone = new Phone(NULL, $number, $id_last);
                        $phoneBusiness->insert($phone);
                    }
                }
            }
            header("location: ../view/InformationStudent.php?id=" . $id_last . "&action=1&msg=Estudiante_creado_correctamente");
//            } else {
//                //ERROR
//                $personBusiness->delete($id_last);
//                header("location: ../view/CreateStudent.php?action=0&msg=Error_al_crear_usuario_a_estudiante");
//            }
        } else {
            //error
            $personBusiness->delete($id_last);
            header("location: ../view/CreateStudent.php?action=0&msg=Error_al_crear_estudiante");
        }
    } else {
        //error
        $personBusiness->delete($id_last);
        header("location: ../view/CreateStudent.php?action=0&msg=Error_al_crear_estudiante");
    }
} else {
    header("location: ../view/CreateStudent.php?action=0&msg=Datos_erroneos");
}
?>