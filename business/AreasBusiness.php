<?php

include_once '../data/AreasData.php';

/**
 * Description of AreaBusiness
 *
 * @author Kevin ESquivel Marín <kevinesquivel21@gmail.com>
 */
class AreasBusiness {

    private $areaData;

    public function AreasBusiness() {
        return $this->areaData = new AreasData();
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
    
    public function getByPk($pk) {
        return $this->areaData->getByPk($pk);
    }

    public function getAll() {
        return $this->areaData->getAll();
    }
}
