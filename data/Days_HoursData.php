<?php

include_once __DIR__.'/../data/ConnectorEmergent.php';
include_once __DIR__.'/../domain/Area.php';

/**
 * Description of AreaData
 *
 * @author luis
 */
class Days_HoursData extends ConnectorEmergent {

    //put your code here

    public function getDays() {
        $query = "SELECT * FROM days";
        try {
            $allDays = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($allDays)) {
                $array[] = array("id" => utf8_encode($row['pk']),
                    "day" => utf8_encode($row['description']));
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
   
    public function getHours() {
        $query = "SELECT * FROM hours";
        try {
            $allHours = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($allHours)) {
                $array[] = array("id" => utf8_encode($row['pk']),
                    "hour" => utf8_encode($row['description']));
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
