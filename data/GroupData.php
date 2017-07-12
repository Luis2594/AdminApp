<?php

require_once '../data/Connector.php';

class GroupData extends Connector {

    public function insert($number) {
        $query = "call insert('" . $number . "')";

        $result = $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $id = trim($array[0]);
        return $id;
    }

    public function insertStudentGroup($idGroup, $idStudent, $priority) {
        $query = "call insertStudentGroup(" . $idGroup . ","
                . "" . $idStudent . ","
                . "" . $priority . ")";
        
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
        $query = "call getAllGroups();";

        $group = $this->exeQuery($query);
        $array = [];
        while ($row = mysqli_fetch_array($group)) {
            $array[] = array("id" => $row['groupid'],
                "number" => $row['groupnumber']);
        }
        return $array;
    }

}
