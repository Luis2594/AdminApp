<?php

require_once '../data/Connector.php';
include '../domain/Enrollment.php';
date_default_timezone_set('America/Costa_Rica');

//require_once '../resource/log/ErrorHandler.php';

class EnrollmentData extends Connector {

    public function insertEnrollment($enrollment) {
        $query = "call insertEnrollment('" . $enrollment->getEnrollmentperson() . "',"
                . "'" . $enrollment->getEnrollmentcourse() . "',"
                . "" . $enrollment->getEnrollmentgroup() . ","
                . "" . $enrollment->getEnrollmentperiod() . ","
                . "" . $enrollment->getEnrollmentstatus() . ")";
        try {
            $enrollmentID = $this->exeQuery($query);
            if ((mysqli_num_rows($enrollmentID) > 0)) {
                $query = "call insertStudentCourse('" . $enrollment->getEnrollmentperson() . "',"
                        . "'" . $enrollment->getEnrollmentcourse() . "',"
                        . "" . $enrollment->getEnrollmentperiod() . ","
                        . "" . date("Y") . ","
                        . "" . mysqli_fetch_array($enrollmentID)[0] . ")";

                return $this->exeQuery($query);
            } else {
                return false;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($idEnrollment, $status) {
        $query = "call updateEnrolloment('" . $idEnrollment . "',"
                . "" . $status . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call deleteEnrollment("' . $id . '");';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCoursesAllEnrollmentByStudent($idStudent) {
        $query = "call getCoursesAllEnrollmentByStudent(" . $idStudent . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $date = new DateTime($row['enrollmentdate']);

                    $array[] = array("enrollmentid" => $row['enrollmentid'],
                        "enrollmentstatus" => $row['enrollmentstatus'],
                        "enrollmentdate" => $date->format("d-m-Y"),
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period']);
//                    "coursetype" => $row['coursetype'],
//                    "personfirstname" => $row['personfirstname'],
//                    "personfirstlastname" => $row['personfirstlastname'],
//                    "personsecondlastname" => $row['personsecondlastname']);
                }
            }
            return $array;
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCoursesEnrollmentByStudent($idStudent) {
        $query = "call getCoursesEnrollmentByStudent(" . $idStudent . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {

                    $date = new DateTime($row['enrollmentdate']);
                    $array[] = array("enrollmentid" => $row['enrollmentid'],
                        "enrollmentstatus" => $row['enrollmentstatus'],
                        "enrollmentdate" => $date->format("d-m-Y"),
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period']);
                }
            }


            return $array;
        } catch (Exception $ex) {
            echo $ex;
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCoursesApprovedByStudent($idStudent) {
        $query = "call getCoursesApprovedByStudent(" . $idStudent . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {

                    $date = new DateTime($row['enrollmentdate']);

                    $array[] = array("enrollmentid" => $row['enrollmentid'],
                        "enrollmentstatus" => $row['enrollmentstatus'],
                        "enrollmentdate" => $date->format("d-m-Y"),
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period']);
//                    "coursetype" => $row['coursetype'],
//                    "personfirstname" => $row['personfirstname'],
//                    "personfirstlastname" => $row['personfirstlastname'],
//                    "personsecondlastname" => $row['personsecondlastname']);
                }
            }
            return $array;
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCoursesReprobateByStudent($idStudent) {
        $query = "call getCoursesReprobateByStudent(" . $idStudent . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $date = new DateTime($row['enrollmentdate']);

                    $array[] = array("enrollmentid" => $row['enrollmentid'],
                        "enrollmentstatus" => $row['enrollmentstatus'],
                        "enrollmentdate" => $date->format("d-m-Y"),
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period']);
//                    "coursetype" => $row['coursetype'],
//                    "personfirstname" => $row['personfirstname'],
//                    "personfirstlastname" => $row['personfirstlastname'],
//                    "personsecondlastname" => $row['personsecondlastname']);
                }
            }
            return $array;
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function enrollmentActions($id, $value) {

        $query = "call enrollmentActions(" . $id . ", " . $value . ")";

        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

     public function getTotalStudents() {
        $query = "call getTotalStudents()";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function getAllStudentEnrollmented() {
        $query = "call getAllStudentEnrollmented()";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllParcialStudentsEnrollment($dateStart, $dateEnd) {
        $query = "call getAllParcialStudentsEnrollment('" . $dateStart . "', '" . $dateEnd . "')";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getTotalStudentsSecondLevel($dateStart, $dateEnd) {
        $query = "call getAllStudentSecondLevel('" . $dateStart . "', '" . $dateEnd . "')";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getTotalStudentsSecondLevelWoman($dateStart, $dateEnd) {
        $query = "call getAllStudentSecondLevelWoman('" . $dateStart . "', '" . $dateEnd . "')";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getTotalStudentsSecondLevelMan($dateStart, $dateEnd) {
        $query = "call getAllStudentSecondLevelMen('" . $dateStart . "', '" . $dateEnd . "')";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getTotalStudentsThirdLevel($dateStart, $dateEnd) {
        $query = "call getAllStudentThirdLevel('" . $dateStart . "', '" . $dateEnd . "')";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getTotalStudentsThirdLevelWoman($dateStart, $dateEnd) {
        $query = "call getAllStudentThirdLevelWoman('" . $dateStart . "', '" . $dateEnd . "')";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getTotalStudentsThirdLevelMan($dateStart, $dateEnd) {
        $query = "call getAllStudentThirdLevelMen('" . $dateStart . "', '" . $dateEnd . "')";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
