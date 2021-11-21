<?php
// admin table
// table name:  'admin'
// `Username`, `Password`, `First_Name`, `Last_Name`, `Contact`, `Email`



include 'databaseConnection.class.php';

class Admin extends DatabaseConnection
{

    public function getAllAdmin()
    {
        $sql = "SELECT `Username`,`First_Name`, `Last_Name`, `Contact`, `Email` FROM `admin` ";
        $stmt = $this->connect()->query($sql);
        $allAdmin = array();
        while ($row = $stmt->fetch()) {
            $admin = array("Username" =>$row["Username"], "First_Name" =>$row["First_Name"],  "Last_Name" =>$row["Last_Name"],"Contact" =>$row["Contact"], "Email"=>$row["Email"]);
            array_push($allAdmin, $admin);
        }
        return $allAdmin;
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
