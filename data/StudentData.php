<?php

require_once '../data/Connector.php';
include '../domain/Student.php';
include '../domain/StudentAll.php';

/**
 * Description of StudentData
 *
 * @author luisd
 */
class StudentData extends Connector {

    public function insertStudentWithCredentials($student, $pass) {
        $query = "call insertStudentWithCredentials(" . $student->getStudentAdecuacy() . ","
                . "'" . $student->getStudentYearIncome() . "',"
                . "'" . $student->getStudentLocation() . "',"
                . "'" . $student->getStudentManager() . "',"
                . "" . $student->getStudentPerson() . ","
                . "'" . $pass . "')";

        return $this->exeQuery($query);
    }

    public function update($student) {
        $query = "call updateStudent('" . $student->getStudentPerson() . "',"
                . "'" . $student->getStudentAdecuacy() . "',"
                . "'" . $student->getStudentYearIncome() . "',"
                . "'" . $student->getStudentLocation() . "',"
                . "'" . $student->getStudentManager() . "')";

        return $this->exeQuery($query);
    }

    public function delete($id) {
        $query = 'call delete("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAll() {
        $query = "call getAllStudent()";

        $allStudents = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allStudents) > 0) {
            while ($row = mysqli_fetch_array($allStudents)) {
                $currentStudent = new StudentAll(
                        $row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthdate'], $row['personage'], $row['persongender'], $row['personnationality'], $row['studentadecuacy'], $row['studentyearincome'], $row['studentyearout'], $row['studentlocation'], $row['studentgroup'], $row['studentmanager'], $row['userusername'], $row['useruserpass']);
                array_push($array, $currentStudent);
            }
        }
        return $array;
    }

    public function getStudentId($id) {
        $query = 'call getStudent("' . $id . '");';

        $allStudent = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allStudent) > 0) {
            while ($row = mysqli_fetch_array($allStudent)) {

                $currentStudent = new StudentAll(
                        $row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthdate'], $row['personage'], $row['persongender'], $row['personnationality'], $row['studentadecuacy'], $row['studentyearincome'], $row['studentyearout'], $row['studentlocation'], $row['studentgroup'], $row['studentmanager'], $row['userusername'], $row['useruserpass']);

                array_push($array, $currentStudent);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }

}
