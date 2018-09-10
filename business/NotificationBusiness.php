<?php

include_once '../data/NotificationData.php';

class NotificationBusiness
{

    private $notificationData;

    public function NotificationBusiness()
    {
        return $this->notificationData = new NotificationData();
    }

    public function getAllNotificationsByStudent($id)
    {
        return $this->notificationData->getAllNotificationsByStudent($id);
    }

    public function getNotificationAdmin($id)
    {
        return $this->notificationData->getNotificationAdmin($id);
    }

    public function getAllNotificationIncomingAdmin($id)
    {
        return $this->notificationData->getAllNotificationIncomingAdmin($id);
    }

    public function getNotificationProfessor($id)
    {
        return $this->notificationData->getNotificationProfessor($id);
    }

    public function getNotificationStudent($id)
    {
        return $this->notificationData->getNotificationStudent($id);
    }

    public function getAllAdminsNotifications()
    {
        return $this->notificationData->getAllAdminsNotifications();
    }

    public function getAllProfessorsNotifications()
    {
        return $this->notificationData->getAllProfessorsNotifications();
    }

    public function getAllStudentsNotifications()
    {
        return $this->notificationData->getAllStudentsNotifications();
    }

    public function insertAdminNotification($notification)
    {
        return $this->notificationData->insertAdminNotification($notification);
    }

    public function insertProfessorNotification($notification)
    {
        return $this->notificationData->insertProfessorNotification($notification);
    }

    public function insertStudentNotification($notification)
    {
        return $this->notificationData->insertStudentNotification($notification);
    }

    public function updateAdminNotification($notification)
    {
        return $this->notificationData->updateAdminNotification($notification);
    }

    public function updateProfessorNotification($notification)
    {
        return $this->notificationData->updateProfessorNotification($notification);
    }

    public function updateStudentNotification($notification)
    {
        return $this->notificationData->updateStudentNotification($notification);
    }

    public function deteleAdminNotification($id)
    {
        return $this->notificationData->deteleAdminNotification($id);
    }

    public function deteleProfessorNotification($id)
    {
        return $this->notificationData->deteleProfessorNotification($id);
    }

    public function deteleStudentNotification($id)
    {
        return $this->notificationData->deteleStudentNotification($id);
    }
}
