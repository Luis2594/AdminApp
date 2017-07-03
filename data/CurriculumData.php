<?php

require_once '../data/Connector.php';
include '../domain/Curriculum.php';

/**
 * Description of CurriculumData
 *
 * @author luisd
 */
class CurriculumData extends Connector{
   
    public function insert($curriculum) {
        $query = "call insertCurriculum('" . $curriculum->getCurriculumName() . "',"
                . "'" . $curriculum->getCurriculumYear() . "')";

        return $this->exeQuery($query);
    }

    public function update($curriculum) {
        $query = "call update('" . $curriculum->getCurriculumId() . "',"
                . "'" . $curriculum->getCurriculumName() . "',"
                . "'" . $curriculum->getCurriculumYear() . "')";

        return $this->exeQuery($query);
    }

    public function delete($id) {
        $query = 'call deteleCurriculum("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAll() {
        $query = "call getAllCurriculum()";
        
        $allCurriculum = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCurriculum) > 0) {
            while ($row = mysqli_fetch_array($allCurriculum)) {
                $currentCurriculum = new Curriculum(
                        $row['curriculumid'], 
                        $row['curriculumname'], 
                        $row['curriculumyear']);
                array_push($array, $currentCurriculum);
            }
        }
        return $array;
    }

    public function getCourseId($id) {
        $query = "";
        
        $allCurriculum = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCurriculum) > 0) {
            while ($row = mysqli_fetch_array($allCurriculum)) {
                $currentCurriculum = new CourseSchedule(
                        $row['curriculumId'], 
                        $row['curriculumName'], 
                        $row['curriculumYear']);
                array_push($array, $currentCurriculum);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
    
}
