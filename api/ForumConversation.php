<?php

//Cargar
//post
//Recibe username y userpassword
//Retorna las conversaciones de ese usuario si los credenciales son válidos, nulo si no es valido
include_once __DIR__.'/../business/UserBusiness.php';
if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != null) {
        include_once __DIR__.'/../business/ConversationBusiness.php';
        $business = new ConversationBusiness();
        $result = [];
        foreach ($business->getConversationsByUser($person['personid']) as $conversation) {
            $array = array("forumconversationid" => $conversation->getForumConversationId(),
                "forumid" => $conversation->getForumId(),
                "forumconversation" => $conversation->getForumConversation(),
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
