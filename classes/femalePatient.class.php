<?php
include_once 'databaseConnection.class.php';

class FemalePatient extends DatabaseConnection
{
    public function addNewFemalePatient(
        $Appointment_Id,
        $Patient_ID,
        $IsPregnant,
        $Months_Pregnant,
        $IsTakingBirthPills,
        $Date_Answered,
    ) {
        try {

            $sql = 'INSERT INTO `female_patient`(`Appoinment_Id`, `Patient_ID`, `IsPregnant`, `Months_Pregnant`, `IsTakingBirthPills`, `Date_Answered`) VALUES (?,?,?,?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $Appointment_Id,
                $Patient_ID,
                $IsPregnant,
                $Months_Pregnant,
                $IsTakingBirthPills,
                $Date_Answered,
            ]);

            return "1";
        } catch (Exception $ex) {
            return $ex;
        }
    }
}
