<?php

require_once '../data/Connector.php';
include '../domain/CourseSchedule.php';

class CourseScheduleData extends Connector {

    public function insert($courseSchedule) {
        $query = "call insert('" . $courseSchedule->getCourseScheduleDay() . "',"
                . "'" . $courseSchedule->getCourseScheduleHour() . "',"
                . "'" . $courseSchedule->getCourseScheduleOptional() . "',"
                . "'" . $courseSchedule->getCourseScheduleCourse() . "',"
                . "'" . $courseSchedule->getCourseScheduleProfessor() . "',"
                . "'" . $courseSchedule->getCourseScheduleStudent() . "')";

        return $this->exeQuery($query);
    }

    public function update($courseSchedule) {
        $query = "call update('" . $courseSchedule->getCourseScheduleDay() . "',"
                . "'" . $courseSchedule->getCourseScheduleHour() . "',"
                . "'" . $courseSchedule->getCourseScheduleOptional() . "',"
                . "'" . $courseSchedule->getCourseScheduleCourse() . "',"
                . "'" . $courseSchedule->getCourseScheduleProfessor() . "',"
                . "'" . $courseSchedule->getCourseScheduleStudent() . "')";

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
        
        $allCourseSchedule = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourseSchedule) > 0) {
            while ($row = mysqli_fetch_array($allCourseSchedule)) {
                $currentCourseSchedule = new CourseSchedule(
                        $row['courseScheduleId'], 
                        $row['courseScheduleDay'], 
                        $row['courseScheduleHour'], 
                        $row['courseScheduleOptional'], 
                        $row['courseScheduleCourse'], 
                        $row['courseScheduleProfessor'], 
                        $row['courseScheduleStudent']);
                array_push($array, $currentCourseSchedule);
            }
        }
        return $array;
    }

    public function getCourseId($id) {
        $query = "";
        
        $allCourseSchedule = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourseSchedule) > 0) {
            while ($row = mysqli_fetch_array($allCourseSchedule)) {
                $currentCourseSchedule = new CourseSchedule(
                        $row['courseScheduleId'], 
                        $row['courseScheduleDay'], 
                        $row['courseScheduleHour'], 
                        $row['courseScheduleOptional'], 
                        $row['courseScheduleCourse'], 
                        $row['courseScheduleProfessor'], 
                        $row['courseScheduleStudent']);
                array_push($array, $currentCourseSchedule);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
}
