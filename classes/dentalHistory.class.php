<?php
include_once 'databaseConnection.class.php';

class DentalHistory extends DatabaseConnection
{
    public function addNewDentalHistory(
        $Appointment_Id,
        $Last_Dental_Visit,
        $Purpose
    ) {
        try {

            $sql = 'INSERT INTO `dental_history`(`Appoinment_Id`, `Last_Dental_Visit`, `Purpose`) VALUES (?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $Appointment_Id,
                $Last_Dental_Visit,
                $Purpose
            ]);

            return "1";
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getDentalHistoryByAppId($appoinmentId)
    {
        $sql = "SELECT * FROM `dental_history` WHERE `Appoinment_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        while ($row = $stmt->fetch()) {
            $theArray = array(
                "Last_Dental_Visit" => $row["Last_Dental_Visit"],
                "Purpose" => $row["Purpose"]
            );
            return $theArray;
        }
    }
}
