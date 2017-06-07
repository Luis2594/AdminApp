<?php

header("Content-Type: text/html;charset=utf-8");
require_once '../data/Connector.php';
include '../domain/User.php';

/**
 * Description of UserData
 *
 * @author luisd
 */
class UserData extends Connector{

    public function insert($user) {
        $query = "call insert('" . $user->getUserUsername() . "',"
                . "'" . $user->getUserPass() . "',"
                . "'" . $user->getUserUserType() . "',"
                . "'" . $user->getUserPerson() . "')";

        return $this->exeQuery($query);
    }

    public function update($user) {
       $query = "call update('" . $user->getUserId() . "',"
                . "'" . $user->getUserUsername() . "',"
                . "'" . $user->getUserPass() . "',"
                . "'" . $user->getUserUserType() . "',"
                . "'" . $user->getUserPerson() . "')";

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
        $query = "";
        
        $allUsers = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allUsers) > 0) {
            while ($row = mysqli_fetch_array($allUsers)) {
                $currentUser = new CourseSchedule(
                        $row['userId'], 
                        $row['userUsername'], 
                        $row['userPass'], 
                        $row['userUserType'], 
                        $row['userPerson']);
                array_push($array, $currentUser);
            }
        }
        return $array;
    }

    public function getCourseId($id) {
        $query = "";
        
        $allUser = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allUser) > 0) {
            while ($row = mysqli_fetch_array($allUser)) {
                $currentUser = new CourseSchedule(
                        $row['userId'], 
                        $row['userUsername'], 
                        $row['userPass'], 
                        $row['userUserType'], 
                        $row['userPerson']);
                array_push($array, $currentUser);
            }
        }
        return $array;
    }

    public function getLastId() {
        
    }
    
}
