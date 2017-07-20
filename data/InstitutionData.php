<?php

require_once '../data/Connector.php';
include '../domain/Institution.php';

class InstitutionData extends Connector {

    public function insert($institution) {

        $query = "call insertInstitution('"
                . $institution->getInstitutionName() . "','"
                . $institution->getInstitutionAddress() . "','"
                . $institution->getInstitutionFax() . "','"
                . $institution->getInstitutionPhone() . "','"
                . $institution->getInstitutionMission() . "','"
                . $institution->getInstitutionView() . "')";
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function update($institution) {
        $query = "call updateInstitution("
                . $institution->getInstitutionId() . ",'"
                . $institution->getInstitutionName() . "','"
                . $institution->getInstitutionAddress() . "','"
                . $institution->getInstitutionFax() . "','"
                . $institution->getInstitutionPhone() . "','"
                . $institution->getInstitutionMission() . "','"
                . $institution->getInstitutionView() . "')";
      
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function getInstitution() {
        $query = 'call getInstitution();';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Institution(
                        $row['institutionid'], $row['institutionname'], $row['institutionaddress'], $row['institutionfax'], $row['institutionphone'], $row['institutionmission'], $row['institutionview']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

}
