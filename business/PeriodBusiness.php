<?php

include '../data/PeriodData.php';

class PeriodBusiness {

    private $periodData;
    
    public function PeriodBusiness() {
        return $this->periodData = new PeriodData();
    }
    
    public function getAllPeriods() {
        return $this->periodData->getAllPeriods();
    }
    
}
