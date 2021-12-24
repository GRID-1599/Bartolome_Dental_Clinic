<?php

include_once 'databaseConnection.class.php';

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


    public function getPatientNote($patient_Id)
    {
        $sql = "SELECT * FROM `note` WHERE `Patient_ID`= ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$patient_Id]);
        $thisPatientNote = array();
        while ($row = $stmt->fetch()) {
            $note = array("Note_Id" =>$row["Note_Id"], "Note" =>$row["Note"]);;
            array_push($thisPatientNote, $note);
        }
        return $thisPatientNote;
    }

    public function deleteNote($note_id)
    {
        $sql = "DELETE FROM `note` WHERE `Note_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$note_id]);

        echo "note deleted";
    }

    public function editNote($note_id, $note_message)
    {
        $sql = "UPDATE `note` SET `Note`='".$note_message."' WHERE `Note_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$note_id]);

        echo "note edited";

    }

    public function addNote($patient_id, $note_message)
    {
        $sql = "INSERT INTO `note`(`Patient_ID`, `Note`) VALUES (?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$patient_id,$note_message]);

        echo "note added";

    }

    public function editPatientDetails($Id, $Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact)
    {
        $sql = "UPDATE `patient` SET `Name`='".$Name."',`Nickname`='".$Nickname."',`Birthday`='".$Birthday."',`Age`='".$Age."',`Gender`='".$Gender."',`Civil Status`='".$Civil_Status."',`Address`='".$Address."',`Email`='".$Email."',`Contact`='".$Contact."' WHERE `Patient_ID` = '".$Id."' ";

        $stmt = $this->connect()->query($sql);
        $stmt->execute();

        echo "patient details edited";

    }

    public function getPatientByDetails($patientName, $patientGender, $patientBday)
    {
        // $sql = "SELECT `Patient_ID` FROM `patient` WHERE`Name` LIKE '".$name."' AND `Birthday` = '".$bday."'";
        $sql = "SELECT `Patient_ID`, `Name`, `Nickname`, `Birthday`, `Age`, `Gender`, `Civil Status`, `Address`, `Email`, `Contact`, `Date_Created` FROM `patient` WHERE `Name` LIKE '%".$patientName."%' AND `Birthday` = '".$patientBday."' AND `Gender` LIKE '".$patientGender."'";
        $stmt = $this->connect()->query($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $patient = array("Patient_ID" =>$row["Patient_ID"], "Name" =>$row["Name"],  "Nickname" =>$row["Nickname"],  "Birthday" =>$row["Birthday"],"Age" =>$row["Age"], "Gender" =>$row["Gender"],"Civil_Status" =>$row["Civil Status"], "Address" =>$row["Address"],"Email" =>$row["Email"], "Contact" =>$row["Contact"],"Date_Created" =>$row["Date_Created"]);;
            return $patient;
        }
    }

    
}
