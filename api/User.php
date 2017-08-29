<?php
//Editar
//Post
//Recibe username, userpassword y newpassword
//Retorna la contraseña de ese usuario si los
//credenciales son válidos, nulo si no es valido

include '../business/UserBusiness.php';

    if (isset($_POST['username']) && isset($_POST['userpassword'])) {
            $userBusiness = new UserBusiness();
            $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
            if ($person != NULL) {
                echo json_encode($_POST['username']);
            } else {
                echo NULL;
            }
    } else {
        echo json_encode(NULL);
    }