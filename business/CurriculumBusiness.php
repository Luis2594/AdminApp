<?php

include '../data/CurriculumData.php';

/**
 * Description of CurriculumBusiness
 *
 * @author luisd
 */
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
    
    public function getCourseId($id) {
     return $this->curriculumData->getCourseId($id);
    }
    
    public function getLastId() {
        return $this->curriculumData->getLastId();
    }
    
}
