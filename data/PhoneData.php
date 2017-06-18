<?php

require_once '../data/Connector.php';
include '../domain/Phone.php';

/**
 * Description of PhoneData
 *
 * @author luisd
 */
class PhoneData extends Connector{

     public function insert($phone) {
        $query = "call insertPhone('" . $phone->getPhonePhone() . "',"
                . "" . $phone->getPhonePerson() . ")";

        return $this->exeQuery($query);
    }

    public function update($phone) {
        $query = "call update('" . $phone->getPhoneId() . "',"
                . "'" . $phone->getPhonePhone() . "',"
                . "'" . $phone->getPhonePerson() . "')";

        return $this->exeQuery($query);
    }

    public function delete($id) {
        $query = 'call delete("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAll() {
        $query = "";
        
        $allPhones = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allPhones) > 0) {
            while ($row = mysqli_fetch_array($allPhones)) {
                $currentPhone = new CourseSchedule(
                        $row['phoneId'], 
                        $row['phonePhone'], 
                        $row['phonePerson']);
                array_push($array, $currentPhone);
            }
        }
        return $array;
    }

    public function getCourseId($id) {
        $query = "";
        
        $allPhone = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allPhone) > 0) {
            while ($row = mysqli_fetch_array($allPhone)) {
                $currentPhone = new CourseSchedule(
                        $row['phoneId'], 
                        $row['phonePhone'], 
                        $row['phonePerson']);
                array_push($array, $currentPhone);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
    
}

