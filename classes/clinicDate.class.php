<?php
include_once 'databaseConnection.class.php';

class ClinicDate extends DatabaseConnection
{


    public function getAllDate($Month, $Year)
    {
        $dateStart = $Year . "-" . $Month . "-1";
        $dateEnd = $Year . "-" . $Month . "-31";
        $sql = "SELECT * FROM `appointment` WHERE `Appoinment_Date` >= '" . $dateStart . "' AND Appoinment_Date <= '" . $dateEnd . "' ORDER BY `Appointment_StartTime` ASC";
        $stmt = $this->connect()->query($sql);
        $allDates = array();

        while ($row = $stmt->fetch()) {
            $appTime = date_create($row["Appointment_StartTime"]);
            $appointmentDate = array(
                "Type" => "Appointment",
                "Appointment_Id" => $row["Appointment_Id"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appoinment_Time" => date_format($appTime, " h:i a"),
            );
            array_push($allDates, $appointmentDate);
        }
        return $allDates;
    }

    public function getAllNoClinicDate()
    {
        $sql = "SELECT * FROM `no_clinic_date` ORDER BY `no_clinic_date`.`Date` ASC";
        $stmt = $this->connect()->query($sql);
        $allDates = array();

        while ($row = $stmt->fetch()) {
            // echo $row['Date'];
            array_push($allDates, $row['Date']);
        }
        echo json_encode($allDates);
    }
}

// $dates = new ClinicDate();

// foreach($dates->getAllDate(02,2022) as $val){
//     echo json_encode($val) . "<br>";
// }
