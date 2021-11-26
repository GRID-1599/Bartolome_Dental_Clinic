<?php
include 'databaseConnection.class.php';

class Appointment extends DatabaseConnection
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

    public function getAllAppointment()
    {
        $sql = "SELECT * FROM `appointment` ORDER BY `Date_Created` DESC";
        $stmt = $this->connect()->query($sql);
        $allServices = array();
        // while ($row = $stmt->fetch()) {
        //     $patient = array("Patient_ID" =>$row["Patient_ID"], "Name" =>$row["Name"],  "Nickname" =>$row["Nickname"],  "Birthday" =>$row["Birthday"],"Age" =>$row["Age"], "Gender" =>$row["Gender"],"Civil_Status" =>$row["Civil Status"], "Address" =>$row["Address"],"Email" =>$row["Email"], "Contact" =>$row["Contact"],"Date_Created" =>$row["Date_Created"]);
        //     array_push($allUser, $patient);
        // }
        return $stmt;
    }

    public function getAppointmentById( $appoinmentId)
    {
        $sql = "SELECT * FROM `appointment` WHERE `Appointment_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Patient_ID" =>$row["Patient_ID"], 
                "Contact" =>$row["Contact"],  
                "Appoinment_Date" =>$row["Appoinment_Date"],  
                "Appoinment_Time" =>$row["Appoinment_Time"],
                "Date_Created" =>$row["Date_Created"], 
                "Payment_Method" =>$row["Payment_Method"],
                "IsPaid" =>$row["IsPaid"], 
                "Amount" =>$row["Amount"], 

                );
            array_push($appointmentData, $appointment);
        }

        $sql2 = "SELECT * FROM `appointment_service` WHERE `Appoinment_Id` = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$appoinmentId]);
        $appointmentServices = array();
        while ($row = $stmt2->fetch()) {
            $service = array(
                "Service_Id" =>$row["Service_Id"], 
                "Service_Name" =>$row["Service_Name"],  
                "Service_Prc" =>$row["Service_Prc"],  
                );
            array_push($appointmentServices, $service);
        }

        array_push($appointmentData, $appointmentServices);
        return $appointmentData;
    }
}
