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
            $admin = array("Username" => $row["Username"], "First_Name" => $row["First_Name"],  "Last_Name" => $row["Last_Name"], "Contact" => $row["Contact"], "Email" => $row["Email"]);
            array_push($allAdmin, $admin);
        }
        return $allAdmin;
    }

    public function registerNewAdmin($admin_firstname, $admin_lastname, $admin_email, $admin_contact, $admin_username, $admin_password)
    {
        try {
            $hash_password =  password_hash($admin_password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO `admin`(`Username`, `Password`, `First_Name`, `Last_Name`, `Contact`, `Email`) VALUES  (?,?,?,?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$admin_username, $hash_password, $admin_firstname, $admin_lastname, $admin_contact, $admin_email]);
            echo "New Admin Added";
        } catch (Exception $ex) {
            echo "Invalid Username";
        }
    }

    public function getAdminByUsername($username)
    {

        $sql = "SELECT * FROM `admin` WHERE `Username` = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        while ($row = $stmt->fetch()) {
            $admin = array("Username" => $row["Username"], "First_Name" => $row["First_Name"],  "Last_Name" => $row["Last_Name"], "Contact" => $row["Contact"], "Email" => $row["Email"]);
            return  $admin;
        }
        return 'Not found';
    }

    public function editAdminNewInfo($admin_firstname, $admin_lastname, $admin_email, $admin_contact, $admin_username)
    {
        $sql = "UPDATE `admin` SET `First_Name`='".$admin_firstname."',`Last_Name`='".$admin_lastname."',`Contact`='".$admin_contact."',`Email`='".$admin_email."' WHERE `admin`.`Username` = '" . $admin_username . "'";
        $stmt = $this->connect()->query($sql);
        $stmt->execute();
        echo "Changes saved";
    }

    public function checkPassword($username, $password)
    {
        $admin_password = "";
        $sql = "SELECT * FROM `admin` WHERE `Username` = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        while ($row = $stmt->fetch()) {
            $admin_password =  $row["Password"];
        }
        echo password_verify($password, $admin_password) ;
    }

    public function savePassword($admin_username, $password)
    {
        $admin_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE `admin` SET `Password`='".$admin_password."' WHERE `admin`.`Username` = '" . $admin_username . "'";
        $stmt = $this->connect()->query($sql);
        $stmt->execute();
        echo "Password changes saved";
    }
}
