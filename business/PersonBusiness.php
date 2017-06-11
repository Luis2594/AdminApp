<?php

include '../data/PersonData.php';

/**
 * Description of PersonBusiness
 *
 * @author luisd
 */
class PersonBusiness {

     private $personData;

    public function PersonBusiness() {
        return $this->personData = new PersonData();
    }
    
     public function insert($person) {
       return $this->personData->insert($person);
    }
    
    public function update($person) {
       return $this->personData->update($person);
    }
    
    public function delete($id) {
      return $this->personData->delete($id);
    }
    
    public function getAll() {
      return $this->personData->getAll();
    }
    
    public function getPersonId($id) {
     return $this->personData->getPersonId($id);
    }
    
    public function getLastId() {
        return $this->personData->getLastId();
    }
    
}
