<?php
include_once '../classes/clinicDate.class.php';
include_once "../classes/activityLog.class.php";
$actLog_obj = new ActivityLog();

if (isset($_POST["getAdminCalendarDates"])) {
    $dates = new ClinicDate();
    $month = $_POST["getMonth"];
    $year = $_POST["getYear"];
    echo json_encode($dates->getAllDate($month, $year));
    
}

if (isset($_POST["setNotAvailable"])) {
    $dates = new ClinicDate();
    $dates->addNoClinicDates($_POST["theDate"], $_POST["theReason"]);
    $actLog_obj->addNewLog('Edit', 'Date ' . $_POST['theDate'] . ' has been set to not available');

    
}

if (isset($_POST["setNAvailable"])) {
    $dates = new ClinicDate();
    $dates->deleteDate($_POST["theDate"]);
    $actLog_obj->addNewLog('Edit', 'Date ' . $_POST['theDate'] . ' has been set to available');

    
}