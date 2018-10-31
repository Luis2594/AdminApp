<?php

require_once '../data/ConnectorEmergent.php';
include_once __DIR__.'/../domain/PhoneEmergent.php';
//require_once './resource/log/ErrorHandler.php';

class PhoneEmergentData extends ConnectorEmergent {

    public function insert($phone) {
        $query = "call phoneInsert('" . $phone->getPhone() . "',"
                . "'" . $phone->getFkperson() . "',"
                . "'" . $phone->getUsertransacction() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($phone) {
        $query = "call phoneUpdate('" . $phone->getPk() . "',"
                . "'" . $phone->getPhone() . "',"
                . "'" . $phone->getDatastate() . "',"
                . "'" . $phone->getUsertransacction() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call phoneDelete(' . $id . ');';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function phoneByPk($id) {
        $query = 'call phoneByPk("' . $id . '");';
        try {
            $allPhones = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allPhones) > 0) {
                while ($row = mysqli_fetch_array($allPhones)) {
                    $currentPhone = new PhoneEmergent(
                            $row['pk'], 
                            $row['phone'], 
                            $row['fkperson'], 
                            $row['datastate'], 
                            $row['usertransacction']);
                    array_push($array, $currentPhone);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function phoneByPerson($id) {
        $query = 'call phoneByPerson("' . $id . '");';
        try {
            $allPhones = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allPhones) > 0) {
                while ($row = mysqli_fetch_array($allPhones)) {
                    $currentPhone = new PhoneEmergent(
                            $row['pk'], 
                            $row['phone'], 
                            $row['fkperson'], 
                            $row['datastate'], 
                            $row['usertransacction']);
                    array_push($array, $currentPhone);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
