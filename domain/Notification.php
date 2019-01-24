<?php

class Notification
{

    private $notificationId;
    private $notificationText;
    private $notificationDate;
    private $notificationSender;

    public function Notification($notificationId, $notificationText, $notificationDate)
    {
        $this->notificationId = $notificationId;
        $this->notificationText = $notificationText;
        $this->notificationDate = $notificationDate;
    }

    public function getNotificationId()
    {
        return $this->notificationId;
    }

    public function getNotificationText()
    {
        return $this->notificationText;
    }

    public function getNotificationDate()
    {
        return $this->notificationDate;
    }

    public function setNotificationId($notificationId)
    {
        $this->notificationId = $notificationId;
        return $this;
    }

    public function setNotificationText($notificationText)
    {
        $this->notificationText = $notificationText;
        return $this;
    }

    public function setNotificationDate($notificationDate)
    {
        $this->notificationDate = $notificationDate;
        return $this;
    }

    public function getNotificationSender()
    {
        return $this->notificationSender;
    }

    public function setNotificationSender($notificationSender)
    {
        $this->notificationSender = $notificationSender;
        return $this;
    }
}
