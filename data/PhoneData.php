<?php

require_once '../data/Connector.php';
include '../domain/Phone.php';

class PhoneData extends Connector{

     public function insert($phone) {
        $query = "call insertPhone('" . $phone->getPhonePhone() . "',"
                . "" . $phone->getPhonePerson() . ")";

        return $this->exeQuery($query);
    }

    public function update($phone) {
        $query = "call updatePhone('" . $phone->getPhoneId() . "',"
                . "'" . $phone->getPhonePhone() . "',"
                . "'" . $phone->getPhonePerson() . "')";

        return $this->exeQuery($query);
    }

    public function delete($id) {
        $query = 'call deletePhone("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAllPhone($id) {
        $query = 'call getAllPhonesByPerson("' . $id . '");';
        
        $allPhones = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allPhones) > 0) {
            while ($row = mysqli_fetch_array($allPhones)) {
                $currentPhone = new Phone(
                        $row['phoneid'], 
                        $row['phonephone'], 
                        $row['phoneperson']);
                array_push($array, $currentPhone);
            }
        }
        return $array;
    }    
}

