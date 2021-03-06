<?php
include_once '../classes/appoinment.class.php';
$appoinment_obj = new Appointment();

include_once '../classes/dentalHistory.class.php';
$dentalHistory_obj = new DentalHistory();

include_once '../classes/medicalHistory.class.php';
$medicalHistory_obj = new MedicalHistory();

include_once '../classes/femalePatient.class.php';
$femalePatient_obj = new FemalePatient();

include_once '../classes/socialHistory.class.php';
$socialHistory_obj = new SocialHistory();

include_once '../classes/patientCondition.class.php';
$patientCondition_obj = new PatientCondition();

include_once "../classes/activityLog.class.php";
$actLog_obj = new ActivityLog();


$currentDate = new DateTime();
$currentDate->setTimezone(new DateTimeZone('Asia/Manila'));
$DateCreated = $currentDate->format('Y-m-d H:i:s');
$DateCreatedDateOnly = $currentDate->format('Y-m-d');

if (isset($_POST["addNewAppointment"])) {

    $appoinment_obj->addNewAppointment(
        $_POST["appointmentId"],
        $_POST["patientID"],
        $_POST["patientContact"],
        $_POST["appointmentDate"],
        $_POST["appointmentStartTime"],
        $_POST["appointmentEndTime"],
        $_POST["appointmentTotalDuration"],
        $_POST["appointmentAllottedHours"],
        $DateCreated,
        $_POST["appointmentPaymentMethod"],
        $_POST["IsPaid"],
        $_POST["appointmentAmount"],
        $_POST["appointmentServices"]
    );
}

if (isset($_POST["getAppointment"])) {
    $appointment_array = $appoinment_obj->getAppointmentByDate($_POST["appointmentDate"]);
    $time_array = array();
    foreach ($appointment_array as $data) {
        $start_time = $data["Appointment_StartTime"];
        $appTime = new DateTime($start_time);
        $allotted_time = $data["Allotted_Hours"];
        $appointment = array(
            "start_time" => $appTime->format('H'),
            "allotted_time" => $allotted_time
        );
        array_push($time_array, $appointment);
    };
    echo json_encode($time_array);
}

if (isset($_POST["getToInitScheds"])) {
    $appointment_array = $appoinment_obj->getAppointmentByDate($_POST["theDate"]);
    $time_array = array();
    foreach ($appointment_array as $data) {
        $start_time = $data["Appointment_StartTime"];
        $end_time = $data["Appointment_EndTime"];
        $appTime = new DateTime($start_time);
        $appEnd = new DateTime($end_time);
        $allotted_time = $data["Allotted_Hours"];
        $appointment = array(
            "app_id" => $data["Appointment_Id"],
            "start_time" => $appTime->format('H'),
            "time_start" => $appTime->format('ha'),
            "end_time" => $appEnd->format('ha'),
            "allotted_time" => $allotted_time
        );
        array_push($time_array, $appointment);
    };
    echo json_encode($time_array);
}

