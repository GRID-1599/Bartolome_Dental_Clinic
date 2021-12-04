<?php
include 'databaseConnection.class.php';

class ClinicDate extends DatabaseConnection
{
    public function addNewAppointment(
        $Appoinment_Id,
        $Patient_ID,
        $Contact,
        $Appoinment_Date,
        $Appoinment_Time,
        $Date_Created,
        $Payment_Method,
        $IsPaid,
        $Amount,
        $appointmentServices
    ) {

        $sql = 'INSERT INTO `appointment`(`Appointment_Id`, `Patient_ID`, `Contact`, `Appoinment_Date`, `Appoinment_Time`, `Date_Created`, `Payment_Method`, `IsPaid`, `Amount`) VALUES (?,?,?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            $Appoinment_Id,
            $Patient_ID,
            $Contact,
            $Appoinment_Date,
            $Appoinment_Time,
            $Date_Created,
            $Payment_Method,
            $IsPaid,
            $Amount
        ]);


        $sql2 = 'INSERT INTO `appointment_service`(`Appoinment_Id`, `Service_Id`, `Service_Name`, `Service_Prc`) VALUES (?,?,?,?)';
        $stmt2 = $this->connect()->prepare($sql2);
        foreach ($appointmentServices as $service) {
            $service = array_values($service);
            $stmt2->execute([
                $Appoinment_Id,
                $service[0],
                $service[1],
                $service[2]
            ]);
        }
    }

    public function getAllDate($Month, $Year)
    {
        $dateStart = $Year . "-" . $Month . "-1";
        $dateEnd = $Year . "-" . $Month . "-31";
        $sql = "SELECT * FROM `appointment` WHERE `Appoinment_Date` >= '".$dateStart."' AND Appoinment_Date <= '".$dateEnd."' ORDER BY `Appointment_StartTime` DESC";
        $stmt = $this->connect()->query($sql);
        $allDates = array();
        
        while ($row = $stmt->fetch()) {
            $appTime = date_create($row["Appointment_StartTime"]);
            $appointmentDate = array(
                "Type" => "Appointment",
                "Appointment_Id" => $row["Appointment_Id"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appoinment_Time" => date_format($appTime, " h:i a") ,
            );
            array_push($allDates, $appointmentDate);
        }
        return $allDates;
    }

    public function getAppointmentById($appoinmentId)
    {
        $sql = "SELECT * FROM `appointment` WHERE `Appointment_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appoinment_Time" => $row["Appoinment_Time"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "Amount" => $row["Amount"],

            );
            array_push($appointmentData, $appointment);
        }

        $sql2 = "SELECT * FROM `appointment_service` WHERE `Appoinment_Id` = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$appoinmentId]);
        $appointmentServices = array();
        while ($row = $stmt2->fetch()) {
            $service = array(
                "Service_Id" => $row["Service_Id"],
                "Service_Name" => $row["Service_Name"],
                "Service_Prc" => $row["Service_Prc"],
            );
            array_push($appointmentServices, $service);
        }

        array_push($appointmentData, $appointmentServices);
        return $appointmentData;
    }
}

// $dates = new ClinicDate();

// foreach($dates->getAllDate(02,2022) as $val){
//     echo json_encode($val) . "<br>";
// }
