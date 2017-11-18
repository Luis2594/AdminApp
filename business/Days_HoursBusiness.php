<?php

include_once '../data/Days_HoursData.php';

/**
 * Description of AreaBusiness
 *
 * @author luis
 */
class Days_HoursBusiness {

    //put your code here

    private $data;

    public function Days_HoursBusiness() {
        return $this->data = new Days_HoursData();
    }
    
    public function getDays() {
        return $this->data->getDays();
    }

    public function getHours() {
        return $this->data->getHours();
    }

}