if (isset($_POST["addTheNewAppointment"])) {
    // $appoinment = json_encode($text);
    // echo $appoinment;

    // $text = '{"ID":"JQ5GHWFWHL0XIJW","Patient_ID":"1186","Contact":"022312313133","Date":"2021-12-31","Start_Time":"15:00","End_Time":"17:00","Duration":120,"Allotted_Hours":2,"Services":[["S101","Extraction","600"]],"Amount":"600","Payment_Method":"GCash","IsPaid":false,"Dental_Form":{"Last_Dental_Visit":"2021-12-01","Purpose":"waada"},"Medical_Form":{"Last_Medical_CheckUp":"2021-12-02","Treatment":"asd","Medication":"None","Hospitalized":"No","Allergies":"asd asdsadas"},"Female_Form":{"IsPregnant":1,"Months_Pregnant":"1","IsTakingPills":0},"Social_Form":{"IsSmoking":0,"IsDringkingAlcohol":0},"Condtions":"Low Blood Pressure, Heart Disease / Heart Attack"}';

    $appFlag = 1;
    $dentalFlag = 1;
    $medicalFlag = 1;
    $femaleFlag = 1;
    $socialFlag = 1;
    $conditionFlag = 1;

    $text  = $_POST["appointmentData"];
    $appoinment = json_decode($text);
    $appFlag = $appoinment_obj->addNewAppointment(
        $appoinment->ID,
        $appoinment->Patient_ID,
        $appoinment->Contact,
        $appoinment->Date,
        $appoinment->Start_Time,
        $appoinment->End_Time,
        $appoinment->Duration,
        $appoinment->Allotted_Hours,
        $DateCreated,
        $appoinment->Payment_Method,
        $appoinment->IsPaid,
        $appoinment->Amount,
        $appoinment->Services
    );

    if (isset($appoinment->Dental_Form)) {
        // echo "Last_Dental_Visit :" . $appoinment->Dental_Form->Last_Dental_Visit  . "<br>";
        // echo "Purpose :" . $appoinment->Dental_Form->Purpose  . "<br>";
        $dentalFlag = $dentalHistory_obj->addNewDentalHistory(
            $appoinment->ID,
            $appoinment->Dental_Form->Last_Dental_Visit,
            $appoinment->Dental_Form->Purpose,
        );
    }

    if (isset($appoinment->Medical_Form)) {
        // echo "med Last_Medical_CheckUp :" . $appoinment->Medical_Form->Last_Medical_CheckUp  . "<br>";
        // echo "Treatment :" . $appoinment->Medical_Form->Treatment  . "<br>";
        // echo "Medication :" . $appoinment->Medical_Form->Medication  . "<br>";
        // echo "Hospitalized :" . $appoinment->Medical_Form->Hospitalized  . "<br>";
        // echo "Allergies :" . $appoinment->Medical_Form->Allergies  . "<br>";

        $medicalFlag = $medicalHistory_obj->addNewMedicalHistory(
            $appoinment->ID,
            $appoinment->Medical_Form->Last_Medical_CheckUp,
            $appoinment->Medical_Form->Treatment,
            $appoinment->Medical_Form->Medication,
            $appoinment->Medical_Form->Hospitalized,
            $appoinment->Medical_Form->Allergies
        );
    }


    if (isset($appoinment->Female_Form)) {
        // echo "IsPregnant :" . $appoinment->Female_Form->IsPregnant  . "<br>";
        // echo "Months_Pregnant :" . $appoinment->Female_Form->Months_Pregnant  . "<br>";
        // echo "IsTakingPills :" . $appoinment->Female_Form->IsTakingPills  . "<br>";

        $femaleFlag = $femalePatient_obj->addNewFemalePatient(
            $appoinment->ID,
            $appoinment->Patient_ID,
            $appoinment->Female_Form->IsPregnant,
            $appoinment->Female_Form->Months_Pregnant,
            $appoinment->Female_Form->IsTakingPills,
            $DateCreatedDateOnly
        );
    }

    if (isset($appoinment->Social_Form)) {
        // echo "IsSmoking :" . $appoinment->Social_Form->IsSmoking  . "<br>";
        // echo "IsDringkingAlcohol :" . $appoinment->Social_Form->IsDringkingAlcohol  . "<br>";
        $socialFlag = $socialHistory_obj->addNewSocialHistory(
            $appoinment->ID,
            $appoinment->Social_Form->IsSmoking,
            $appoinment->Social_Form->IsDringkingAlcohol
        );
    }

    if (isset($appoinment->Condtions)) {
        // echo "Conditions : $appoinment->Condtions  <br>";
        $conditionFlag =  $patientCondition_obj->addNewPatientCondition(
            $appoinment->ID,
            $appoinment->Patient_ID,
            $appoinment->Condtions
        );
    }

    if (
        $appFlag != "1" || $medicalFlag != "1" || $dentalFlag != "1" || $femaleFlag != "1"
        || $socialFlag != "1" || $conditionFlag != "1"
    ) {
        echo "$appFlag | $medicalFlag | $dentalFlag | $femaleFlag | $socialFlag | $conditionFlag | ";
    } else {
        echo "1";
    }
}


