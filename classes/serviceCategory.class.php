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
            $serviceCategory = array("ServiceCategory_Id" => $row["ServiceCategory_Id"], "Name" => $row["Name"],  "Description" => $row["Description"],  "ImgFileName" => $row["ImgFileName"]);
            array_push($allServiceCategory, $serviceCategory);
        }
        return $allServiceCategory;
    }

    public function getServicesCategory_ID($serviceCategory_Name)
    {
        $sql = "SELECT `ServiceCategory_Id`  FROM `service_category` WHERE `Name` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$serviceCategory_Name]);
        while ($row = $stmt->fetch()) {
            return  $row["ServiceCategory_Id"];
        }
        return false;
    }

    public function getServicesCategory_ById($serviceCategory_Id)
    {
        $sql = "SELECT `Name`, `Description`, `ImgFileName` FROM `service_category` WHERE `ServiceCategory_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$serviceCategory_Id]);
        while ($row = $stmt->fetch()) {
            return array("Name" => $row["Name"],  "Description" => $row["Description"],  "ImgFileName" => $row["ImgFileName"]);
        }
    }

    public function getServicesCategory_Name()
    {
        $sql = "SELECT `ServiceCategory_Id`, `Name` FROM `service_category`";
        $stmt = $this->connect()->query($sql);
        $allServiceCategory = array();
        while ($row = $stmt->fetch()) {
            $serviceCategory = array($row["ServiceCategory_Id"] => $row["Name"]);
            $allServiceCategory += $serviceCategory;
        }
        return $allServiceCategory;
    }

    public function editServiceCAtegory($serviceCat_id, $serviceCat_data)
    {
        $set = "";
        foreach ($serviceCat_data as $key => $val) {
            $set .= "`" . $key . "` = '" . $val . "', ";
        }

        $set = substr($set, 0, -2);

        $sql1 = "UPDATE `service_category` SET  " . $set . " WHERE  `ServiceCategory_Id` = '" . $serviceCat_id . "'";
        // echo  $sql1;

        $stmt = $this->connect()->query($sql1);
        $stmt->execute();
    }

    public function changeServiceCategoryImage($serviceCat_id, $filename)
    {
        $sql = "UPDATE `service_category` SET `ImgFilename`='" . $filename . "' WHERE `service_category`.`ServiceCategory_Id` = '" . $serviceCat_id . "'";
        echo $sql;
        $stmt = $this->connect()->query($sql);
        $stmt->execute();
    }

    public function getLastServiceCategoryID()
    {
        $sql = "SELECT `ServiceCategory_Id` FROM `service_category` ORDER BY `ServiceCategory_Id` DESC LIMIT 1";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            return $row["ServiceCategory_Id"];
        };
    }


    public function addNewServiceCategory(
        $Id,
        $Name,
        $Description,
        $Image
    ) {

        $sql = 'INSERT INTO `service_category`(`ServiceCategory_Id`, `Name`, `Description`, `ImgFileName`) VALUES (?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(
            [
                $Id,
                $Name,
                $Description,
                ''
            ]
        );

        echo $Id . " " . $Name . "New Service Successfully Added";
    }
}
