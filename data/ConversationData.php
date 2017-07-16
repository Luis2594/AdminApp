<?php

require_once '../data/Connector.php';
include '../domain/Conversation.php';

class ConversationData extends Connector {

    public function insert($conversation) {

        $query = "call insertConversation('"
                . $conversation->getForumId() . "','"
                . $conversation->getForumConversation() . "')";
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function update($conversation) {
        $query = "call updateConversation("
                . $conversation->getForumConversationId() . ",'"
                . $conversation->getForumConversation() . "')";

        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function deteleConversation($id) {
        $query = 'call deteleConversation("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAll() {
        $query = 'call getAllConversation();';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Conversation(
                        $row['forumconversationid'], $row['forumid'], $row['forumconversation']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

    public function getConversation($id) {
        $query = 'call getConversation("' . $id . '");';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Conversation(
                        $row['forumconversationid'], $row['forumid'], $row['forumconversation']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

    public function getConversationsByUser($id) {
        $query = 'call getConversationByUser("' . $id . '");';

        $allInstitutions = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allInstitutions) > 0) {
            while ($row = mysqli_fetch_array($allInstitutions)) {
                $currentInstitution = new Conversation(
                        $row['forumconversationid'], $row['forumid'], $row['forumconversation']
                );
                array_push($array, $currentInstitution);
            }
        }
        return $array;
    }

}
