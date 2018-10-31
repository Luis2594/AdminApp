<?php

include_once __DIR__.'/../../../../business/CommentBusiness.php';
include_once __DIR__.'/../../../../business/UserBusiness.php';
if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person == null) {
        echo json_encode(null);
        return;
    }
    $business = new CommentBusiness();
    if (isset($_POST['comment'])) {
        $business->insert(new Comment(0, $_POST['comment'], $_POST['idforumconversation'], $person['personid']));
        $result = [];
        foreach ($business->getCommentsByUser($person['personid']) as $current) {
            $array = array("forumcommentid" => $current->getId(),
                "forumcommentcomment" => $current->getComment(),
                "forumcommentforumconversation" => $current->getConversation(),
                "person" => $current->getPerson(),
            );
            array_push($result, $array);
        }
        echo json_encode($result);
    } else {
        echo json_encode(null);
    }
} else {
    echo json_encode(null);
}
