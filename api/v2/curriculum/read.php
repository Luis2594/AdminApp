<?php

if (isset($_POST['option'])) {
    switch ($_POST['option']) {
        case "all":
            include '../../../business/CurriculumBusiness.php';
            $business = new CurriculumBusiness();

            $result = [];
            foreach ($business->getAll() as $current) {
                $array = array("curriculumid" => $current->getCurriculumId(),
                    "curriculumname" => $current->getCurriculumName(),
                    "curriculumyear" => $current->getCurriculumYear(),
                );
                array_push($result, $array);
            }

            echo json_encode($result);
            break;
        case "relation":
            include '../../../business/CurriculumBusiness.php';
            $business = new CurriculumBusiness();

            $result = [];
            foreach ($business->getAllCurriculumCourseParsed() as $current) {
                $array = array("curriculumcourseid" => $current->getId(),
                    "curriculumcoursecurriculum" => $current->getCurriculum(),
                    "curriculumcoursecourse" => $current->getCourse(),
                    "period" => $current->getPeriod(),
                );
                array_push($result, $array);
            }
            echo json_encode($result);
            break;
    }
}
