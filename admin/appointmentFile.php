<?php
include_once '../classes/appoinment.class.php';
include_once '../classes/patient.class.php';

$appointment_obj = new Appointment();
$patient_obj = new Patient();

$stmt_appointments;
$textFilter = '';
$header = "";
if (isset($_POST["sql"])) {
    $stmt_appointments = $appointment_obj->getByFiltered($_POST["sql"]);
    $textFilter = $_POST["filterTxt"];
    $textFilter = str_replace("<br>", "\n", $textFilter);
    $textFilter  = substr($textFilter, 27);
    $header = 'Filtered By';
} else {
    $stmt_appointments = $appointment_obj->getAllAppointment();
     $header = 'All appointments';
}

include 'fpdf/fpdf.php';
include 'fpdf/exfpdf.php';
include 'fpdf/easyTable.php';

$pdf = new exFPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

$pdf->SetTitle("Appointment");

$table1 = new easyTable($pdf, 2);
$table1->easyCell('Appointments', 'font-size:30; font-style:B; font-color:#F05F79;');
$table1->printRow();

$table1->rowStyle('font-size:15; font-style:B;');
$table1->easyCell($header);
// $table1->easyCell('FPDF Generator Ltd', 'align:R;');
$table1->printRow();

$table1->rowStyle('font-size:12;');
$table1->easyCell($textFilter);
// $table1->easyCell("Mr. Olivier PLATHEY\n123 Some other Street\nSome other City\nABC 123\nSome other Country", 'align:R;');
$table1->printRow();
$table1->endTable(5);

$appNum = 0;
while ($app = $stmt_appointments->fetch()) {
    if ($appNum % 3 == 0 & $appNum != 0) {
        $pdf->AddPage();
    }
    // Title
    $table = new easyTable($pdf, 12,);
    $table->easyCell('Appointment', 'colspan:12; bgcolor:#faa2b2; font-color:#ffffff ; font-style:B;');
    $table->printRow();

    $table->easyCell('', 'colspan:12;');
    $table->printRow();

    $data = "<b>Appointment ID :\n Patient ID :\n Name :\n Contact :\n\n Appointment Date :\n  Appointment Time:\n Duration :\n Allotted Time:\n Date Created:\n\n </b>";
    $appId = $app["Appointment_Id"] . "\n";
    $patientId = $app["Patient_ID"] . "\n";
    $patient = $patient_obj->getPatientById($app["Patient_ID"]);

    $patientName = $patient["Name"] . "\n";
    $contact = $app["Contact"] . "\n\n";
    $appDate = date_format(date_create($app["Appoinment_Date"]), "M d, Y") . "\n";
    $appTime_Start = date_create($app["Appointment_StartTime"]);
    $appTime_End = date_create($app["Appointment_EndTime"]);
    $time = date_format($appTime_Start, " h:i a") . " - " . date_format($appTime_End, " h:i a") . "\n";
    $appTime_Duration = $app["Duration_Minutes"] . " mins \n";
    $appTime_Allotted = $app["Allotted_Hours"] . " hour/s \n";
    $dateCreated = date_format(date_create($app["Date_Created"]), "M d, Y") . "\n\n";


    $appData = $appId . $patientId . $patientName . $contact . $appDate . $time . $appTime_Duration
        . $appTime_Allotted . $dateCreated;


    $payment =  $app["Payment_Method"];
    $isPaid = ($app["IsPaid"]) ? "Paid" : "Not Paid";
    $col2txt = "<b>Payment Method</b> : $payment \n<b>Is Paid</b> : \t\t$isPaid \n";
    $servicesTxt = "\n<b>Appointment service/s </b> \n";
    $services_array = $appointment_obj->getServicesByAppID($app["Appointment_Id"]);
    foreach ($services_array as $sv) {
        $servicesTxt .= $sv["Service_Name"] . " -  " . $sv["Service_Prc"] . " php \n ";
    }

    $col2txt .= $servicesTxt;

    $amounttxt = "\n<b>Amount : </b>" . $app["Amount"];
    $col2txt .= $amounttxt;

    $table->rowStyle('min-height:20; align:{L}');   // let's adjust the height of this row
    $table->easyCell($data, 'colspan:3');
    $table->easyCell($appData, 'colspan:4');
    $table->easyCell($col2txt, 'colspan:5');
    $table->printRow();

    $table->endTable(10);

    $appNum++;
}





$pdf->Output();
