<?php

if (isset($_POST['option'])) {
    switch ($_POST['option']) {
        case "all":
            include_once __DIR__.'/../../../business/CourseBusiness.php';
            $business = new CourseBusiness();
            $result = [];
            foreach ($business->getAllParsed() as $current) {
                $array = array(
                    "courseid" => $current->getCourseId(),
                    "coursecode" => $current->getCourseCode(),
                    "coursename" => $current->getCourseName(),
                    "coursecredits" => $current->getCourseCredits(),
                    "courselesson" => $current->getCourseLesson(),
                    "coursepdf" => $current->getCoursePdf(),
                    "coursespeciality" => $current->getCourseSpeciality(),
                    "coursetype" => $current->getCourseType(),
                );
                array_push($result, $array);
            }
            echo json_encode($result);
            break;
        case "student":
            include_once __DIR__.'/../../../business/UserBusiness.php';

            if (isset($_POST['username']) && isset($_POST['userpassword'])) {
                $userBusiness = new UserBusiness();
                $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
                if ($person != null) {
                    include_once __DIR__.'/../../../business/CourseBusiness.php';
                    $courseBusiness = new CourseBusiness();

                    $result = [];

                    foreach ($courseBusiness->getCourseByStudentParsed($person['personid']) as $current) {
                        $array = array(
                            "courseid" => $current->getCourseId(),
                            "coursecode" => $current->getCourseCode(),
                            "coursename" => $current->getCourseName(),
                            "coursecredits" => $current->getCourseCredits(),
                            "courselesson" => $current->getCourseLesson(),
                            "coursepdf" => $current->getCoursePdf(),
                            "coursespeciality" => $current->getCourseSpeciality(),
                            "coursetype" => $current->getCourseType(),
                        );
                        array_push($result, $array);
                    }

                    foreach ($result as $key => $row) {
                        $aux[$key] = $row['coursecode'];
                    }

                    array_multisort($aux, SORT_ASC, $result);

                    echo json_encode($result);
                } else {
                    echo json_encode(null);
                }
            } else {
                echo json_encode(null);
            }

            break;
        default:
            echo json_encode(null);
            break;
    }
}
