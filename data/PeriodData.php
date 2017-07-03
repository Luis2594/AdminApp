<?php

require_once '../data/Connector.php';
include '../domain/Period.php';

/**
 * Description of PeriodData
 *
 * @author luis
 */
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

}
