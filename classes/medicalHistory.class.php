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
}
