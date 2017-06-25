<?php

include '../data/SpecialityData.php';

/**
 * Description of SpecialityBusiness
 *
 * @author luisd
 */
class SpecialityBusiness {
   
    private $specialityData;

    public function SpecialityBusiness() {
        return $this->specialityData = new SpecialityData();
    }
    
     public function insert($speciality) {
       return $this->specialityData->insert($speciality);
    }
    
    public function update($speciality) {
       return $this->specialityData->update($speciality);
    }
    
    public function delete($id) {
      return $this->specialityData->delete($id);
    }
    
    public function getAll() {
      return $this->specialityData->getAll();
    }
    
    public function getAllSpecialitiesForCourse() {
      return $this->specialityData->getAllSpecialitiesForCourse();
    }
    
    public function getSpecialityId($id) {
     return $this->specialityData->getSpecialityId($id);
    }
    
    public function getLastId() {
        return $this->specialityData->getLastId();
    }
}
