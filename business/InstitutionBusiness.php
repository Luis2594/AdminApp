<?php

include_once __DIR__.'/../data/InstitutionData.php';

/**
 * Description of InstitutionBusiness
 *
 * @author Kevin ESquivel Marín <kevinesquivel21@gmail.com>
 */
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
    
    public function getInstitutionAPI() {
        return $this->institutionData->getInstitutionAPI();
    }
    
    public function getInstitutionObject() {
        return $this->institutionData->getInstitutionObject();
    }

}
