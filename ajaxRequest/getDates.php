<?php
include_once '../classes/clinicDate.class.php';

if (isset($_POST["getAdminCalendarDates"])) {
    $dates = new ClinicDate();
    $month = $_POST["getMonth"];
    $year = $_POST["getYear"];
    echo json_encode($dates->getAllDate($month, $year));
    
}
