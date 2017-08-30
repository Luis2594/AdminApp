<?php

//Cargar
//Post
//Recibe username y userpassword
//Retorna los teléfonos de ese usuario si los
//credenciales son válidos, nulo si no es valido
//
//Insertar
//Post
//Recibe username, userpassword y nuevo numero
//Retorna los teléfonos de ese usuario si los 
//credenciales son válidos, nulo si no es valido
//
//Eliminar
//Post
//Recibe username, userpassword y idphone
//Retorna los teléfonos de ese usuario si los 
//credenciales son válidos, nulo si no es valido

include '../business/PhoneBusiness.php';
include '../business/UserBusiness.php';

if (isset($_POST['option']) && isset($_POST['username']) && isset($_POST['userpassword'])) {

    $userBusiness = new UserBusiness();

    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);

    if ($person == NULL) {
        echo json_encode(NULL);
        return;
    }

    $phoneBusiness = new PhoneBusiness();

    switch ($_POST['option']) {
        case 'Load':
            $phones = $phoneBusiness->getAllPhone($person["personid"]);
            $result = array();
            foreach ($phones as $phone) {
                $result[] = array("phoneid" => $phone->getPhoneId(), "phonephone" => $phone->getPhonePhone(), "phoneperson" => $phone->getPhonePerson());
            }

            echo json_encode($result);
            break;
        case 'Insert':
            if (isset($_POST['number'])) {
                $phoneBusiness->insert(new Phone(0, $_POST['number'], $person["personid"]));
                $phones = $phoneBusiness->getAllPhone($person["personid"]);
                $result = array();
                foreach ($phones as $phone) {
                    $result[] = array("phoneid" => $phone->getPhoneId(), "phonephone" => $phone->getPhonePhone(), "phoneperson" => $phone->getPhonePerson());
                }

                echo json_encode($result);
            } else {
                echo json_encode(NULL);
            }
            break;
        case 'Delete':
            if (isset($_POST['idphone'])) {
                if ($phoneBusiness->delete($_POST['idphone'])) {
                    $phones = $phoneBusiness->getAllPhone($person["personid"]);
                    $result = array();
                    foreach ($phones as $phone) {
                        $result[] = array("phoneid" => $phone->getPhoneId(), "phonephone" => $phone->getPhonePhone(), "phoneperson" => $phone->getPhonePerson());
                    }

                    echo json_encode($result);
                } else {
                    echo json_encode(NULL);
                }
            } else {
                echo json_encode(NULL);
            }
            break;
        default:
            echo json_encode(NULL);
            break;
    }
} else {
        echo json_encode(NULL);
}