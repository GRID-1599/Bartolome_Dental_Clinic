<?php

include 'databaseConnection.class.php';

class Patient extends DatabaseConnection
{

    public function getAllPatients()
    {
        $sql = "SELECT * FROM patient ";
        $stmt = $this->connect()->query($sql);
        $allUser = array();
        while ($row = $stmt->fetch()) {
            $patient = array("Patient_ID" =>$row["Patient_ID"], "Name" =>$row["Name"],  "Nickname" =>$row["Nickname"],  "Birthday" =>$row["Birthday"],"Age" =>$row["Age"], "Gender" =>$row["Gender"],"Civil_Status" =>$row["Civil Status"], "Address" =>$row["Address"],"Email" =>$row["Email"], "Contact" =>$row["Contact"],"Date_Created" =>$row["Date_Created"]);
            array_push($allUser, $patient);
        }
        return $allUser;
    }

    public function addNewPatient( $Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created){

        $sql = 'INSERT INTO `patient`( `Name`, `Nickname`, `Birthday`, `Age`, `Gender`, `Civil Status`, `Address`, `Email`, `Contact`, `Date_Created`) VALUES (?,?,?,?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        // print [$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created];

        // echo implode(" ",[$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created]);
        $stmt->execute([$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created]);
        

    }

    public function getPatientIdByName($name, $bday)
    {
        // $sql = "SELECT `Patient_ID` FROM `patient` WHERE`Name` LIKE '".$name."' AND `Birthday` = '".$bday."'";
        $sql = "SELECT `Patient_ID` FROM `patient` WHERE Name = ? AND Birthday = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $bday]);
        while ($row = $stmt->fetch()) {
            $Patient_ID = $row["Patient_ID"];
            return $Patient_ID;
        }
        return 'Not found';
    }

    public function getPatientById($patientID)
    {
        // $sql = "SELECT `Patient_ID` FROM `patient` WHERE`Name` LIKE '".$name."' AND `Birthday` = '".$bday."'";
        $sql = "SELECT `Patient_ID`, `Name`, `Nickname`, `Birthday`, `Age`, `Gender`, `Civil Status`, `Address`, `Email`, `Contact`, `Date_Created` FROM `patient` WHERE `Patient_ID` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$patientID]);
        while ($row = $stmt->fetch()) {
            $patient = array("Patient_ID" =>$row["Patient_ID"], "Name" =>$row["Name"],  "Nickname" =>$row["Nickname"],  "Birthday" =>$row["Birthday"],"Age" =>$row["Age"], "Gender" =>$row["Gender"],"Civil_Status" =>$row["Civil Status"], "Address" =>$row["Address"],"Email" =>$row["Email"], "Contact" =>$row["Contact"],"Date_Created" =>$row["Date_Created"]);;
            return $patient;
        }
    }


    // public function getUserStmt()
    // {
    //     $sql = "SELECT * FROM service_category ";
    //     $stmt = $this->connect()->query($sql);

    //     while ($row = $stmt->fetch()) {
    //         $serviceName = $row["Name"];
    //         echo $serviceName . "<br>";
    //     }
    // }
}
