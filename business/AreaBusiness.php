<?php

include_once '../data/AreaData.php';

/**
 * Description of AreaBusiness
 *
 * @author luis
 */
class AreaBusiness {

    //put your code here

    private $areaData;

    public function AreaBusiness() {
        return $this->areaData = new AreaData();
    }

    public function insert($area) {
        return $this->areaData->insert($area);
    }

    public function update($area) {
        return $this->areaData->update($area);
    }

    public function delete($pk) {
        return $this->areaData->delete($pk);
    }

    public function getAll() {
        return $this->areaData->getAll();
    }

    public function getAllToSelect() {
        return $this->areaData->getAllToSelect();
    }

}