if (isset($_POST["getAppointmentId"])) {
    echo $appoinment_obj->getAppointmentID($_POST["appId"]);
}

if (isset($_POST["deleteAppointment"])) {
    $appoinment_obj->deleteAppointment($_POST['appId']);
    $actLog_obj->addNewLog('Delete', 'Appointment ' . $_POST['appId'] . ' has been deleted');
}

if (isset($_POST["archiveAppointment"])) {
    $actLog_obj->addNewLog('Move', 'Appointment ' . $_POST['appId'] . ' has been moved to archives');
    $appoinment_obj->archiveAppointment($_POST['appId']);
}

if (isset($_POST["unArchiveAppointment"])) {
    $actLog_obj->addNewLog('Move', 'Appointment ' . $_POST['appId'] . ' has been unmoved from archives');
    $appoinment_obj->unArchiveAppointment($_POST['appId']);
}

if (isset($_POST["deleteArchivedAppointment"])) {
    // echo $_POST['appId'];
    $appoinment_obj->deleteArchivedAppointment($_POST['appId']);
    $actLog_obj->addNewLog('Delete', 'Appointment ' . $_POST['appId'] . ' has been deleted from archives');
}


if (isset($_POST["approvedAppointment"])) {
    // echo $_POST['appId'];
    $appoinment_obj->approvedAppointment($_POST['appId']);
    $actLog_obj->addNewLog('Edit', 'Appointment ' . $_POST['appId'] . ' has been approved');
    $currentDateTime = new DateTime();
    $currentDateTime->setTimezone(new DateTimeZone('Asia/Manila'));
    echo date_format($currentDateTime, "M d, Y h:i a");
}

if (isset($_POST["saveChanges"])) {
    // echo $_POST['isPaid'] . $_POST['isDone']. $_POST['amount'];
    $appoinment_obj->saveChanges($_POST['appId'], $_POST['isPaid'],  $_POST['amount'], $_POST['isDone']);
    $actLog_obj->addNewLog('Edit', 'Appointment ' . $_POST['appId'] . ' has been changed');

    $currentDateTime = new DateTime();
    $currentDateTime->setTimezone(new DateTimeZone('Asia/Manila'));
    echo date_format($currentDateTime, "M d, Y h:i a");
}

if (isset($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = "../resources/Proof_of_Payments/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    /* Valid extensions */
    $valid_extensions = array("jpg");

    /* Check file extension */
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
        /* Upload file */
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $response = $location;
            $filename = substr($filename, 0, -4);
            echo  $appoinment_obj->addPOP($_GET["appID"], $filename);
            // $actLog_obj->addNewLog('Edit', 'Service category ' . $_GET["serviceCategoryId"] . ' image changed');
        }
    } else {
        echo "Error : Invalid File";
    }
}

if (isset($_POST["deletePOP"])) {
    $appoinment_obj->deletePOP($_POST['popID']);
}
if (isset($_POST["getMonthsVal"])) {
    $appoinment_obj->getAppPerMonth($_POST['yearApp']);
}

if (isset($_POST["getYearVal"])) {
    $appoinment_obj->getAppByYear($_POST['yearApp']);
}

if (isset($_POST["getYearMonthVal"])) {
    $appoinment_obj->getAppByYearMonth($_POST['year2App'], $_POST['monthApp']);
}
// if(0 != "1"){
//     echo "Asdad";
// }
// E:\xampp\htdocs\Dental Clinic\ajaxRequest\appointment.ajax.php

// $appoinment_obj->getAppByYear('2020');
    // $appoinment_obj->getAppByYearMonth('2021', '11');
