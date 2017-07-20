<?php

require_once '../data/Connector.php';
include '../domain/Enrollment.php';

class EnrollmentData extends Connector {

    public function insertEnrollment($enrollment) {
        $query = "call insertEnrollment('" . $enrollment->getEnrollmentperson() . "',"
                . "'" . $enrollment->getEnrollmentcourse() . "',"
                . "" . $enrollment->getEnrollmentgroup() . ","
                . "" . $enrollment->getEnrollmentperiod() . ","
                . "" . $enrollment->getEnrollmentstatus() . ")";

        return $this->exeQuery($query);
    }

    public function update($idEnrollment, $status) {
        $query = "call updateEnrolloment('" . $idEnrollment . "',"
                . "" . $status . ")";

        return $this->exeQuery($query);
    }

    public function delete($id) {
        $query = 'call deleteEnrollment("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getCoursesAllEnrollmentByStudent($idStudent) {
        $query = "call getCoursesAllEnrollmentByStudent(" . $idStudent . ")";

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
    }

    public function getCoursesEnrollmentByStudent($idStudent) {
        $query = "call getCoursesEnrollmentByStudent(" . $idStudent . ")";

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
    }

    public function getCoursesApprovedByStudent($idStudent) {
        $query = "call getCoursesApprovedByStudent(" . $idStudent . ")";

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
    }

    public function getCoursesReprobateByStudent($idStudent) {
        $query = "call getCoursesReprobateByStudent(" . $idStudent . ")";

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
    }

}
