<?php
// msg message
// table name:  'message'
// `Message_ID`, `Body`, `From_Name`, `Phone`, `Email`, `Date_Send`, `IsRead`



include 'databaseConnection.class.php';

class Message extends DatabaseConnection
{

    public function getAllMessage()
    {
        $sql = "SELECT `Message_ID`, `Body`, `From_Name`, `Phone`, `Email`, `Date_Send`, `IsRead` FROM `message`";
        $stmt = $this->connect()->query($sql);
        $allMsg = array();
        while ($row = $stmt->fetch()) {
            $msg = array("Message_ID" =>$row["Message_ID"], "Body" =>$row["Body"],  "From_Name" =>$row["From_Name"],"Phone" =>$row["Phone"], "Email"=>$row["Email"], "Date_Send"=>$row["Date_Send"], "IsRead"=>$row["IsRead"]);
            array_push($allMsg, $msg);
        }
        return $allMsg;
    }

    public function addMessage( $body, $from_Name, $phone, $email, $date_Send){

        $sql = 'INSERT INTO `message`(`Body`, `From_Name`, `Phone`, `Email`, `Date_Send`, `IsRead`) VALUES (?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        // print [$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created];

        // echo implode(" ",[$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created]);
        $stmt->execute([$body, $from_Name, $phone, $email, $date_Send, 0]);
        echo "done";
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
