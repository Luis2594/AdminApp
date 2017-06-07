<?php

include '../data/StudentData.php';

/**
 * Description of StudentBusiness
 *
 * @author luisd
 */
class StudentBusiness {

    private $studentData;

    public function StudentBusiness() {
        return $this->studentData = new StudentData();
    }
    
     public function insert($student) {
       return $this->studentData->insert($student);
    }
    
    public function update($student) {
       return $this->studentData->update($student);
    }
    
    public function delete($id) {
      return $this->studentData->delete($id);
    }
    
    public function getAll() {
      return $this->studentData->getAll();
    }
    
    public function getCourseId($id) {
     return $this->studentData->getCourseId($id);
    }
    
    public function getLastId() {
        return $this->studentData->getLastId();
    }
    
}
