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
        $query = "call insertArea('" . $description . "','"
                . $datastate ."','" . $usertransacction . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);

            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($area) {
        $query = "call updateArea('" . $pk . "','"
                . $description ."','". $datastate ."','" . $usertransacction . "')";
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
            if (mysqli_num_rows($allAreas) > 0) {
                while ($row = mysqli_fetch_array($allAreas)) {
                    $currentArea = new Area(
                            $row['pk'], $row['dni'], $row['description'], $row['datastate'], $row['usertransacction']);
                    array_push($array, $currentArea);
                }
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

    public function delete($pk) {
        $query = 'call deleteArea("' . $pk . '");';
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
