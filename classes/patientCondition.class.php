<?php
include_once 'databaseConnection.class.php';

class PatientCondition extends DatabaseConnection
{
    public function addNewPatientCondition(
        $Appointment_Id,
        $Patient_ID,
        $Patient_Condition
    ) {
        try {

            $sql = 'INSERT INTO `appointment_patient_condition`(`Appointmet_ID`, `Patient_ID`, `Patient_Condition`) VALUES (?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $Appointment_Id,
                $Patient_ID,
                $Patient_Condition
            ]);

            return "1";
        } catch (Exception $ex) {
            return $ex;
        }
    }
}
