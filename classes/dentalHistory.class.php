<?php
include_once 'databaseConnection.class.php';

class DentalHistory extends DatabaseConnection
{
    public function addNewDentalHistory(
        $Appointment_Id,
        $Last_Dental_Visit,
        $Purpose
    ) {
        // try {

            $sql = 'INSERT INTO `dental_history`(`Appoinment_Id`, `Last_Dental_Visit`, `Purpose`) VALUES (?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $Appointment_Id,
                $Last_Dental_Visit,
                $Purpose
            ]);

    //         echo "1";
    //     } catch (Exception $ex) {
    //         echo "0";
    //     }
    }
}
