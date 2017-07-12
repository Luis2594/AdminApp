<?php

require_once '../data/Connector.php';
include '../domain/Admin.php';
include '../domain/Person.php';

class AdminData extends Connector {

    public function insert($person, $pass) {
        $query = "call insertAdminCredentials('" . $person . "',"
                . "'" . $pass . "')";
        
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $id = trim($array[0]);
        return $id;
    }

    public function update($person, $pass) {
        $query = "call updateAdmin('" . $person . "',"
                . "'" . $pass . "')";
        
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $res = trim($array[0]);
        return $res;
    }
    
    public function getAll() {
        $query = "call getAllAdmin()";
        
        $allPersons = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allPersons) > 0) {
            while ($row = mysqli_fetch_array($allPersons)) {
                $currentPerson = new Person($row['personid'], $row['persondni'], 
                        $row['personfirstname'], $row['personfirstlastname'], 
                        $row['personsecondlastname'], $row['personemail'], 
                        $row['personbirthday'], $row['personage'],
                        $row['persongender'], $row['personnationality'],
                        $row['personimage']);
                array_push($array, $currentPerson);
            }
        }
        return $array;
    }
}
