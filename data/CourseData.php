<?php

header("Content-Type: text/html;charset=utf-8");
require_once '../data/Connector.php';
include '../domain/Course.php';

/**
 * Description of CourseData
 *
 * @author luisd
 */
class CourseData extends Connector{
    
    public function insert($course) {
        $query = "call insert('" . $course->getCourseCode() ."',"
                . "'" . $course->getCourseName() . "',"
                . "'" . $course->getCourseCredits() . "',"
                . "'" . $course->getCourseLesson() . "',"
                . "'" . $course->getCoursePeriod() . "',"
                . "'" . $course->getCourseSpeciality() . "')";

        return $this->exeQuery($query);
    }
    
    public function update($course) {
        $query = "call update('" . $course->getCourseId() ."',"
                . "'" . $course->getCourseCode() . "',"
                . "'" . $course->getCourseName() . "',"
                . "'" . $course->getCourseCredits() . "',"
                . "'" . $course->getCourseLesson() . "',"
                . "'" . $course->getCoursePeriod() . "',"
                . "'" . $course->getCourseSpeciality() . "')";

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
        
        $allCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourses) > 0) {
            while ($row = mysqli_fetch_array($allCourses)) {
                $currentCourse = new Course($row['courseId'], 
                        $row['courseCode'], 
                        $row['courseName'], 
                        $row['courseCredits'], 
                        $row['courseLesson'], 
                        $row['coursePeriod'],
                        $row['courseSpeciality']);
                array_push($array, $currentCourse);
            }
        }
        return $array;
    }
    
    public function getCourseId($id) {
        $query = "";
        
        $allCourses = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allCourses) > 0) {
            while ($row = mysqli_fetch_array($allCourses)) {
                $currentCourse = new Course($row['courseId'], $row['courseCode'], $row['courseName'], $row['courseCredits'], $row['courseLesson'], $row['coursePeriod'],$row['courseSpeciality']);
                array_push($array, $currentCourse);
            }
        }
        return $array;
    }
    
    public function getLastId() {
        
    }
}
