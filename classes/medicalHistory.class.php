<?php
include_once 'databaseConnection.class.php';

class MedicalHistory extends DatabaseConnection
{
    public function addNewMedicalHistory(
        $Appointment_Id,
        $Last_Medical_Checkup,
        $Medical_Treatment,
        $Medication,
        $Hospitalized,
        $Allergies,
    ) {
        try {

            $sql = 'INSERT INTO `medical_history`(`Appoinment_Id`, `Last_Medical_Checkup`, `Medical_Treatment`, `Medication`, `Hospitalized`, `Allergies`) VALUES (?,?,?,?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $Appointment_Id,
                $Last_Medical_Checkup,
                $Medical_Treatment,
                $Medication,
                $Hospitalized,
                $Allergies,
            ]);

            return "1";
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getMedicalHistoryByAppId($appoinmentId)
    {
        $sql = "SELECT * FROM `medical_history` WHERE `Appoinment_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        while ($row = $stmt->fetch()) {
            $theArray = array(
                "Last_Medical_Checkup" => $row["Last_Medical_Checkup"],
                "Medical_Treatment" => $row["Medical_Treatment"],
                "Medication" => $row["Medication"],
                "Hospitalized" => $row["Hospitalized"],
                "Allergies" => $row["Allergies"],
            );
            return $theArray;
        }
    }
}
