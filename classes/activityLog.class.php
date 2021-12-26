<?php
include_once 'databaseConnection.class.php';


class ActivityLog extends DatabaseConnection
{

    public function getAllActivityLog()
    {
        $sql = "SELECT * FROM `activity_log` ORDER BY `DateTime_Happen` DESC";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    public function addNewLog($action, $activity)
    {
        session_start();
        $currentDateTime = new DateTime();
        $theAdmin = $_SESSION['userAdmin'];
        $currentDateTime->setTimezone(new DateTimeZone('Asia/Manila'));

        // echo $theAdmin;
        // echo '<br>' . date_format($currentDateTime, "Y-m-d H:i:s");

        $sql = 'INSERT INTO `activity_log`(`DateTime_Happen`, `Admin`, `Action`, `Activity`) VALUES (?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            date_format($currentDateTime, "Y-m-d H:i:s"),
            $theAdmin, $action, $activity
        ]);
    }

    public function addNewLogInUserSide($action, $activity)
    {
        session_start();
        $currentDateTime = new DateTime();
        $theAdmin = "Patient";
        $currentDateTime->setTimezone(new DateTimeZone('Asia/Manila'));

        // echo $theAdmin;
        // echo '<br>' . date_format($currentDateTime, "Y-m-d H:i:s");

        $sql = 'INSERT INTO `activity_log`(`DateTime_Happen`, `Admin`, `Action`, `Activity`) VALUES (?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            date_format($currentDateTime, "Y-m-d H:i:s"),
            $theAdmin, $action, $activity
        ]);
    }

    public function cleanLog()       
    {
        $sql = "DELETE FROM `activity_log`";
        $stmt = $this->connect()->query($sql);
        $stmt->execute();

        // addNewLog('Clean', 'Log cleaned');
    }
}
// $act = new ActivityLog();
// $act->cleanLog();
// $act->addNewLog('Clean', 'Log cleaned');