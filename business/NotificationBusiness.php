<?php

include '../data/NotificationData.php';

class NotificationBusiness {

    private $notificationData;

    public function NotificationBusiness() {
        return $this->notificationData = new NotificationData();
    }

    public function insertGeneralNotification($notification) {
        return $this->notificationData->insertGeneralNotification($notification);
    }

    public function updateGeneralNotification($notification) {
        return $this->notificationData->updateGeneralNotification($notification);
    }

    public function deteleNotification($id) {
        return $this->notificationData->deteleNotification($id);
    }

    public function getAllGeneralNotification() {
        return $this->notificationData->getAllGeneralNotification();
    }
    public function getNotification($id) {
        return $this->notificationData->getNotification($id);
    }

}
