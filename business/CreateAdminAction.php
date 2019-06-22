<?php
include_once __DIR__.'/PhoneBusiness.php';
include_once __DIR__.'/PersonBusiness.php';
include_once __DIR__.'/UserBusiness.php';
include_once __DIR__.'/AdminBusiness.php';

//Capture data from POST method
//First the generic data for person model
$dni = $_POST['dni'];
$name = $_POST['name'];
$firstlastname = $_POST['firstlastname'];
$secondlastname = $_POST['secondlastname'];
$email = $_POST['email'];
$genderTemp = $_POST['optionsRadios'];
$nationality = $_POST['nationality'];
//capture quantity of phone numbres
$quantityPhones = (int) $_POST['phones'];

if (isset($dni) &&
    isset($name) &&
    isset($firstlastname) &&
    isset($secondlastname) &&
    isset($genderTemp)) {

    // $name = ucwords(strtolower($name));
    // $firstlastname = ucwords(strtolower($firstlastname));
    // $secondlastname = ucwords(strtolower($secondlastname));
    $personBusiness = new PersonBusiness();
    $person = new Person(
        NULL, $dni, $name, $firstlastname, $secondlastname, $email,
        date("Y-m-d"), NULL, $genderTemp, $nationality, "profile_default.png");

    $id_last = $personBusiness->insert($person);

    $firstlastname = clearStr($firstlastname);  
    $secondlastname = clearStr($secondlastname); 

    if ($id_last != 0) {
        $adminBusiness = new AdminBusiness();

        $pass = strtoupper(substr($firstlastname, 0, 2)) . strtoupper(substr($secondlastname, 0, 2)) . substr($dni, -3);
        if ($adminBusiness->insert($id_last, $pass) > 0) {
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
            header("location: ../view/ShowAdmins.php?action=1&msg=Registro_creado_correctamente");
        } else {
            //error
            $personBusiness->delete($id_last);
            header("location: ../view/CreateAdmin.php?action=0&msg=Error_al_crear_registro");
        }
    } else {
        //error
        $personBusiness->delete($id_last);
        header("location: ../view/CreateAdmin.php?action=0&msg=Error_al_crear_registro");
    }
} else {
    header("location: ../view/CreateAdmin.php?action=0&msg=Datos_erroneos");
}

function clearStr($str)
{
    $not_allows = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
    $allows = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
    return  str_replace($not_allows, $allows, $str);
}