<?php

require_once '../data/Connector.php';
include '../domain/Professor.php';
include '../domain/ProfessorAll.php';

/**
 * Description of ProfessorData
 *
 * @author Kevin Esquivel
 */
class ProfessorData extends Connector {

    public function insertProfessorWithCredentials($professor, $pass) {
        $query = "call insertProfessorWithCredentials("
                . "" . $professor->getProfessorPerson() . ","
                . "'" . $pass . "')";

        return $this->exeQuery($query);
    }

    public function update($professor) {
        $query = "call updateProfessor(" . $professor->getProfessorId() . ","
                . "" . $professor->getProfessorPerson() . ")";

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
        $query = "call getAllProfessor()";

        $allProfessors = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allProfessors) > 0) {
            while ($row = mysqli_fetch_array($allProfessors)) {
                $currentProfessor = new ProfessorAll($row['professorid'],
                        $row['personid'], $row['persondni'], 
                        $row['personfirstname'], $row['personfirstlastname'], 
                        $row['personsecondlastname'], $row['personemail'], 
                        $row['persongender'], $row['personnationality'],
                        $row['userusername'], $row['useruserpass']);
                array_push($array, $currentProfessor);
            }
        }
        return $array;
    }

    public function getProfessor($id) {
        $query = 'call getProfessor("' . $id . '");';

        $allProfessor = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allProfessor) > 0) {
            while ($row = mysqli_fetch_array($allProfessor)) {
                $currentProfessor = new ProfessorAll($row['professorid'],
                        $row['personid'], $row['persondni'], 
                        $row['personfirstname'], $row['personfirstlastname'], 
                        $row['personsecondlastname'], $row['personemail'], 
                        $row['persongender'], $row['personnationality'],
                        $row['userusername'], $row['useruserpass']);
                array_push($array, $currentProfessor);
                array_push($array, $currentProfessor);
            }
        }
        return $array;
    }

    public function getLastId() {
        $query = 'call getProfessorLastId();';
        $value = $this->exeQuery($query);
        if (mysqli_num_rows($value) > 0) {
            $row = mysqli_fetch_array($value);
            return $row['id'];            
        }
        return -1;
    }

}
