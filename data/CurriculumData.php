<?php

require_once '../data/Connector.php';
include '../domain/Curriculum.php';
include '../domain/Course.php';

class CurriculumData extends Connector {

    public function insert($curriculum) {
        $query = "call insertCurriculum('" . $curriculum->getCurriculumName() . "',"
                . "'" . $curriculum->getCurriculumYear() . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $id = trim($array[0]);
        return $id;
    }

    public function insertCurriculumCourse($idCurriculum, $idCourse) {
        $query = "call insertCurriculumCourse('" . $idCurriculum . "',"
                . "'" . $idCourse . "')";

        return $this->exeQuery($query);
    }

    public function insertCourseToCurriculum($id, $period, $idCourse) {
        $query = "call insertCurriculumCourse(" . $id . ","
                . "" . $period . ","
                . $idCourse . ")";

        return $this->exeQuery($query);
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
    
    public function getAllEnrollment() {
        $query = "call getAllCurriculum()";

        $allCurriculum = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCurriculum) > 0) {
            while ($row = mysqli_fetch_array($allCurriculum)) {
                $array[] = array("id" => $row['curriculumid'],
                "name" => $row['curriculumname']);
            }
        }
        return $array;
    }

    public function getAllCourses() {
        $query = "call getAllCourse()";

        $allCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourses) > 0) {
            while ($row = mysqli_fetch_array($allCourses)) {
                $currentCourse = new Course(
                        $row['courseid'], $row['coursecode'], $row['coursename'], $row['coursecredits'], $row['courselesson'], $row['coursepdf'], $row['coursespeciality'], $row['coursetype']);
                $currentCourse->setSpecialityname($row['specialityname']);
                array_push($array, $currentCourse);
            }
        }
        return $array;
    }

    public function getCurriculumCourseOutCurriculum($id) {
        $query = 'call getCurriculumCourseOutCurriculum("' . $id . '");';

        $allCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourses) > 0) {
            while ($row = mysqli_fetch_array($allCourses)) {
                $currentCourse = new Course(
                        $row['courseid'], $row['coursecode'], $row['coursename'], $row['coursecredits'], $row['courselesson'], $row['coursepdf'], $row['coursespeciality'], $row['coursetype']);
                array_push($array, $currentCourse);
            }
        }
        return $array;
    }

    public function getCurriculumCourseByCurriculum($id) {
        $query = 'call getCurriculumCourseByCurriculum("' . $id . '");';

        $allCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourses) > 0) {
            while ($row = mysqli_fetch_array($allCourses)) {
                $currentCourse = new Course(
                        $row['courseid'], 
                        $row['coursecode'], 
                        $row['coursename'], 
                        $row['coursecredits'], 
                        $row['courselesson'], 
                        $row['coursepdf'], 
                        $row['coursespeciality'], 
                        $row['coursetype']);
                array_push($array, $currentCourse);
            }
        }
        return $array;
    }
    
    public function getCurriculumCourseEnrollment($id) {
        $query = 'call getCurriculumCourseByCurriculum("' . $id . '");';

        $allCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourses) > 0) {
            while ($row = mysqli_fetch_array($allCourses)) {
                 $array[] = array("courseid" => $row['courseid'],
                     "coursecode" => $row['coursecode'],
                     "coursename" => $row['coursename'],
                     "coursecredits" => $row['coursecredits'],
                     "courselesson" => $row['courselesson'],
                     "coursepdf" => $row['coursepdf'],
                     "specialityname" => $row['specialityname'],
                     "coursetype" => $row['coursetype'],
                     "periodid" => $row['periodid']);
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

    public function deleteCurriculumCourse($id) {
        $query = 'call deleteCurriculumCourse(' . $id . ');';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
