<?php

require_once '../data/Connector.php';
include '../domain/Forum.php';

class ForumData extends Connector {

    public function insert($forum) {

        $query = "call insertForum('".
                $forum->getName() . "'," .
                $forum->getCourse() . "," .
                $forum->getProfessor() . ")";
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function update($forum) {
        $query = "call updateForum(" .
                $forum->getId() . ",'" .
                $forum->getName() . "'," .
                $forum->getCourse() . ",'" .
                $forum->getProfessor() . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function deteleForum($id) {
        $query = 'call deteleForum("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAll() {
        $query = 'call getAllForum();';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Forum(
                        $row['forumid'], $row['forumname'], 
                        $row['forumcourse'], $row['forumprofessor']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

    public function getForum($id) {
        $query = 'call getForum("' . $id . '");';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Forum(
                        $row['forumid'], $row['forumname'], 
                        $row['forumcourse'], $row['forumprofessor']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

    public function getForumsByUser($id) {
        $query = 'call getForumByUser("' . $id . '");';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Forum(
                        $row['forumid'], $row['forumname'], 
                        $row['forumcourse'], $row['forumprofessor']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

}
