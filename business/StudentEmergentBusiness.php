<?php

include_once '../data/StudentEmergentData.php';

/**
 * Description of StudentEmergentBusiness
 *
 * @author luis
 */
class StudentEmergentBusiness {

    //put your code here

    private $data;

    public function StudentEmergentBusiness() {
        return $this->data = new StudentEmergentData();
    }

    public function insert($studentEmergent) {
        return $this->data->insert($studentEmergent);
    }

    public function update($studentEmergent) {
        return $this->data->update($studentEmergent);
    }

    public function delete($id) {
        return $this->data->delete($id);
    }

    public function getAll() {
        return $this->data->getAll();
    }

    public function getStudentById($id) {
        return $this->data->getStudentById($id);
    }
    
    public function confirmDni($dni){
        return $this->data->confirmDni($dni);
    }

}
