<?php

require_once '../data/Connector.php';
include '../domain/Notification.php';

class NotificationData extends Connector
{
    public function getAllNotificationsByStudent($id)
    {
        $query = 'call getNotificationByStudent(' . $id . ');';

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

    public function getNotificationAdmin($id)
    {
        $query = 'call getNotificationAdmin(' . $id . ');';

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

    public function getAllNotificationIncomingAdmin($id)
    {
        $query = 'call getAllNotificationIncomingAdmin(' . $id . ');';

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

    public function getNotificationProfessor($id)
    {
        $query = 'call getNotificationProfessor(' . $id . ');';

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

    public function getNotificationStudent($id)
    {
        $query = 'call getNotificationStudent(' . $id . ');';

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

    public function getAllAdminsNotifications()
    {
        $query = 'call getAllAdminsNotifications();';
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

    public function getAllProfessorsNotifications()
    {
        $query = 'call getAllProfessorsNotifications();';
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

    public function getAllStudentsNotifications()
    {
        $query = 'call getAllStudentsNotifications();';
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
        $query = "call insertAdminNotification('" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertProfessorNotification($notification)
    {
        $query = "call insertProfessorNotification('" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertStudentNotification($notification)
    {
        $query = "call insertStudentNotification('" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function updateAdminNotification($notification)
    {
        $query = "call updateAdminNotification(" . $notification->getNotificationId() . ","
        . "'" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function updateProfessorNotification($notification)
    {
        $query = "call updateProfessorNotification(" . $notification->getNotificationId() . ","
        . "'" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function updateStudentNotification($notification)
    {
        $query = "call updateStudentNotification(" . $notification->getNotificationId() . ","
        . "'" . $notification->getNotificationText() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deteleAdminNotification($id)
    {
        $query = 'call deteleAdminNotification(' . $id . ');';
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

    public function deteleProfessorNotification($id)
    {
        $query = 'call deteleProfessorNotification(' . $id . ');';
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

    public function deteleStudentNotification($id)
    {
        $query = 'call deteleStudentNotification(' . $id . ');';
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
}
