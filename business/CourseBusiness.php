<?php

include '../data/CourseData.php';

/**
 * Description of CourseBusiness
 *
 * @author luisd
 */
class CourseBusiness {
   
    private $courseData;

    public function CourseBusiness() {
        return $this->courseData = new CourseData();
    }
    
     public function insert($course) {
       return $this->courseData->insert($course);
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
    
    public function getLastId() {
        return $this->courseData->getLastId();
    }
    
}
