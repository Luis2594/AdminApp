<?php

require_once '../data/Connector.php';
include '../domain/Course.php';

//require_once './resource/log/ErrorHandler.php';

class CourseData extends Connector
{

    public function insert($course)
    {
        $query = "call insertCourse('" . $course->getCourseCode() . "',"
        . "'" . $course->getCourseName() . "',"
        . "" . $course->getCourseCredits() . ","
        . "" . $course->getCourseLesson() . ","
        . "'" . $course->getCoursePdf() . "',"
        . "'" . $course->getCourseSpeciality() . "',"
        . "" . $course->getCourseType() . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertPeriod($course, $period)
    {
        $query = "call insertCoursePeriod(" . $course . "," . $period . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($course)
    {
        $query = "call updateCourse('" . $course->getCourseId() . "',"
        . "'" . $course->getCourseCode() . "',"
        . "'" . $course->getCourseName() . "',"
        . "'" . $course->getCourseCredits() . "',"
        . "'" . $course->getCourseLesson() . "',"
        . "'" . $course->getCoursePdf() . "',"
        . "'" . $course->getCourseSpeciality() . "',"
        . "'" . $course->getCourseType() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id)
    {
        $query = 'call deleteCourse("' . $id . '");';
        try {
            if ($this->exeQuery($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAll()
    {
        $query = "call getAllCourse()";
        try {
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
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllJson()
    {
        $query = "call getAllCourse()";
        try {
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
                        "coursespeciality" => $row['coursespeciality'],
                        "coursetype" => $row['coursetype']);
                }
            }

            foreach ($array as $key => $row) {
                $aux[$key] = $row['coursecode'];
            }

            array_multisort($aux, SORT_ASC, $array);

            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseByStudent($id)
    {
        $query = "call getCourseByStudent(" . $id . ")";
        try {
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
                        "coursespeciality" => $row['coursespeciality'],
                        "coursetype" => $row['coursetype']);
                }
            }

            foreach ($array as $key => $row) {
                $aux[$key] = $row['coursecode'];
            }

            array_multisort($aux, SORT_ASC, $array);

            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseByStudentParsed($id)
    {
        $query = "call getCourseByStudent(" . $id . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $currentCourse = new Course(
                        $row['courseid'], $row['coursecode'], $row['coursename'],
                        $row['coursecredits'], $row['courselesson'], $row['coursepdf'],
                        $row['specialityname'], $row['coursetype']);

                    array_push($array, $currentCourse);
                }
            }

            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllParsed()
    {
        $query = "call getAllCourse()";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $currentCourse = new Course(
                        $row['courseid'], $row['coursecode'], $row['coursename'],
                        $row['coursecredits'], $row['courselesson'], $row['coursepdf'],
                        $row['specialityname'], $row['coursetype']);

                    array_push($array, $currentCourse);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseId($id)
    {
        $query = 'call getCourseById("' . $id . '");';
        try {
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
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseToAssignProfessor($id)
    {
        $query = 'call getProfessorCourseByPersonId("' . $id . '");';
        try {
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
                        "groupid" => $row['groupid'],
                        "groupnumber" => $row['groupnumber'],
                        "groupid" => $row['groupid'],
                        "period" => $row['period'],
                        "periodid" => $row['periodid'],
                        "professorcourseyear" => $row['professorcourseyear']);
                }
            }

            foreach ($array as $key => $row) {
                $aux[$key] = $row['coursecode'];
            }

            array_multisort($aux, SORT_ASC, $array);
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getCourseToAssignProfessorByFilters($id, $period, $year)
    {
        $query = 'call getProfessorCourseByFilters(' . $id . ',' . $period . ',' . $year . ');';
        try {
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
                        "groupid" => $row['groupid'],
                        "period" => $row['period'],
                        "periodid" => $row['periodid'],
                        "professorcourseyear" => $row['professorcourseyear']);
                }
            }

            foreach ($array as $key => $row) {
                $aux[$key] = $row['coursecode'];
            }

            array_multisort($aux, SORT_ASC, $array);
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getCoursesAllProfessors()
    {
        $query = 'call getCoursesAllProfessors();';
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $array[] = array(
                        "professorcourseid" => $row['professorcourseid'],
                        "professorcourseperson" => $row['professorcourseperson'],
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "specialityname" => $row['specialityname'],
                        "coursetype" => $row['coursetype'],
                        "groupid" => $row['groupid'],
                        "groupnumber" => $row['groupnumber'],
                        "groupid" => $row['groupid'],
                        "period" => $row['period'],
                        "periodid" => $row['periodid'],
                        "professorcourseyear" => $row['professorcourseyear']);
                }
            }

            foreach ($array as $key => $row) {
                $aux[$key] = $row['coursecode'];
            }

            array_multisort($aux, SORT_ASC, $array);
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getCoursesAllProfessorsByFilters($period, $year)
    {
        $query = 'call getCoursesAllProfessorsByFilters(' . $period . ',' . $year . ');';
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $array[] = array(
                        "professorcourseid" => $row['professorcourseid'],
                        "professorcourseperson" => $row['professorcourseperson'],
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "specialityname" => $row['specialityname'],
                        "coursetype" => $row['coursetype'],
                        "groupnumber" => $row['groupnumber'],
                        "groupid" => $row['groupid'],
                        "period" => $row['period'],
                        "periodid" => $row['periodid'],
                        "professorcourseyear" => $row['professorcourseyear']);
                }
            }

            foreach ($array as $key => $row) {
                $aux[$key] = $row['coursecode'];
            }

            array_multisort($aux, SORT_ASC, $array);
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getCourseToAssignCurriculum($id)
    {
        $query = 'call getCurriculumCourseByCurriculum(' . $id . ');';
        try {
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
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseIdUpdate($id)
    {
        $query = 'call getCourseByIdUpdate("' . $id . '");';
        try {
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
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getType()
    {
        $query = "SELECT * FROM coursetype";
        try {
            $type = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($type)) {
                $array[] = array("id" => $row['coursetypeid'],
                    "type" => $row['coursetype']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function confirmCode($code)
    {
        $query = "call confirmCode('" . $code . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $res = trim($array[0]);
            return $res;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

/**
 * CHECKED
 */
    public function getStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group)
    {
        $query = "call getStudentsListByCourseAndProfessor(" . $course . ", " . $professor . ", " . $year . ", " . $period . ", " . $group . ")";
        try {
            $data = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($data) > 0) {
                include_once '../domain/Student.php';
                while ($row = mysqli_fetch_array($data)) {
                    $current = array($row['fullName'], $row['persondni'], $row['phoneNumber'], $row['personid']);
                    array_push($array, $current);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function exportStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group)
    {
        $query = "call getStudentsListByCourseAndProfessor(" . $course . ", " . $professor . ", " . $year . ", " . $period . ", " . $group . ");";
        try {
            //capture data by running the query
            $data = $this->exeQuery($query);
            $array = []; //exported data will be saved in here
            //add excel headers
            array_push($array, array("Nombre", "Cédula", "Teléfono"));
            if (mysqli_num_rows($data) > 0) {
                //include_once '../domain/Student.php';
                while ($row = mysqli_fetch_array($data)) {
                    array_push($array, array($row['fullName'], $row['persondni'], $row['phoneNumber']));
                }
            }
            //include required tools
            include_once '../tools/ExportData.php';
            include_once '../tools/GUID.php';
            //new instances of data management lib
            $excel = new ExportDataExcel('browser'); //browser-file-string
            $excel->filename = GUID() . ".xlsx"; //configure name
            //creation of the file!
            $excel->initialize();
            foreach ($array as $row) {
                $excel->addRow($row);
            }
            $excel->finalize(); //be happy!!
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query); //, 0);//$_SESSION["id"]);
        }
    }

}
