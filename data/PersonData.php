<?php

require_once '../data/Connector.php';
include '../domain/Person.php';

/**
 * Description of PersonData
 *
 * @author luisd
 */
class PersonData extends Connector{

     public function insert($person) {
        $query = "call insert('" . $person->getPersonDni() . "',"
                . "'" . $person->getPersonFirstName() . "',"
                . "'" . $person->getPersonFirstlastname() . "',"
                . "'" . $person->getPersonSecondlastname() . "',"
                . "'" . $person->getPersonBirthday() . "',"
                . "'" . $person->getPersonAge() . "',"
                . "'" . $person->getPersonGender() . "',"
                . "'" . $person->getPersonNacionality() . "')";

        return $this->exeQuery($query);
    }

    public function update($person) {
        $query = "call insert('" . $person->getPersonId() . "',"
                . "'" . $person->getPersonDni() . "',"
                . "'" . $person->getPersonFirstName() . "',"
                . "'" . $person->getPersonFirstlastname() . "',"
                . "'" . $person->getPersonSecondlastname() . "',"
                . "'" . $person->getPersonBirthday() . "',"
                . "'" . $person->getPersonAge() . "',"
                . "'" . $person->getPersonGender() . "',"
                . "'" . $person->getPersonNacionality() . "')";

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
        $query = "SELECT * FROM `person`";
        
        $allPersons = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allPersons) > 0) {
            while ($row = mysqli_fetch_array($allPersons)) {
                $currentPerson = new CourseSchedule(
                        $row['personId'], 
                        $row['personDni'], 
                        $row['personFirstName'], 
                        $row['personFirstlastname'], 
                        $row['personSecondlastname'], 
                        $row['personBirthday'], 
                        $row['personAge'], 
                        $row['personGender'], 
                        $row['personNacionality']);
                array_push($array, $currentPerson);
            }
        }
        return $array;
    }

    public function getPersonId($id) {
        $query = "";
        
        $allPerson = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allPerson) > 0) {
            while ($row = mysqli_fetch_array($allPerson)) {
                $currentPerson = new CourseSchedule(
                        $row['personId'], 
                        $row['personDni'], 
                        $row['personFirstName'], 
                        $row['personFirstlastname'], 
                        $row['personSecondlastname'], 
                        $row['personBirthday'], 
                        $row['personAge'], 
                        $row['personGender'], 
                        $row['personNacionality']);
                array_push($array, $currentPerson);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
    
}
