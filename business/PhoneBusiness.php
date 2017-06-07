<?php

include '../data/PhoneData.php';

/**
 * Description of PhoneBusiness
 *
 * @author luisd
 */
class PhoneBusiness {
    
    private $phoneData;

    public function PhoneBusiness() {
        return $this->phoneData = new PhoneData();
    }
    
     public function insert($phone) {
       return $this->phoneData->insert($phone);
    }
    
    public function update($phone) {
       return $this->phoneData->update($phone);
    }
    
    public function delete($id) {
      return $this->phoneData->delete($id);
    }
    
    public function getAll() {
      return $this->phoneData->getAll();
    }
    
    public function getCourseId($id) {
     return $this->phoneData->getCourseId($id);
    }
    
    public function getLastId() {
        return $this->phoneData->getLastId();
    }
    
}
