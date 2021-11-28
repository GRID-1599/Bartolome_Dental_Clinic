<?php

include_once 'databaseConnection.class.php';

class Service extends DatabaseConnection
{

    public function getAllServices()
    {
        $sql = "SELECT * FROM `service`";
        $stmt = $this->connect()->query($sql);
        $allServices = array();
        // while ($row = $stmt->fetch()) {
        //     $patient = array("Patient_ID" =>$row["Patient_ID"], "Name" =>$row["Name"],  "Nickname" =>$row["Nickname"],  "Birthday" =>$row["Birthday"],"Age" =>$row["Age"], "Gender" =>$row["Gender"],"Civil_Status" =>$row["Civil Status"], "Address" =>$row["Address"],"Email" =>$row["Email"], "Contact" =>$row["Contact"],"Date_Created" =>$row["Date_Created"]);
        //     array_push($allUser, $patient);
        // }
        return $stmt;
    }
    // copy only 
    public function addNewPatient($Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created)
    {

        $sql = 'INSERT INTO `patient`( `Name`, `Nickname`, `Birthday`, `Age`, `Gender`, `Civil Status`, `Address`, `Email`, `Contact`, `Date_Created`) VALUES (?,?,?,?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        // print [$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created];

        // echo implode(" ",[$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created]);
        $stmt->execute([$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created]);
    }

    public function getServiceByID($serviceID)
    {
        $sql = "SELECT * FROM `service` WHERE `Service_ID` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$serviceID]);
        while ($row = $stmt->fetch()) {
            $service = array(
                "ServiceCategory_ID" => $row["ServiceCategory_ID"],
                "Name" => $row["Name"],
                "Description" => $row["Description"],
                "Duration" => $row["Duration_Minutes"],
                "Starting_Price" => $row["Starting_Price"],
                "ImgFilename" => $row["ImgFilename"],
                "Availability" => $row["Availability"]

            );
            return $service;
        };
        return 0;
    }

    public function getAllServices_ByCategoryID($serCategory_ID)
    {

        $sql = "SELECT `Service_ID` FROM `service` WHERE `ServiceCategory_ID`= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$serCategory_ID]);
        return $stmt;
    }

    public function getAllServicesData_ByCategoryID($serCategory_ID)
    {
        $sql = "SELECT * FROM `service` WHERE `ServiceCategory_ID`= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$serCategory_ID]);
        return $stmt;
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

    public function editService($service_id, $service_data)
    {
        $set = "";
        foreach ($service_data as $key => $val) {
            $set .= "`" . $key . "` = '" . $val . "', ";
        }

        $set = substr($set, 0, -2);

        $sql1 = "UPDATE `service` SET  " . $set . " WHERE `service`.`Service_ID` = '" . $service_id . "'";
        $sql = "UPDATE `service` SET `Availability` = '0' WHERE `service`.`Service_ID` = 'S101'";
        echo $sql1 . "<br>";
        echo $sql;
        $stmt = $this->connect()->query($sql1);
        $stmt->execute();
    }

    public function changeServiceImage($service_id, $filename)
    {
        $sql = "UPDATE `service` SET `ImgFilename`='".$filename."' WHERE `service`.`Service_ID` = '" . $service_id . "'";
        echo $sql; 
        $stmt = $this->connect()->query($sql);
        $stmt->execute();
    }
}
