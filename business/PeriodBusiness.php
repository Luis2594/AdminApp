<?php

include '../data/PeriodData.php';

/**
 * Description of PeriodBusiness
 *
 * @author luis
 */
class PeriodBusiness {

    private $periodData;
    
    public function PeriodBusiness() {
        return $this->periodData = new PeriodData();
    }
    
    public function getAllPeriods() {
        return $this->periodData->getAllPeriods();
    }
    
}
