<?php

require_once '../data/Connector.php';
include '../domain/Person.php';

class PersonData extends Connector {

    public function insert($person) {
        $query = "call insertPerson('" . $person->getPersonDni() . "',"
                . "'" . $person->getPersonFirstName() . "',"
                . "'" . $person->getPersonFirstlastname() . "',"
                . "'" . $person->getPersonSecondlastname() . "',"
                . "'" . $person->getPersonEmail() . "',"
                . "'" . $person->getPersonBirthday() . "',"
                . "'" . $person->getPersonGender() . "',"
                . "'" . $person->getPersonNacionality() . "',"
                . "'" . $person->getPersonimage() . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $id = trim($array[0]);
        return $id;
    }

    public function update($person) {
        $query = "call updatePerson('" . $person->getPersonId() . "',"
                . "'" . $person->getPersonDni() . "',"
                . "'" . $person->getPersonFirstName() . "',"
                . "'" . $person->getPersonFirstlastname() . "',"
                . "'" . $person->getPersonSecondlastname() . "',"
                . "'" . $person->getPersonEmail() . "',"
                . "'" . $person->getPersonBirthday() . "',"
                . "'" . $person->getPersonGender() . "',"
                . "'" . $person->getPersonNacionality() . "',"
                . "'" . $person->getPersonimage() . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $res = trim($array[0]);
        return $res;
    }

    public function delete($id) {
        $query = 'call deletePerson("' . $id . '");';

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
                $currentPerson = new Person($row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthday'], $row['personage'], $row['persongender'], $row['personnationality'], $row['personimage']);
                array_push($array, $currentPerson);
            }
        }
        return $array;
    }

    public function getPersonId($id) {
        $query = "call getPersonById('" . $id . "')";

        $allPerson = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allPerson) > 0) {
            while ($row = mysqli_fetch_array($allPerson)) {
                $currentPerson = new Person($row['personid'], 
                        $row['persondni'], 
                        $row['personfirstname'], 
                        $row['personfirstlastname'], 
                        $row['personsecondlastname'], 
                        $row['personemail'], 
                        $row['personbirthday'], 
                        $row['personage'], 
                        $row['persongender'],
                        $row['personnationality'], 
                        $row['personimage']);
                array_push($array, $currentPerson);
            }
        }
        return $array;
    }

    public function confirmDni($dni) {
        $query = "call confirmDni('" . $dni . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $res = trim($array[0]);
        return $res;
    }

    public function getLastId() {
        
    }

}
