<?php

//cargar
//post
//Recibe username y userpassword
//Retorna los foros de ese usuario si los credenciales son válidos, nulo si no es valido

include_once __DIR__ . '/../../../business/UserBusiness.php';

if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $business = new UserBusiness();
    $person = $business->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != null) {
        include_once __DIR__ . '/../../../business/ForumBusiness.php';
        $forumBusiness = new ForumBusiness();
        $result = [];
        foreach ($forumBusiness->getForumsByUser($person['personid']) as $current) {
            $array = array("forumid" => $current->getId(),
                "forumname" => $current->getName(),
                "forumcourse" => $current->getCourse(),
                "forumprofessor" => $current->getProfessor(),
            );
            array_push($result, $array);
        }
        if (empty($result)) {
            echo json_encode("No hay foros registrados");
        }
        echo json_encode($result);
    } else {
        echo json_encode(null);
    }
} else {
    echo json_encode(null);
}
