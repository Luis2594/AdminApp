<?php

require_once '../data/Connector.php';
include '../domain/Notification.php';

/**
 * Description of NotificationData
 *
 * @author luisd
 */
class NotificationData extends Connector{

     public function insertGeneralNotification($notification) {
        $query = "call insertGeneralNotification('" . $notification->getNotificationText() . "')";
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function updateGeneralNotification($notification) {
        $query = "call updateGeneralNotification('" . $notification->getNotificationId() . "',"
                . "'" . $notification->getNotificationText() . "')";
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        return trim($array[0]);
    }

    public function deteleNotification($id) {
        $query = 'call deteleNotification("' . $id . '");';

        if ($this->exeQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAllGeneralNotification() {
        $query = 'call getAllGeneralNotification();';
        
        $allNotifications = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allNotifications) > 0) {
            while ($row = mysqli_fetch_array($allNotifications)) {
                //Notification($notificationId, $notificationText, 
                //$notificactionProfessor, $notificationCourse, 
                //$notificationStudent, $notificationForum, 
                //$notificationRead, $notificationDate) 
                $currentNotification = new Notification(
                        $row['notificationid'], $row['notificationtext'],
                        NULL, NULL, NULL, NULL, NULL, NULL );
                array_push($array, $currentNotification);
            }
        }
        return $array;
    }   
    
    public function getNotification($id) {
        $query = 'call getNotification("'. $id .'");';
        
        $allNotifications = $this->exeQuery($query);
        $array = [];
        if (mysqli_num_rows($allNotifications) > 0) {
            while ($row = mysqli_fetch_array($allNotifications)) {
                //Notification($notificationId, $notificationText, 
                //$notificactionProfessor, $notificationCourse, 
                //$notificationStudent, $notificationForum, 
                //$notificationRead, $notificationDate) 
                $currentNotification = new Notification(
                        $row['notificationid'], $row['notificationtext'],
                        NULL, NULL, NULL, NULL, NULL, NULL );
                array_push($array, $currentNotification);
            }
        }
        return $array;
    }
}

