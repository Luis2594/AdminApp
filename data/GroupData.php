<?php

require_once '../data/Connector.php';
include '../domain/Group.php';

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

    public function delete($idPerson, $group) {
        $query = 'call deleteStudentGroup(' . $idPerson . ', ' . $group . ');';
        echo $query;
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

    public function getStudentGroupByStudent($id) {
        $query = "call getStudentGroupByStudent(" . $id . ");";

        $group = $this->exeQuery($query);
        $array = [];
        while ($row = mysqli_fetch_array($group)) {
            $array[] = array("id" => $row['groupid'],
                "number" => $row['groupnumber']);
        }
        return $array;
    }

    public function getGroupByPerson($id) {
        $query = 'call getGroupsByPersonId(' . $id . ');';

        $allGroups = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allGroups) > 0) {
            while ($row = mysqli_fetch_array($allGroups)) {
                $currentGroup = new Group($row['studentgroupgroup'], $row['groupnumber'], $row['studentsgrouppriority']);
                array_push($array, $currentGroup);
            }
        }
        return $array;
    }

}
