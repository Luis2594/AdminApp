<?php

require_once '../data/Connector.php';
include '../domain/Period.php';

class PeriodData extends Connector {

    public function getAllPeriods() {
        $query = "SELECT * FROM period";

        $periods = $this->exeQuery($query);
        $array = [];
        while ($row = mysqli_fetch_array($periods)) {
            $array[] = array("id" => $row['periodid'],
                "period" => $row['period']);
        }
        return $array;
    }

    public function getAllPeriodsByCourse($id) {
        $query = "call getCoursePeriodByCourse(" . $id . ")";

        $periods = $this->exeQuery($query);
        $array = [];
        while ($row = mysqli_fetch_array($periods)) {

            $currentPeriod = new Period(
                    $row['periodid'], $row['period']);
            array_push($array, $currentPeriod);
        }
        return $array;
    }

    public function deletePeridoCourse($idCourse, $idPeriod) {
        $query = 'call deleteCoursePeriod(' . $idCourse . ', '.$idPeriod.');';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
