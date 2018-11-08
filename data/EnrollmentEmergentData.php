<?php

include_once __DIR__.'/../data/ConnectorEmergent.php';
include_once __DIR__.'/../domain/EnrollmentEmergent.php';
date_default_timezone_set('America/Costa_Rica');

/**
 * Description of EnrollmentEmergentData
 *
 * @author luis
 */
class EnrollmentEmergentData extends ConnectorEmergent{
    
    public function insert($enrollment) {
        $query = "call enrollmentInsert('" . $enrollment->getFkperson() . "',"
                . "'" . $enrollment->getFkcourse() . "',"
                . "'" . $enrollment->getEnrollmentyear() . "',"
                . "'" . $enrollment->getEnrollmentstatus() . "',"
                . "'" . $enrollment->getUsertransacction() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($enrollment) {
        $query = "call courseUpdate('" . $enrollment->getPk() . "',"
                . "'" . $enrollment->getFkperson() . "',"
                . "'" . $enrollment->getFkcourse() . "',"
                . "'" . $enrollment->getEnrollmentyear() . "',"
                . "'" . $enrollment->getEnrollmentstatus() . "',"
                . "'" . $enrollment->getDatastate() . "',"
                . "'" . $enrollment->getUsertransacction() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $res = trim($array[0]);
            return $res;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function delete($id) {
        $query = 'call enrollmentDelete("' . $id . '");';
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
    
    public function enrollmentByPk($id) {
        $query = 'call enrollmentByPk("' . $id . '");';
        try {
            $allEnrollment = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allEnrollment) > 0) {
                while ($row = mysqli_fetch_array($allEnrollment)) {
                    $currentEnrollment = new EnrollmentEmergent(
                            $row['pk'], 
                            $row['fkperson'], 
                            $row['fkcourse'], 
                            $row['enrollmentyear'], 
                            $row['enrollmentstatus'], 
                            $row['datastate'], 
                            $row['usertransacction']);
                    array_push($array, $currentEnrollment);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function enrollmentByPerson($idStudent) {
         $query = 'call enrollmentByPerson("' . $idStudent . '");';
        try {
            $allEnrollment = $this->exeQuery($query);
            $currentEnrollment = null;
            if (mysqli_num_rows($allEnrollment) > 0) {
                while ($row = mysqli_fetch_array($allEnrollment)) {
                    $currentEnrollment = new EnrollmentEmergent(
                            $row['pk'], 
                            $row['fkperson'], 
                            $row['fkcourse'], 
                            $row['enrollmentyear'], 
                            $row['enrollmentstatus'], 
                            $row['datastate'], 
                            $row['usertransacction']);
//                    array_push($array, $currentEnrollment);
                }
            }
            return $currentEnrollment;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function enrollmentCourseByPerson($idStudent) {
         $query = 'call enrollmentCourseByPerson("' . $idStudent . '");';
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $array[] = array(
                        "enrollment" => $row['enrollment'],
                        "cod" => $row['cod'],
                        "name" => utf8_encode($row['description']),
                        "area" => utf8_encode($row['area']),
                        "day" => utf8_encode($row['days']),
                        "hour" => $row['hours'],
                        "year" => $row['enrollmentyear']
                    );
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
}
