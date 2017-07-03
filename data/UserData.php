<?php

require_once '../data/Connector.php';
include '../domain/User.php';

/**
 * Description of UserData
 *
 * @author luisd
 */
class UserData extends Connector {

    public function insert($user) {
        $query = "call insertUser('" . $user->getUserUsername() . "',"
                . "'" . $user->getUserPass() . "',"
                . "" . $user->getUserUserType() . ","
                . "" . $user->getUserPerson() . ")";

        $res = $this->exeQuery($query);

        return mysqli_num_rows($res);
    }
    
    public function insertProfessorWithCredentials($user) {
        $query = "call insertProfessorWithCredentials('" . $user->getUserPerson() . "',"
                . "" . $user->getUserPass() . ")";

        return $this->exeQuery($query);
    }

    public function update($user) {
        $query = "call updateUser('" . $user->getUserId() . "',"
                . "'" . $user->getUserUsername() . "',"
                . "'" . $user->getUserPass() . "')";

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
                        $row['userId'], $row['userUsername'], $row['userPass'], $row['userUserType'], $row['userPerson']);
                array_push($array, $currentUser);
            }
        }
        return $array;
    }

    public function getUserId($id) {
        $query = "SELECT * FROM personuser WHERE userperson = ". $id;

        $allUser = $this->exeQuery($query);
        if (mysqli_num_rows($allUser) > 0) {
            while ($row = mysqli_fetch_array($allUser)) {
                $currentUser = new User(
                        $row['userid'], 
                        $row['userusername'], 
                        $row['useruserpass'], 
                        $row['userusertype'], 
                        $row['userperson']);
            }
        }
        return $currentUser;
    }

    public function getLastId() {
        
    }

}
