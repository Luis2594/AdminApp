<?php

header("Content-Type: text/html;charset=utf-8");
require_once '../data/Connector.php';
include '../domain/Person.php';

/**
 * Description of SpecialityData
 *
 * @author luisd
 */
class SpecialityData extends Connector{

    public function insert($speciality) {
        $query = "call insert('" . $speciality->getSpecialityName() . "')";

        return $this->exeQuery($query);
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
        $query = "";
        
        $allSpecialities = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allSpecialities) > 0) {
            while ($row = mysqli_fetch_array($allSpecialities)) {
                $currentSpeciality = new CourseSchedule(
                        $row['specialityId'], 
                        $row['specialityName']);
                array_push($array, $currentSpeciality);
            }
        }
        return $array;
    }

    public function getCourseId($id) {
        $query = "";
        
        $allSpecialitie = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allSpecialitie) > 0) {
            while ($row = mysqli_fetch_array($allSpecialitie)) {
                $currentSpeciality = new CourseSchedule(
                        $row['specialityId'], 
                        $row['specialityName']);
                array_push($array, $currentSpeciality);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
    
}
