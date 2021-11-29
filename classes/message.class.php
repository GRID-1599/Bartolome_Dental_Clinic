<?php
// msg message
// table name:  'message'
// `Message_ID`, `Body`, `From_Name`, `Phone`, `Email`, `Date_Send`, `IsRead`



include_once 'databaseConnection.class.php';

class Message extends DatabaseConnection
{

    public function getAllMessage()
    {
        $sql = "SELECT `Message_ID`, `Body`, `From_Name`, `Phone`, `Email`, `Date_Send`, `IsRead` FROM `message` ORDER BY `message`.`Date_Send` DESC";
        $stmt = $this->connect()->query($sql);
        $allMsg = array();
        while ($row = $stmt->fetch()) {
            $msg = array("Message_ID" => $row["Message_ID"], "Body" => $row["Body"],  "From_Name" => $row["From_Name"], "Phone" => $row["Phone"], "Email" => $row["Email"], "Date_Send" => $row["Date_Send"], "IsRead" => $row["IsRead"]);
            array_push($allMsg, $msg);
        }
        return $allMsg;
    }

    public function addMessage($body, $from_Name, $phone, $email, $date_Send)
    {

        $sql = 'INSERT INTO `message`(`Body`, `From_Name`, `Phone`, `Email`, `Date_Send`, `IsRead`) VALUES (?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        // print [$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created];

        // echo implode(" ",[$Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created]);
        $stmt->execute([$body, $from_Name, $phone, $email, $date_Send, 0]);
        echo "done";
    }


    public function getMessageById($message_id)
    {
        $sql = "SELECT * FROM `message` WHERE `Message_ID` = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$message_id]);
        while ($row = $stmt->fetch()) {
            $msg = array("Message_ID" => $row["Message_ID"], "Body" => $row["Body"],  "From_Name" => $row["From_Name"], "Phone" => $row["Phone"], "Email" => $row["Email"], "Date_Send" => $row["Date_Send"], "IsRead" => $row["IsRead"]);
            return $msg;
        }
        return 'Not found';
    }

    public function setMessageRead($message_id, $isRead)
    {
        $sql = "UPDATE `message` SET `IsRead`='" . $isRead . "' WHERE `message`.`Message_ID` = '" . $message_id . "'";
        $stmt = $this->connect()->query($sql);
        $stmt->execute();
    }

    public function getUnreadMessage()
    {
        $sql = "SELECT * FROM `message` WHERE `IsRead` = 0 ORDER BY `Message_ID` DESC";
        $stmt = $this->connect()->query($sql);
        $allMsg = array();
        while ($row = $stmt->fetch()) {
            $msg = array("Message_ID" => $row["Message_ID"], "Body" => $row["Body"],  "From_Name" => $row["From_Name"], "Phone" => $row["Phone"], "Email" => $row["Email"], "Date_Send" => $row["Date_Send"], "IsRead" => $row["IsRead"]);
            array_push($allMsg, $msg);
        }
        return $allMsg;
    }
}
