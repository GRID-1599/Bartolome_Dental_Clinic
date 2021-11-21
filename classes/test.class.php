<?php
include 'databaseConnection.class.php';

class Test extends DatabaseConnection{

    public function getUser(){
        $sql = "SELECT * FROM service_category ";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){
            $serviceName = $row["Name"];
            echo $serviceName . "<br>";
        }
    }
    public function getUserStmt(){
        $sql = "SELECT * FROM service_category ";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){
            $serviceName = $row["Name"];
            echo $serviceName . "<br>";
        }
    }

}