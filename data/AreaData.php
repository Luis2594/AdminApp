<?php

require_once '../data/ConnectorEmergent.php';
include '../domain/Area.php';

/**
 * Description of AreaData
 *
 * @author luis
 */
class AreaData extends ConnectorEmergent {

    //put your code here

    public function insert($area) {
        $query = "call insertAdminCredentials('" . $person . "',"
                . "'" . $pass . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);

            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($person, $pass) {
        $query = "call updateAdmin('" . $person . "',"
                . "'" . $pass . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $res = trim($array[0]);
            return $res;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAll() {
        $query = "SELECT * FROM areas";
        try {
            $allAreas = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($allAreas)) {
//                $array[] = array("id" => $row['pk'],
//                    "name" => $row['description']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllToSelect() {
        $query = "SELECT * FROM areas";
        try {
            $allAreas = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($allAreas)) {
                $array[] = array("id" => utf8_encode($row['pk']),
                    "name" => utf8_encode($row['description']));
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call deleteCourse("' . $id . '");';
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

}
