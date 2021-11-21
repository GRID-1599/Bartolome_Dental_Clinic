<?php
// SELECT `ServiceCategory_Id`, `Name`, `Description`, `ImgFileName` FROM `service_category`
include_once 'databaseConnection.class.php';

class ServiceCategory extends DatabaseConnection
{

    public function getAllServicesCategory()
    {
        $sql = "SELECT * FROM `service_category`";
        $stmt = $this->connect()->query($sql);
        $allServiceCategory = array();
        while ($row = $stmt->fetch()) {
            $serviceCategory = array("ServiceCategory_Id" =>$row["ServiceCategory_Id"], "Name" =>$row["Name"],  "Description" =>$row["Description"],  "ImgFileName" =>$row["ImgFileName"]);
            array_push($allServiceCategory, $serviceCategory);
        }
        return $allServiceCategory;
    }

    public function getServicesCategory_ID($serviceCategory_Name){
        $sql = "SELECT `ServiceCategory_Id`  FROM `service_category` WHERE `Name` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$serviceCategory_Name]);
        while ($row = $stmt->fetch()) {
            return  $row["ServiceCategory_Id"];
        }
        return false;
    }

    public function getServicesCategory_ById($serviceCategory_Id){
        $sql = "SELECT `Name`, `Description`, `ImgFileName` FROM `service_category` WHERE `ServiceCategory_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$serviceCategory_Id]);
        while ($row = $stmt->fetch()) {
            return array( "Name" =>$row["Name"],  "Description" =>$row["Description"],  "ImgFileName" =>$row["ImgFileName"]);
        }
    }

    public function getServicesCategory_Name(){
        $sql = "SELECT `ServiceCategory_Id`, `Name` FROM `service_category`";
        $stmt = $this->connect()->query($sql);
        $allServiceCategory = array();
        while ($row = $stmt->fetch()) {
            $serviceCategory = array($row["ServiceCategory_Id"] =>$row["Name"]);
            $allServiceCategory+=$serviceCategory ;
        }
        return $allServiceCategory;
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
