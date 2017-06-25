<?php

require_once '../data/Connector.php';
include '../domain/Speciality.php';

/**
 * Description of SpecialityData
 *
 * @author luisd
 */
class SpecialityData extends Connector{

    public function insert($speciality) {
        $query = "call insertSpeciality('" . $speciality->getSpecialityName() . "')";

        $result = $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $id = trim($array[0]);
        return $id;
    }

    public function update($speciality) {
        $query = "call update('" . $speciality->getSpecialityId() . "',"
                . "'" . $speciality->getSpecialityName() . "')";

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
        $query = "call getAllSpeciality();";
        
        $allSpecialities = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allSpecialities) > 0) {
            while ($row = mysqli_fetch_array($allSpecialities)) {
                $currentSpeciality = new Speciality(
                        $row['specialityid'], 
                        $row['specialityname']);
                array_push($array, $currentSpeciality);
            }
        }
        return $array;
    }
    
    public function getAllSpecialitiesForCourse() {
        $query = "call getAllSpeciality();";
        
       $speciality = $this->exeQuery($query);
        $array = [];
        while ($row = mysqli_fetch_array($speciality)) {
            $array[] = array("id" => $row['specialityid'],
                "name" => $row['specialityname']);
        }
        return $array;
    }

    public function getSpecialityId($id) {
        $query = 'call getSpecialityById("' . $id . '");';
        
        $allSpecialities = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allSpecialities) > 0) {
            while ($row = mysqli_fetch_array($allSpecialities)) {
                $currentSpeciality = new Speciality(
                        $row['specialityid'], 
                        $row['specialityname']);
                array_push($array, $currentSpeciality);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
    
}
