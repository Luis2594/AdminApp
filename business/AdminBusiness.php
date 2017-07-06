<?php

include '../data/AdminData.php';

/**
 * Description of AdminBusiness
 *
 * @author luisd
 */
class AdminBusiness {

    private $adminData;

    public function AdminBusiness() {
        return $this->adminData = new AdminData();
    }

    public function insert($person, $pass) {
        return $this->adminData->insert($person, $pass);
    }

    public function update($person, $pass) {
        return $this->adminData->update($person, $pass);
    }

    public function getAll() {
        return $this->adminData->getAll();
    }

}
