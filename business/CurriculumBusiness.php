<?php

include '../data/CurriculumData.php';

class CurriculumBusiness {

     private $curriculumData;

    public function CurriculumBusiness() {
        return $this->curriculumData = new CurriculumData();
    }
    
     public function insert($curriculum) {
       return $this->curriculumData->insert($curriculum);
    }
    
    public function update($curriculum) {
       return $this->curriculumData->update($curriculum);
    }
    
    public function delete($id) {
      return $this->curriculumData->delete($id);
    }
    
    public function getAll() {
      return $this->curriculumData->getAll();
    }
    
    public function getCurriculumId($id) {
     return $this->curriculumData->getCurriculumId($id);
    }
  
}
