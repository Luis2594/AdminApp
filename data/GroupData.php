<?php

require_once '../data/Connector.php';
include_once '../domain/Group.php';

/**
 * Description of GroupData
 *
 * @author Kevin Esquivel Marín <kevinesquivel21@gmail.com>
 */
class GroupData extends Connector
{

    /** GROUPS */
    public function getAll()
    {
        $query = "call getAllGroups();";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                $array[] = array("id" => $row['groupid'],
                    "number" => $row['groupnumber']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getGroup($id)
    {
        $query = "call getGroupsById(".$id.");";
        try {
            $group = $this->exeQuery($query);
            while ($row = mysqli_fetch_array($group)) {
                return array("id" => $row['groupid'],
                    "number" => $row['groupnumber']);
            }
            return [];
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllGroups()
    {
        $query = "call getGroupsList();";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                $array[] = array(
                    "groupid" => $row['groupid'],
                    "groupnumber" => $row['groupnumber'],
                    "period" => $row['period'],
                    "year" => $row['year']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllGroupsByFilters($period, $year)
    {
        $query = "call getGroupsByFilter(".$period.",".$year.");";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                $array[] = array(
                    "groupid" => $row['groupid'],
                    "groupnumber" => $row['groupnumber'],
                    "period" => $row['period'],
                    "year" => $row['year']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertGroup($number)
    {
        $query = "call insertGroup('" . $number . "')";

        try {
            $result = $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function updateGroup($id, $number)
    {
        $query = "call updateGroup(" . $id . ",'" . $number . "')";
        try {
            $result = $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deleteGroup($id)
    {
        $query = "call deleteGroup(" . $id . ")";
        try {
            if ($this->exeQuery($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getStudentByGroupByFilter($group, $period, $year)
    {
        $query = "call getStudentByGroupByFilter(".$group.",".$year.",".$year.");";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                $array[] = array(
                    "id" => $row['personid'],
                    "dni" => $row['persondni'],
                    "name" => $row['person'],
                    "phone" => $row['year']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    /**STUDENT GROUP */
    public function getGroupByStudent($id)
    {
        $query = "call getGroupByStudent(" . $id . ");";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                $array[] = array("id" => $row['groupid'],
                    "number" => $row['groupnumber']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getGroupByPerson($id)
    {
        $query = 'call getGroupByStudent(' . $id . ');';
        try {
            $allGroups = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allGroups) > 0) {
                while ($row = mysqli_fetch_array($allGroups)) {
                    $currentGroup = new Group($row['studentgroupgroup'], $row['groupnumber'], $row['studentsgrouppriority']);
                    array_push($array, $currentGroup);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($idPerson, $group)
    {
        $query = 'call deleteStudentGroup(' . $idPerson . ', ' . $group . ');';
        try {
            if ($this->exeQuery($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertStudentGroup($idGroup, $idStudent, $priority)
    {
        $query = "call insertStudentGroup(" . $idGroup . ","
            . "" . $idStudent . ","
            . "" . $priority . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
