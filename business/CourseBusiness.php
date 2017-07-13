<?php

include '../data/CourseData.php';

class CourseBusiness {
   
    private $courseData;

    public function CourseBusiness() {
        return $this->courseData = new CourseData();
    }
    
     public function insert($course) {
       return $this->courseData->insert($course);
    }
    
     public function insertPeriod($course, $period) {
       return $this->courseData->insertPeriod($course, $period);
    }
    
    public function update($course) {
       return $this->courseData->update($course);
    }
    
    public function delete($id) {
      return $this->courseData->delete($id);
    }
    
    public function getAll() {
      return $this->courseData->getAll();
    }
    
    public function getCourseId($id) {
     return $this->courseData->getCourseId($id);
    }
    
    public function getCourseIdUpdate($id) {
     return $this->courseData->getCourseIdUpdate($id);
    }
    
    public function getType() {
        return $this->courseData->getType();
    }
    
    public function confirmCode($code) {
        return $this->courseData->confirmCode($code);
    }
    
}
