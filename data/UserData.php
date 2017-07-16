<?php

require_once '../data/Connector.php';
include '../domain/User.php';
include '../business/PersonBusiness.php';

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
        $query = "SELECT * FROM personuser WHERE userperson = " . $id;

        $allUser = $this->exeQuery($query);
        if (mysqli_num_rows($allUser) > 0) {
            while ($row = mysqli_fetch_array($allUser)) {
                $currentUser = new User(
                        $row['userid'], $row['userusername'], $row['useruserpass'], $row['userusertype'], $row['userperson']);
            }
        }
        return $currentUser;
    }

    public function getLastId() {
        
    }

    public function login($user, $pass) {
        $query = "call login('" . $user . "', '" . $pass . "')";

        $result = $this->exeQuery($query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                session_start();
                $_SESSION["img"] = $row['personimage'];
                $_SESSION["type"] = $row['userusertype'];
                $_SESSION["id"] = $row['personid'];
                $_SESSION["name"] = $row['personfirstname'] + " " + $row['personfirstlastname'];
                break;
            }
        }
        if (!isset($_SESSION['id']) || !isset($_SESSION['type']) || !isset($_SESSION['name']) || !isset($_SESSION['img'])) {
            // remove all session variables
            session_unset();

            // destroy the session 
            session_destroy();
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function isUser($user, $pass) {
        $query = "call isUser('" . $user . "', '" . $pass . "')";

        $result = $this->exeQuery($query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                return new Person($row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthday'], $row['personage'], $row['persongender'], $row['personnationality'], $row['personimage']);
            }
        }
        return NULL;
    }

}
