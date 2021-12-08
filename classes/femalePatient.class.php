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

    public function getFemalePatientByAppId($appoinmentId)
    {
        $sql = "SELECT * FROM `female_patient` WHERE `Appoinment_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        while ($row = $stmt->fetch()) {
            $theArray = array(
                "Patient_ID" => $row["Patient_ID"],
                "IsPregnant" => $row["IsPregnant"],
                "Months_Pregnant" => $row["Months_Pregnant"],
                "IsTakingBirthPills" => $row["IsTakingBirthPills"],
                "Date_Answered" => $row["Date_Answered"],
            );
            return $theArray;
        }
    }
}
