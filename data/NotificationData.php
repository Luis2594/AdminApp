<?php

include_once __DIR__.'/../data/Connector.php';
include_once __DIR__.'/../domain/Notification.php';

class NotificationData extends Connector
{
    /**
     * ADMIN NOTIFICATIONS
     */
    public function getAllAdminsNotifications($id)
    {
        $query = 'call getAdminNotificationByPerson(' . $id . ');';

        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $currentNotification = new Notification($row['notificationid'], $row['notificationtext'], $row['notificationdate']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertAdminNotification($notification)
    {
        $query = "call insertAdminNotification('" . $notification->getNotificationText() . "'," . $notification->getNotificationId() . ",'" . date("Y/m/d") . "')";

        try {
            $result = $this->exeQuery($query);
            return trim($result);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deleteAdminNotification($id)
    {
        $query = 'call deleteAdminNotification(' . $id . ');';

        try {
            if ($this->exeQuery($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllAdminsIncomingNotifications($id)
    {
        $query = 'call getAllAdminsIncomingNotifications(' . $id . ');';

        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            include_once __DIR__.'/../business/PersonBusiness.php';
            $personBusiness = new PersonBusiness();

            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $person = $personBusiness->getPersonId($row['notificationsender'])[0];
                    $currentNotification = new Notification($person->getPersonFirstName() . " " . $person->getPersonFirstlastname(), $row['notificationtext'], $row['notificationdate']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    /**
     * PROFESSOR NOTIFICATIONS
     */
    public function getAllProfessorsNotifications($id)
    {
        $query = 'call getProfessorNotificationByPerson(' . $id . ');';

        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $currentNotification = new Notification($row['notificationid'], $row['notificationtext'], $row['notificationdate']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertProfessorNotification($notification)
    {
        $query = "call insertProfessorNotification('" . $notification->getNotificationText() . "'," . $notification->getNotificationId() . ",'" . date("Y/m/d") . "')";

        try {
            $result = $this->exeQuery($query);
            return trim($result);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deleteProfessorNotification($id)
    {
        $query = 'call deleteProfessorNotification(' . $id . ');';

        try {
            if ($this->exeQuery($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllProfessorsIncomingNotifications($id)
    {
        $query = 'call getAllProfessorsIncomingNotifications(' . $id . ');';

        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            include_once __DIR__.'/../business/PersonBusiness.php';
            $personBusiness = new PersonBusiness();

            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $person = $personBusiness->getPersonId($row['notificationsender'])[0];
                    $currentNotification = new Notification($person->getPersonFirstName() . " " . $person->getPersonFirstlastname(), $row['notificationtext'], $row['notificationdate']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    /**
     * STUDENT NOTIFICATIONS
     */
    public function getAllStudentsNotifications($id)
    {
        $query = 'call getStudentNotificationByPerson(' . $id . ');';

        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $currentNotification = new Notification($row['notificationid'], $row['notificationtext'], $row['notificationdate']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertStudentNotification($notification)
    {
        $query = "call insertStudentNotification('" . $notification->getNotificationText() . "'," . $notification->getNotificationId() . ",'" . date("Y/m/d") . "')";

        try {
            $result = $this->exeQuery($query);
            return trim($result);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deleteStudentNotification($id)
    {
        $query = 'call deleteStudentNotification(' . $id . ');';

        try {
            if ($this->exeQuery($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllStudentsIncomingNotifications($id)
    {
        $query = 'call getAllStudentsIncomingNotifications(' . $id . ');';

        try {
            $allNotifications = $this->exeQuery($query);
            $array = [];
            include_once __DIR__.'/../business/PersonBusiness.php';
            $personBusiness = new PersonBusiness();

            if (mysqli_num_rows($allNotifications) > 0) {
                while ($row = mysqli_fetch_array($allNotifications)) {
                    $person = $personBusiness->getPersonId($row['notificationsender'])[0];
                    $currentNotification = new Notification($person->getPersonFirstName() . " " . $person->getPersonFirstlastname(), $row['notificationtext'], $row['notificationdate']);
                    array_push($array, $currentNotification);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
