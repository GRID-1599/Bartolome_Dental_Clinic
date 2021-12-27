<?php
include_once 'databaseConnection.class.php';

class Appointment extends DatabaseConnection
{
    public function addNewAppointment(
        $Appointment_Id,
        $Patient_ID,
        $Contact,
        $Appoinment_Date,
        $Appointment_StartTime,
        $Appointment_EndTime,
        $Duration_Minutes,
        $Allotted_Hours,
        $Date_Created,
        $Payment_Method,
        $IsPaid,
        $Amount,
        $appointmentServices
    ) {
        try {

            $sql = 'INSERT INTO `appointment`(`Appointment_Id`, `Patient_ID`, `Contact`, `Appoinment_Date`, `Appointment_StartTime`, `Appointment_EndTime`, `Duration_Minutes`, `Allotted_Hours`,`Date_Created`, `Payment_Method`, `IsPaid`, `Amount`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $Appointment_Id,
                $Patient_ID,
                $Contact,
                $Appoinment_Date,
                $Appointment_StartTime,
                $Appointment_EndTime,
                $Duration_Minutes,
                $Allotted_Hours,
                $Date_Created,
                $Payment_Method,
                $IsPaid,
                $Amount
            ]);


            $sql2 = 'INSERT INTO `appointment_service`(`Appoinment_Id`, `Service_Id`, `Service_Name`, `Service_Prc`) VALUES (?,?,?,?)';
            $stmt2 = $this->connect()->prepare($sql2);
            foreach ($appointmentServices as $service) {
                $service = array_values($service);
                $stmt2->execute([
                    $Appointment_Id,
                    $service[0],
                    $service[1],
                    $service[2]
                ]);
            }

            return "1";
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getAllAppointment()
    {
        $sql = "SELECT * FROM `appointment` ORDER BY `Date_Created` DESC";
        $stmt = $this->connect()->query($sql);
        $allServices = array();
        // while ($row = $stmt->fetch()) {
        //     $patient = array("Patient_ID" =>$row["Patient_ID"], "Name" =>$row["Name"],  "Nickname" =>$row["Nickname"],  "Birthday" =>$row["Birthday"],"Age" =>$row["Age"], "Gender" =>$row["Gender"],"Civil_Status" =>$row["Civil Status"], "Address" =>$row["Address"],"Email" =>$row["Email"], "Contact" =>$row["Contact"],"Date_Created" =>$row["Date_Created"]);
        //     array_push($allUser, $patient);
        // }
        return $stmt;
    }

