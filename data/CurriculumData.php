<?php

require_once '../data/Connector.php';
include '../domain/Curriculum.php';

class CurriculumData extends Connector {

    public function insert($curriculum) {
        $query = "call insertCurriculum('" . $curriculum->getCurriculumName() . "',"
                . "'" . $curriculum->getCurriculumYear() . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $id = trim($array[0]);
        return $id;
    }

    public function update($curriculum) {
        $query = "call updateCurriculum(" . $curriculum->getCurriculumId() . ","
                . "'" . $curriculum->getCurriculumName() . "',"
                . "" . $curriculum->getCurriculumYear() . ")";

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
                        $row['curriculumid'], $row['curriculumname'], $row['curriculumyear']);
                array_push($array, $currentCurriculum);
            }
        }
        return $array;
    }

    public function getCurriculumId($id) {
        $query = 'call getCurriculumById(' . $id . ');';

        $allCurriculum = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCurriculum) > 0) {
            while ($row = mysqli_fetch_array($allCurriculum)) {
                $currentCurriculum = new Curriculum(
                        $row['curriculumid'], $row['curriculumname'], $row['curriculumyear']);
                array_push($array, $currentCurriculum);
            }
        }
        return $array;
    }

}
