<?php

require_once '../data/Connector.php';
include '../domain/Comment.php';

class CommentData extends Connector {

    public function insert($comment) {

        $query = "call insertComment('"
                . $comment->getComment() . "','"
                . $comment->getConversation() . "','"
                . $comment->getPerson() . "')";
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function update($comment) {
        $query = "call updateComment(" .
                $comment->getId() . ",'" .
                $comment->getComment() . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function deteleComment($id) {
        $query = 'call deteleComment("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAll() {
        $query = 'call getAllComment();';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Comment(
                        $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $row['forumcommentperson']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

    public function getComment($id) {
        $query = 'call getComment("' . $id . '");';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Comment(
                        $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $row['forumcommentperson']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

    public function getCommentsByUser($id) {
        $query = 'call getCommentByUser("' . $id . '");';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Comment(
                        $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $row['forumcommentperson']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

}
