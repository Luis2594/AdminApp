<?php

require_once '../data/ConnectorEmergent.php';
require_once '../domain/StudentEmergent.php';

/**
 * Description of StudentEmergentData
 *
 * @author luis
 */
class StudentEmergentData extends ConnectorEmergent {

    public function insert($studentEmergent) {
        $query = "call personInsert('" . $studentEmergent->getDni() . "',"
                . "'" . $studentEmergent->getFirstname() . "',"
                . "'" . $studentEmergent->getFirstlastname() . "',"
                . "'" . $studentEmergent->getSecondlastname() . "',"
                . "'" . $studentEmergent->getBirthdate() . "',"
                . "'" . $studentEmergent->getGender() . "',"
                . "'" . $studentEmergent->getNationality() . "',"
                . "'" . $studentEmergent->getEnrollmentyear() . "',"
                . "'" . $studentEmergent->getResponsable() . "',"
                . "'" . $studentEmergent->getAddress() . "',"
                . "'" . $studentEmergent->getUsertransacction() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);

            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($studentEmergent) {
        $query = "call personUpdate('" . $studentEmergent->getPk() . "',"
                . "'" . $studentEmergent->getDni() . "',"
                . "'" . $studentEmergent->getFirstname() . "',"
                . "'" . $studentEmergent->getFirstlastname() . "',"
                . "'" . $studentEmergent->getSecondlastname() . "',"
                . "'" . $studentEmergent->getBirthdate() . "',"
                . "'" . $studentEmergent->getGender() . "',"
                . "'" . $studentEmergent->getNationality() . "',"
                . "'" . $studentEmergent->getEnrollmentyear() . "',"
                . "'" . $studentEmergent->getResponsable() . "',"
                . "'" . $studentEmergent->getAddress() . "',"
                . "'" . $studentEmergent->getDatastate() . "',"
                . "'" . $studentEmergent->getUsertransacction() . "')";
        try {
           return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call personDelete("' . $id . '");';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAll() {
        $query = "call personAll()";
        try {
            $allStudents = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allStudents) > 0) {
                while ($row = mysqli_fetch_array($allStudents)) {
                    $currentStudent = new StudentEmergent(
                            $row['pk'], $row['dni'], $row['firstname'], $row['firstlastname'], $row['secondlastname'], $row['birthdate'], $row['gender'], $row['nationality'], $row['enrollmentyear'], $row['responsable'], $row['address'], $row['datastate'], $row['usertransacction']);
                    array_push($array, $currentStudent);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getStudentById($id) {
        $query = 'call personByPk("' . $id . '");';
        try {
            $allStudents = $this->exeQuery($query);
//            $array = [];
            $currentStudent = null;
            if (mysqli_num_rows($allStudents) > 0) {
                while ($row = mysqli_fetch_array($allStudents)) {
                    $currentStudent = new StudentEmergent(
                            $row['pk'], $row['dni'], $row['firstname'], $row['firstlastname'], $row['secondlastname'], $row['birthdate'], $row['gender'], $row['nationality'], $row['enrollmentyear'], $row['responsable'], $row['address'], $row['datastate'], $row['usertransacction']);
                   
//                    array_push($array, $currentStudent);
                }
            }

            return $currentStudent;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function confirmDni($dni) {
        $query = "call personConfirmDni('" . $dni . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $res = trim($array[0]);
            return $res;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
