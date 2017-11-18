<?php

require_once '../data/ConnectorEmergent.php';
require_once '../domain/FreeCourse.php';

/**
 * Description of FreeCourseData
 *
 * @author luis
 */
class FreeCourseData extends ConnectorEmergent{
    
    public function insert($course) {
        $query = "call courseInsert('" . $course->getCod() . "',"
                . "'" . $course->getDescription() . "',"
                . "'" . $course->getFkarea() . "',"
                . "'" . $course->getDaynumber() . "',"
                . "'" . $course->getFkhour() . "',"
                . "'" . $course->getDatastate() . "',"
                . "'" . $course->getUsertransacction() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($course) {
        $query = "call courseUpdate('" . $course->getPk() . "',"
                . "'" . $course->getCod() . "',"
                . "'" . $course->getDescription() . "',"
                . "'" . $course->getFkarea() . "',"
                . "'" . $course->getDaynumber() . "',"
                . "'" . $course->getFkhour() . "',"
                . "'" . $course->getDatastate() . "',"
                . "'" . $course->getUsertransacction() . "')";
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
        $query = 'call courseDelete("' . $id . '");';
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
        $query = "call courseAll()";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $currentCourse = new FreeCourse(
                            $row['pk'], 
                            $row['cod'], 
                            $row['description'], 
                            $row['fkarea'], 
                            $row['daynumber'], 
                            $row['fkhour'], 
                            $row['datastate'], 
                            $row['usertransacction']);
                    array_push($array, $currentCourse);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function getCourseById($id) {
         $query = 'call personDelete("' . $id . '");';
        try {
            $allCourses = $this->exeQuery($query);
//            $array = [];
            $currentCourse = null;
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $currentCourse = new FreeCourse(
                            $row['pk'], 
                            $row['cod'], 
                            $row['description'], 
                            $row['fkarea'], 
                            $row['daynumber'], 
                            $row['fkhour'], 
                            $row['datastate'], 
                            $row['usertransacction']);
//                    array_push($array, $currentStudent);
                }
            }
            return $currentCourse;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    
    public function confirmCode($code) {
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
    
}
