<?php

include_once '../data/NotificationData.php';

class NotificationBusiness
{

    private $notificationData;

    public function NotificationBusiness()
    {
        return $this->notificationData = new NotificationData();
    }

    /**
     * ADMIN
     */

    public function insertAdminNotification($notification)
    {
        return $this->notificationData->insertAdminNotification($notification);
    }

    public function deteleAdminNotification($id)
    {
        return $this->notificationData->deteleAdminNotification($id);
    }

    public function getAllAdminsNotifications($id)
    {
        return $this->notificationData->getAllAdminsNotifications($id);
    }

    public function getAllAdminsIncomingNotifications($id)
    {
        return $this->notificationData->getAllAdminsIncomingNotifications($id);
    }

    /**
     * PROFESSOR
     */

    public function insertProfessorNotification($notification)
    {
        return $this->notificationData->insertProfessorNotification($notification);
    }

    public function deteleProfessorNotification($id)
    {
        return $this->notificationData->deteleProfessorNotification($id);
    }

    public function getAllProfessorsNotifications($id)
    {
        return $this->notificationData->getAllProfessorsNotifications($id);
    }

    public function getAllProfessorsIncomingNotifications($id)
    {
        return $this->notificationData->getAllProfessorsIncomingNotifications($id);
    }

    /**
     * STUDENT
     */

    public function insertStudentNotification($notification)
    {
        return $this->notificationData->insertStudentNotification($notification);
    }

    public function deteleStudentNotification($id)
    {
        return $this->notificationData->deteleStudentNotification($id);
    }

    public function getAllStudentsNotifications($id)
    {
        return $this->notificationData->getAllStudentsNotifications($id);
    }

    public function getAllStudentsIncomingNotifications($id)
    {
        return $this->notificationData->getAllStudentsIncomingNotifications($id);
    }
}
