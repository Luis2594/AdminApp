<?php

include_once '../data/AreaData.php';

/**
 * Description of AreaBusiness
 *
 * @author luis
 */
class AreaBusiness {

    //put your code here

    private $data;

    public function AreaBusiness() {
        return $this->data = new AreaData();
    }

    public function insert($course) {
        
    }

    public function update($course) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        return $this->data->getAll();
    }

    public function getAllToSelect() {
        return $this->data->getAllToSelect();
    }

}