    public function getAppointmentById($appoinmentId)
    {

        $sql = "SELECT * FROM `appointment` WHERE `Appointment_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "IsDone" => $row["IsDone"],
                "Amount" => $row["Amount"],
                "IsApproved" => $row["IsApproved"],

            );
            array_push($appointmentData, $appointment);
        }

        $sql2 = "SELECT * FROM `appointment_service` WHERE `Appoinment_Id` = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$appoinmentId]);
        $appointmentServices = array();
        while ($row = $stmt2->fetch()) {
            $service = array(
                "Service_Id" => $row["Service_Id"],
                "Service_Name" => $row["Service_Name"],
                "Service_Prc" => $row["Service_Prc"],
            );
            array_push($appointmentServices, $service);
        }

        array_push($appointmentData, $appointmentServices);
        return $appointmentData;
    }

    public function getServicesByAppID($appID)
    {
        $sql2 = "SELECT * FROM `appointment_service` WHERE `Appoinment_Id` = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$appID]);
        $appointmentServices = array();
        while ($row = $stmt2->fetch()) {
            $service = array(
                "Service_Id" => $row["Service_Id"],
                "Service_Name" => $row["Service_Name"],
                "Service_Prc" => $row["Service_Prc"],
            );
            array_push($appointmentServices, $service);
        }
        return $appointmentServices;
    }

    public function getAppointmentByDate($appoinmentDate)
    {
        $sql = "SELECT * FROM `appointment` WHERE `Appoinment_Date` = ? ORDER BY `appointment`.`Appointment_StartTime` ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentDate]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Appointment_Id" => $row["Appointment_Id"],
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "Amount" => $row["Amount"],
                "IsDone" => $row["IsDone"],

            );
            array_push($appointmentData, $appointment);
        }
        return $appointmentData;
    }

    public function getAppointmentAddedToday($appoinmentDate)
    {
        $sql = "SELECT * FROM `appointment` WHERE `Date_Created` LIKE '%" . $appoinmentDate . "%' ORDER BY `appointment`.`Appointment_StartTime` ASC";
        $stmt = $this->connect()->query($sql);
        // $stmt->execute([$appoinmentDate]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Appointment_Id" => $row["Appointment_Id"],
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "Amount" => $row["Amount"],
                "IsDone" => $row["IsDone"],

            );
            array_push($appointmentData, $appointment);
        }
        return $appointmentData;
    }


    public function getAppointmentToApproved()
    {
        $sql = "SELECT * FROM `appointment` WHERE `IsApproved` = 0 ORDER BY `appointment`.`Appoinment_Date` ASC";
        $stmt = $this->connect()->query($sql);
        // $stmt->execute([$appoinmentDate]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Appointment_Id" => $row["Appointment_Id"],
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "Amount" => $row["Amount"],
                "IsDone" => $row["IsDone"],

            );
            array_push($appointmentData, $appointment);
        }
        return $appointmentData;
    }


    public function getAppointmentToDoneByPastDate($date)
    {
        $sql = " SELECT * FROM `appointment` WHERE `Appoinment_Date` < '$date'  AND `IsDone` = 0 ORDER BY `Appoinment_Date` ASC";
        $stmt = $this->connect()->query($sql);
        // $stmt->execute([$appoinmentDate]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Appointment_Id" => $row["Appointment_Id"],
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "Amount" => $row["Amount"],
                "IsDone" => $row["IsDone"],

            );
            array_push($appointmentData, $appointment);
        }
        return $appointmentData;
    }

    //  SELECT * FROM `appointment` WHERE `Appoinment_Date` = '2021-12-27' AND `Appointment_EndTime` < '07:00:00' AND `IsDone` = 0 ORDER BY `Appoinment_Date` ASC
    //  SELECT * FROM `appointment` WHERE `Appoinment_Date` = '2021-12-27' AND `Appointment_EndTime` < '07:00:00' AND `IsDone` = 0 ORDER BY `Appoinment_Date` ASC
    // SELECT * FROM `appointment` WHERE `Appoinment_Date` = '2021-12-27' AND `Appointment_EndTime` < '19:00:31' AND `IsDone` = 0 ORDER BY `Appoinment_Date` ASC
    public function getAppointmentToDoneByTodayDate($date, $time)
    {
        $sql = " SELECT * FROM `appointment` WHERE `Appoinment_Date` = '$date' AND `Appointment_EndTime` < '$time' AND `IsDone` = 0 ORDER BY `Appoinment_Date` ASC";
        $stmt = $this->connect()->query($sql);
        // $stmt->execute([$appoinmentDate]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Appointment_Id" => $row["Appointment_Id"],
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "Amount" => $row["Amount"],
                "IsDone" => $row["IsDone"],

            );
            array_push($appointmentData, $appointment);
        }
        return $appointmentData;
    }


    public function getAppointmentNotPaid()
    {
        $sql = " SELECT * FROM `appointment` WHERE `IsPaid` = 0 ORDER BY `Appoinment_Date` ASC";
        $stmt = $this->connect()->query($sql);
        // $stmt->execute([$appoinmentDate]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Appointment_Id" => $row["Appointment_Id"],
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "Amount" => $row["Amount"],
                "IsDone" => $row["IsDone"],

            );
            array_push($appointmentData, $appointment);
        }
        return $appointmentData;
    }

    public function getByFiltered($sqlText)
    {
        $sql = $sqlText;
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    public function getAppointmentID($appoinmentId)
    {
        $sql = "SELECT * FROM `appointment` WHERE `Appointment_Id` = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        while ($row = $stmt->fetch()) {
            return $row["Appoinment_Date"];
        }
    }

    public function getAppointmentByPatientID($patientId)
    {

        $sql = "SELECT * FROM `appointment` WHERE `Patient_ID` = ? ORDER BY `appointment`.`Appoinment_Date` DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$patientId]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Appointment_Id" => $row["Appointment_Id"],
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "IsDone" => $row["IsDone"],
                "Amount" => $row["Amount"],

            );
            array_push($appointmentData, $appointment);
        }
        return $appointmentData;
    }

    public function deleteAppointment($appId)
    {
        $sql1 = "DELETE FROM `appointment` WHERE `Appointment_Id` = '" . $appId . "'";

        $stmt = $this->connect()->query($sql1);
        $stmt->execute();
        echo "Appointment  " . $appId . " succssfully deleted";
    }

    public function archiveAppointment($appId)
    {
        $sql1 = "INSERT INTO archived_appointment SELECT * FROM appointment WHERE Appointment_Id = ? ; DELETE FROM appointment WHERE Appointment_Id = ? ;";
        echo $sql1 . "<br>";
        $stmt = $this->connect()->prepare($sql1);
        $stmt->execute([$appId, $appId]);

        // $sql2 = "DELETE FROM appointment WHERE Appointment_Id = '".$appId."';";
        // $stmt2 = $this->connect()->query($sql2);
        // $stmt2->execute();

        echo "Appointment  " . $appId . " succssfully archived";
    }


    public function unArchiveAppointment($appId)
    {
        $sql1 = "INSERT INTO appointment SELECT * FROM archived_appointment WHERE Appointment_Id = ? ; DELETE FROM archived_appointment WHERE Appointment_Id = ? ;";
        echo $sql1 . "<br>";
        $stmt = $this->connect()->prepare($sql1);
        $stmt->execute([$appId, $appId]);

        // $sql2 = "DELETE FROM appointment WHERE Appointment_Id = '".$appId."';";
        // $stmt2 = $this->connect()->query($sql2);
        // $stmt2->execute();

        echo "Appointment  " . $appId . " succssfully archived";
    }


    public function getAllArchiveAppointment()
    {
        $sql = "SELECT * FROM `archived_appointment` ORDER BY `Date_Created` DESC";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    public function getArchivedAppointmentById($appoinmentId)
    {

        $sql = "SELECT * FROM `archived_appointment` WHERE `Appointment_Id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$appoinmentId]);
        $appointmentData = array();
        while ($row = $stmt->fetch()) {
            $appointment = array(
                "Patient_ID" => $row["Patient_ID"],
                "Contact" => $row["Contact"],
                "Appoinment_Date" => $row["Appoinment_Date"],
                "Appointment_StartTime" => $row["Appointment_StartTime"],
                "Appointment_EndTime" => $row["Appointment_EndTime"],
                "Duration_Minutes" => $row["Duration_Minutes"],
                "Allotted_Hours" => $row["Allotted_Hours"],
                "Date_Created" => $row["Date_Created"],
                "Payment_Method" => $row["Payment_Method"],
                "IsPaid" => $row["IsPaid"],
                "IsDone" => $row["IsDone"],
                "Amount" => $row["Amount"],

            );
            array_push($appointmentData, $appointment);
        }

        $sql2 = "SELECT * FROM `appointment_service` WHERE `Appoinment_Id` = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$appoinmentId]);
        $appointmentServices = array();
        while ($row = $stmt2->fetch()) {
            $service = array(
                "Service_Id" => $row["Service_Id"],
                "Service_Name" => $row["Service_Name"],
                "Service_Prc" => $row["Service_Prc"],
            );
            array_push($appointmentServices, $service);
        }

        array_push($appointmentData, $appointmentServices);
        return $appointmentData;
    }

    public function getAllArchivedAppointment()
    {
        $sql = "SELECT * FROM `archived_appointment` ORDER BY `Date_Created` DESC";
        $stmt = $this->connect()->query($sql);
        $allServices = array();
        return $stmt;
    }

    public function deleteArchivedAppointment($appId)
    {
        $sql1 = "DELETE FROM `archived_appointment` WHERE `Appointment_Id` = '" . $appId . "'";

        $stmt = $this->connect()->query($sql1);
        $stmt->execute();
        echo "archived_appointment  " . $appId . " succssfully deleted";
    }


    public function approvedAppointment($appId)
    {
        $sql1 = "UPDATE `appointment` SET `IsApproved`='1' WHERE `Appointment_Id` = '" . $appId . "'";

        $stmt = $this->connect()->query($sql1);
        $stmt->execute();
    }

    public function saveChanges($appId, $isPaid, $amount, $isDone)
    {
        $sql1 = "UPDATE `appointment` SET `IsPaid`='$isPaid',`Amount`='$amount',`IsDone`='$isDone' WHERE `Appointment_Id`  = '" . $appId . "'";

        $stmt = $this->connect()->query($sql1);
        $stmt->execute();
    }


    public function addPOP($app_id, $filename)
    {
        try {
            $sql = "INSERT INTO `proof_of_payments`(`App_Id`, `ImgFileName`) VALUES (?,?)";
            // echo $sql;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$app_id, $filename]);
            return "1";
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getPOP($app_id)
    {
        $sql = "SELECT * FROM `proof_of_payments` WHERE `App_Id` = ?";
        // echo $sql;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$app_id]);
        while ($row = $stmt->fetch()) {
            $pop = array(
                "App_Id" => $row["App_Id"],
                "ImgFileName" => $row["ImgFileName"]
            );
            return $pop;
        }
    }

    public function deletePOP($app_id)
    {
        $sql = "DELETE FROM `proof_of_payments` WHERE `App_Id` = ?";
        // echo $sql;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$app_id]);
    }

    public function getAppPerMonth($year)
    {
        $sql = "SELECT * FROM appointment WHERE `Appoinment_Date` BETWEEN  '$year-01-01' AND '$year-12-31'";
        // echo  $sql;
        //  $stmt = $this->connect()->prepare($sql);
        // $stmt->execute([$year,$year]);

        $stmt = $this->connect()->query($sql);
        $stmt->execute();
        $appointments = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        while ($row = $stmt->fetch()) {
            $date = date_create($row['Appoinment_Date']);
            $month =  date_format($date, "m");
            switch ($month) {
                case '01':
                    $appointments[0] += 1;
                    break;
                case '02':
                    $appointments[1] += 1;
                    break;
                case '03':
                    $appointments[2] += 1;
                    break;
                case '04':
                    $appointments[3] += 1;
                    break;
                case '05':
                    $appointments[4] += 1;
                    break;
                case '06':
                    $appointments[5] += 1;
                    break;
                case '07':
                    $appointments[6] += 1;
                    break;
                case '08':
                    $appointments[7] += 1;
                    break;
                case '09':
                    $appointments[8] += 1;
                    break;
                case '10':
                    $appointments[9] += 1;
                    break;
                case '11':
                    $appointments[10] += 1;
                    break;
                case '12':
                    $appointments[11] += 1;
                    break;
                default:
            }
        }
        echo  json_encode($appointments);
    }
}


//  INSERT INTO archived_appointment
//           SELECT *
//           FROM appointment
//           WHERE Appointment_Id = ''

// INSERT INTO archived_appointment SELECT * FROM appointment WHERE Appointment_Id = '1HM9LAXXYFAQO56';
// DELETE FROM appointment WHERE Appointment_Id = '1HM9LAXXYFAQO56';