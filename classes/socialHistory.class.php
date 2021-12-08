<?php
include_once 'databaseConnection.class.php';

class SocialHistory extends DatabaseConnection
{
    public function addNewSocialHistory(
        $Appointment_Id,
        $IsSmoking,
        $IsDrinkingAlcohol
    ) {
        try {

            $sql = 'INSERT INTO `social_history`(`Appoinment_Id`, `IsSmoking`, `IsDrinkingAlcohol`) VALUES (?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $Appointment_Id,
                $IsSmoking,
                $IsDrinkingAlcohol
            ]);

            return "1";
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getSocialHistoryByAppId($appoinmentId)
    {
        $sql = "SELECT * FROM `social_history` WHERE `Appoinment_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        while ($row = $stmt->fetch()) {
            $theArray = array(
                "IsSmoking" => $row["IsSmoking"],
                "IsDrinkingAlcohol" => $row["IsDrinkingAlcohol"]
            );
            return $theArray;
        }
    }
}
