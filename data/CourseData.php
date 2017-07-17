<?php

require_once '../data/Connector.php';
include '../domain/Course.php';

class CourseData extends Connector {

    public function insert($course) {
        $query = "call insertCourse('" . $course->getCourseCode() . "',"
                . "'" . $course->getCourseName() . "',"
                . "" . $course->getCourseCredits() . ","
                . "" . $course->getCourseLesson() . ","
                . "'" . $course->getCoursePdf() . "',"
                . "'" . $course->getCourseSpeciality() . "',"
                . "" . $course->getCourseType() . ")";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $id = trim($array[0]);
        return $id;
    }

    public function insertPeriod($course, $period) {
        $query = "call insertCoursePeriod(" . $course . "," . $period . ")";
        return $this->exeQuery($query);
    }

    public function update($course) {
        $query = "call updateCourse('" . $course->getCourseId() . "',"
                . "'" . $course->getCourseCode() . "',"
                . "'" . $course->getCourseName() . "',"
                . "'" . $course->getCourseCredits() . "',"
                . "'" . $course->getCourseLesson() . "',"
                . "'" . $course->getCoursePdf() . "',"
                . "'" . $course->getCourseSpeciality() . "',"
                . "'" . $course->getCourseType() . "')";

        return $this->exeQuery($query);
    }

    public function delete($id) {
        $query = 'call deleteCourse("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAll() {
        $query = "call getAllCourse()";

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
                $currentCourse->setSpecialityname($row['specialityname']);
                array_push($array, $currentCourse);
            }
        }
        return $array;
    }

    public function getCourseId($id) {
        $query = 'call getCourseById("' . $id . '");';

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

    public function getCourseToAssignProfessor($id) {
        $query = 'call getProfessorCourseByPersontId("' . $id . '");';

        $allCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourses) > 0) {
            while ($row = mysqli_fetch_array($allCourses)) {
                $array[] = array(
                    "professorcourseid" => $row['professorcourseid'],
                    "courseid" => $row['courseid'],
                    "coursecode" => $row['coursecode'],
                    "coursename" => $row['coursename'],
                    "coursecredits" => $row['coursecredits'],
                    "courselesson" => $row['courselesson'],
                    "coursepdf" => $row['coursepdf'],
                    "specialityname" => $row['specialityname'],
                    "coursetype" => $row['coursetype'],
                    "groupnumber" => $row['groupnumber'],
                    "period" => $row['period'],
                    "professorcourseyear" => $row['professorcourseyear']);
            }
        }
        return $array;
    }
    
    public function getCourseToAssignCurriculum($id) {
        $query = 'call getCurriculumCourseByCurriculum(' . $id . ');';

        $allCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourses) > 0) {
            while ($row = mysqli_fetch_array($allCourses)) {

                $array[] = array(
                    "curriculumcourseid" => $row['curriculumcourseid'],
                    "courseid" => $row['courseid'],
                    "coursecode" => $row['coursecode'],
                    "coursename" => $row['coursename'],
                    "coursecredits" => $row['coursecredits'],
                    "courselesson" => $row['courselesson'],
                    "coursepdf" => $row['coursepdf'],
                    "specialityname" => $row['specialityname'],
                    "coursetype" => $row['coursetype'],
                    "period" => $row['period']);
            }
        }
        return $array;
    }

    public function getCourseIdUpdate($id) {
        $query = 'call getCourseByIdUpdate("' . $id . '");';

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

    public function getType() {
        $query = "SELECT * FROM coursetype";

        $type = $this->exeQuery($query);
        $array = [];
        while ($row = mysqli_fetch_array($type)) {
            $array[] = array("id" => $row['coursetypeid'],
                "type" => $row['coursetype']);
        }
        return $array;
    }

    public function confirmCode($code) {
        $query = "call confirmCode('" . $code . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $res = trim($array[0]);
        return $res;
    }

}
