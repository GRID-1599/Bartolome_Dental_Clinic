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
        // print [$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created];

        // echo implode(" ",[$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created]);
        // $stmt->execute([
        //     $Appoinment_Id,
        //     $Patient_ID,
        //     $Contact,
        //     $Appoinment_Date,
        //     $Appoinment_Time,
        //     $Date_Created,
        //     $Payment_Method,
        //     $IsPaid,
        //     $Amount
        // ]);

        echo count($appointmentServices) . "<br>";


        $sql2 = 'INSERT INTO `appointment_service`(`Appoinment_Id`, `Service_Id`, `Service_Name`, `Service_Prc`) VALUES (?,?,?,?)';
        $stmt2 = $this->connect()->prepare($sql2);
        for ($x = 0; $x < count($appointmentServices); $x += 3) {
            // $stmt2->execute([$appointmentServices[$x],$appointmentServices[$x+1],$appointmentServices[$x+2]]);
            $id = $appointmentServices[$x];
            $name = $appointmentServices[$x + 1];
            $price = $appointmentServices[$x + 2];

            echo <<<tt
                 $id >>  $name >>  $price <br>
            tt;
        }
    }
}
