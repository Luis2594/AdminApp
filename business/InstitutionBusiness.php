<?php

include '../data/InstitutionData.php';

class InstitutionBusiness {
    
    private $institutionData;

    public function InstitutionBusiness() {
        return $this->institutionData = new InstitutionData();
    }
    
     public function insert($institution) {
       return $this->institutionData->insert($institution);
    }
    
    public function update($institution) {
       return $this->institutionData->update($institution);
    }
    
    public function getInstitution() {
      return $this->institutionData->getInstitution();
    }
    
}
