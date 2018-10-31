<?php

require_once '../data/ConnectorEmergent.php';
include_once __DIR__.'/../domain/Area.php';

/**
 * Description of AreaData
 *
 * @author luis
 */
class AreasData extends ConnectorEmergent {

    public function insert($area) {
        $query = "call areasInsert('" . $area->getDescription() . "','" . $area->getUsertransacction() . "');";
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
        $query = "call areasUpdate(" . $area->getPk() . ",'" . $area->getDescription() . "',"
                . $area->getDatastate() . ",'" . $area->getUsertransacction() . "');";
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
        $query = "call areasAll();";
        try {
            $allAreas = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allAreas) > 0) {
                while ($row = mysqli_fetch_array($allAreas)) {
                    $currentArea = new Area($row['pk'], utf8_decode($row['description']), $row['datastate'], $_SESSION["name"]);
                    array_push($array, $currentArea);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllToSelect() {
        $query = "call areasAll();";
        try {
            $allAreas = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allAreas) > 0) {
                while ($row = mysqli_fetch_array($allAreas)) {
                    $array[] = array("id" => $row['pk'],
                        "name" => utf8_encode($row['description']),
                        "datastate" => $row['datastate'],
                        "system" => "System");
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getByPk($pk) {
        $query = 'call areasByPk(' . $pk . ');';
        try {
            $allAreas = $this->exeQuery($query);
            if (mysqli_num_rows($allAreas) > 0) {
                while ($row = mysqli_fetch_array($allAreas)) {
                    return new Area($row['pk'], $row['description'], $row['datastate'], $_SESSION["name"]);
                }
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($pk) {
        $query = 'call areasDelete(' . $pk . ');';
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
