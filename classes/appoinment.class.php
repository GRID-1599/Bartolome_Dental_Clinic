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
}
