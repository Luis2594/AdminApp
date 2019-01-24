<?php

include_once __DIR__ . '/../../../business/UserBusiness.php';
if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $userBusiness = new UserBusiness();
    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);
    if ($person != null) {
        include_once __DIR__ . '/../../../business/NotificationBusiness.php';
        $notificationBusiness = new NotificationBusiness();
        $result = [];
        foreach ($notificationBusiness->getAllStudentsIncomingNotifications($person['personid']) as $current) {
            $array = array("notificationid" => $current->getNotificationId(),
                "notificationtext" => $current->getNotificationText(),
                "notificationdate" => $current->getNotificationDate(),
                "notificationsender" => $current->getNotificationSender(),
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
