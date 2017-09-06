<?php

require_once '../data/Connector.php';
include '../domain/Forum.php';
//require_once './resource/log/ErrorHandler.php';


class ForumData extends Connector {

    public function insert($forum) {

        $query = "call insertForum('" .
                $forum->getName() . "'," .
                $forum->getCourse() . "," .
                $forum->getProfessor() . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($forum) {
        $query = "call updateForum(" .
                $forum->getId() . ",'" .
                $forum->getName() . "'," .
                $forum->getCourse() . ",'" .
                $forum->getProfessor() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deteleForum($id) {
        $query = 'call deteleForum("' . $id . '");';
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

    public function getAll() {
        $query = 'call getAllForum();';
        try {
            $all = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($all) > 0) {
                while ($row = mysqli_fetch_array($all)) {
                    $currentInstitution = new Forum(
                            $row['forumid'], $row['forumname'], $row['forumcourse'], $row['forumprofessor']
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getForum($id) {
        $query = 'call getForum("' . $id . '");';
        try {
            $all = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($all) > 0) {
                while ($row = mysqli_fetch_array($all)) {
                    $currentInstitution = new Forum(
                            $row['forumid'], $row['forumname'], $row['forumcourse'], $row['forumprofessor']
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getForumsByUser($id) {
        $query = 'call getForumByUser(' . $id . ');';
        try {
            $all = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($all) > 0) {
                include_once '../business/PersonBusiness.php';
                $businessPerson = new PersonBusiness();
                while ($row = mysqli_fetch_array($all)) {
                    $person = $businessPerson->getPersonId($row['forumprofessor']);
                    $currentInstitution = new Forum(
                            $row['forumid'], $row['forumname'], $row['forumcourse'],
                            $person[0]->getPersonFirstName()." ".$person[0]->getPersonFirstlastname()
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
