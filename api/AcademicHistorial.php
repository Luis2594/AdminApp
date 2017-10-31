<?php

//cargar
//post
//Recibe username y userpassword
//Retorna el historial del estudiante
include '../business/UserBusiness.php';
if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != NULL) {
        include './EnrollmentBusiness.php';

        //$id = $_POST['id'];
        $id = $person->getPersonId();
        //$option = (int) $_POST['option'];
        $option = 3;

        $enrollmentBusiness = new EnrollmentBusiness();
        $result;
        switch ($option) {
            case 0:
                $result = $enrollmentBusiness->getCoursesReprobateByStudent($id);
                break;
            case 1:
                $result = $enrollmentBusiness->getCoursesApprovedByStudent($id);
                break;
            case 2:
                $result = $enrollmentBusiness->getCoursesEnrollmentByStudent($id);
                break;
            case 3:
                $result = $enrollmentBusiness->getCoursesAllEnrollmentByStudent($id);
                break;
            default:
                $result = $enrollmentBusiness->getCoursesAllEnrollmentByStudent($id);
                break;
        }
        echo json_encode($result);
    } else {
        echo json_encode(NULL);
    }
} else {
    echo json_encode(NULL);
}
