<?php

require_once '../data/PhoneEmergentData.php';

/**
 * Description of AreaBusiness
 *
 * @author luis
 */
class PhoneEmergentBusiness {

    private $data;

    function PhoneEmergentBusiness() {
        $this->data = new PhoneEmergentData();
    }

    public function insert($phone) {
        return $this->data->insert($phone);
    }

    public function update($phone) {
        return $this->data->update($phone);
    }

    public function delete($id) {
        return $this->data->delete($id);
    }

    public function phoneByPk($id) {
        return $this->data->phoneByPk($id);
    }

    public function phoneByPerson($id) {
        return $this->data->phoneByPerson($id);
    }

}
