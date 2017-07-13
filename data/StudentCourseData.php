<?php

require_once '../data/Connector.php';
include '../domain/StudentCourse.php';

class StudentCourseData extends Connector{
    
     public function insert($studentCourse) {
        $query = "call insert('" . $studentCourse->getStudentCourseStudent() . "',"
                . "'" . $studentCourse->getStudentCourseCourse() . "',"
                . "'" . $studentCourse->getStudentCourseYear() . "')";

        return $this->exeQuery($query);
    }

    public function update($studentCourse) {
        $query = "call insert('" . $studentCourse->getStudentCourseId() . "',"
                . "'" . $studentCourse->getStudentCourseStudent() . "',"
                . "'" . $studentCourse->getStudentCourseCourse() . "',"
                . "'" . $studentCourse->getStudentCourseYear() . "')";

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
        
        $allStudentCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allStudentCourses) > 0) {
            while ($row = mysqli_fetch_array($allStudentCourses)) {
                $currentStudentCourse = new CourseSchedule(
                        $row['studentCourseId'], 
                        $row['studentCourseStudent'], 
                        $row['studentCourseCourse'], 
                        $row['studentCourseYear']);
                array_push($array, $currentStudentCourse);
            }
        }
        return $array;
    }

    public function getCourseId($id) {
         $query = "";
        
        $allStudentCourse = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allStudentCourse) > 0) {
            while ($row = mysqli_fetch_array($allStudentCourse)) {
                $currentStudentCourse = new CourseSchedule(
                        $row['studentCourseId'], 
                        $row['studentCourseStudent'], 
                        $row['studentCourseCourse'], 
                        $row['studentCourseYear']);
                array_push($array, $currentStudentCourse);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
}
