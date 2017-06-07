<?php

header("Content-Type: text/html;charset=utf-8");
require_once '../data/Connector.php';
include '../domain/Student.php';

/**
 * Description of StudentData
 *
 * @author luisd
 */
class StudentData extends Connector{

     public function insert($student) {
        $query = "call insert('" . $student->getStudentAdecuacy() . "',"
                . "'" . $student->getStudentYearIncome() . "',"
                . "'" . $student->getStudentYearOut() . "',"
                . "'" . $student->getStudentLocation() . "',"
                . "'" . $student->getStudentGroup() . "',"
                . "'" . $student->getStudentCourse() . "',"
                . "'" . $student->getStudentManager() . "',"
                . "'" . $student->getPersonNacionality() . "')";

        return $this->exeQuery($query);
    }

    public function update($person) {
        $query = "call update('" . $person->getStudentId() . "',"
                . "'" . $person->getStudentAdecuacy() . "',"
                . "'" . $person->getStudentYearIncome() . "',"
                . "'" . $person->getStudentYearOut() . "',"
                . "'" . $person->getStudentLocation() . "',"
                . "'" . $person->getStudentGroup() . "',"
                . "'" . $person->getStudentCourse() . "',"
                . "'" . $person->getStudentManager() . "',"
                . "'" . $person->getStudentPerson() . "')";

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
        $query = "";
        
        $allStudents = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allStudents) > 0) {
            while ($row = mysqli_fetch_array($allStudents)) {
                $currentStudent = new CourseSchedule(
                        $row['studentId'], 
                        $row['studentAdecuacy'], 
                        $row['studentYearIncome'], 
                        $row['studentYearOut'], 
                        $row['studentLocation'], 
                        $row['studentGroup'], 
                        $row['studentCourse'], 
                        $row['studentManager'], 
                        $row['studentPerson']);
                array_push($array, $currentStudent);
            }
        }
        return $array;
    }

    public function getCourseId($id) {
        $query = "";
        
        $allStudent = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allStudent) > 0) {
            while ($row = mysqli_fetch_array($allStudent)) {
                $currentStudent = new CourseSchedule(
                        $row['studentId'], 
                        $row['studentAdecuacy'], 
                        $row['studentYearIncome'], 
                        $row['studentYearOut'], 
                        $row['studentLocation'], 
                        $row['studentGroup'], 
                        $row['studentCourse'], 
                        $row['studentManager'], 
                        $row['studentPerson']);
                array_push($array, $currentStudent);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
    
}
