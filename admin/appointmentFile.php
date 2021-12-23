<?php
include_once '../classes/appoinment.class.php';
include_once '../classes/patient.class.php';

$appointment_obj = new Appointment();
$patient_obj = new Patient();

$stmt_appointments;
$textFilter = '';
$header = "";

include 'fpdf/fpdf.php';
include 'fpdf/exfpdf.php';
include 'fpdf/easyTable.php';

$pdf = new exFPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

if (isset($_POST["app_ID"])) {
    $pdf->SetTitle("Appointment " . $_POST["app_ID"]);

    $table1 = new easyTable($pdf, 2);
    $table1->easyCell('', 'img:../resources/icons/LOGOV2.6.png, h15; align:L; valign:B;');
    // $table1->easyCell('Appointment', 'font-size:25; font-style:B; font-color:#F05F79; valign:B;');
    $table1->printRow();
    $table1->endTable(5);


    $appointment = $appointment_obj->getAppointmentById($_POST["app_ID"]);
    $patient = $patient_obj->getPatientById($appointment[0]["Patient_ID"]);

    $data = "<b>Appointment ID :\n\n Patient ID :\n Name :\n Contact :\n\n Appointment Date :\n  Appointment Time:\n Duration :\n Allotted Time:\n Date Created:\n\n </b>";

    $appId = $_POST["app_ID"];
    $patientId = $appointment[0]["Patient_ID"];
    $patient = $patient_obj->getPatientById($patientId);

    $patientName = $patient["Name"];
    $contact = $appointment[0]["Contact"];
    $appDate = date_format(date_create($appointment[0]["Appoinment_Date"]), "M d, Y");
    $appTime_Start = date_create($appointment[0]["Appointment_StartTime"]);
    $appTime_End = date_create($appointment[0]["Appointment_EndTime"]);
    $time = date_format($appTime_Start, " h:i a") . " - " . date_format($appTime_End, " h:i a");
    $appTime_Duration = $appointment[0]["Duration_Minutes"] . " mins ";
    $appTime_Allotted = $appointment[0]["Allotted_Hours"] . " hour/s";
    $dateCreated = date_format(date_create($appointment[0]["Date_Created"]), "M d, Y");


    $appData = $appId . $patientId . $patientName . $contact . $appDate . $time . $appTime_Duration
        . $appTime_Allotted . $dateCreated;

    $table = new easyTable($pdf, 20,);

    $table->rowStyle('min-height:10');
    $table->easyCell('', 'colspan:1; bgcolor:#faa2b2');
    $table->easyCell(' Appointment', 'colspan:18; bgcolor:#faa2b2; font-color:#ffffff ; font-style:B; font-size:18;');
    $table->printRow();

    $table->easyCell('', 'colspan:12;');
    $table->printRow();

    $x1 = "colspan:6; font-size:13; font-color:#bf2441; font-style:B;";
    $x2 = 'colspan:6; font-size:13; ';

    $table->rowStyle('min-height:12; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Appointment ID ", $x1);
    $table->easyCell($appId, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Patient ID ", $x1);
    $table->easyCell($patientId, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Patient Name ", $x1);
    $table->easyCell($patientName, $x2);
    $table->printRow();

    $table->rowStyle('min-height:12; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Contact", $x1);
    $table->easyCell($contact, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Appointment Date", $x1);
    $table->easyCell($appDate, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Appointment Time", $x1);
    $table->easyCell($time, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Duration", $x1);
    $table->easyCell($appTime_Duration, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Allotted time", $x1);
    $table->easyCell($appTime_Allotted, $x2);
    $table->printRow();

    $table->rowStyle('min-height:15; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Date Created", $x1);
    $table->easyCell($dateCreated, $x2);
    $table->printRow();

    $table->rowStyle('min-height:10');
    $table->easyCell('', 'colspan:1; bgcolor:#fafafa');
    $table->easyCell(' Appointment Service/s', 'colspan:18; bgcolor:#fafafa; font-color:#333333 ; font-style:B; font-size:15;');
    $table->printRow();

    $x3 = "colspan:10; font-size:13; font-color:#222222; ";
    $x4 = 'colspan:4; font-size:13; ';

    $table->rowStyle('min-height:10; align:{L}');
    $table->easyCell('', 'colspan:3; ');
    $table->easyCell("Services Name ", $x3);
    $table->easyCell("Price", $x4);
    $table->printRow();

    $svNum = 1;
    foreach ($appointment[1] as $service) {
        $svId =   $service["Service_Id"];
        $svName =   $service["Service_Name"];
        $svPrc =   $service["Service_Prc"];

        $table->rowStyle('min-height:7; align:{L}');
        $table->easyCell("", 'colspan:2; ');
        $table->easyCell($svNum, 'colspan:1; ');
        $table->easyCell($svName, $x3);
        $table->easyCell($svPrc, $x4);
        $table->easyCell("php", 'colspan:1; ');
        $table->printRow();

        $svNum++;
    }

    $table->rowStyle('min-height:12; valign:B; align:{L} ');
    $table->easyCell("", 'colspan:2; ');
    $table->easyCell("Total Amount ", 'colspan:10; font-size:13; align:R;');
    $table->easyCell("", 'colspan:1; ');
    $table->easyCell($appointment[0]["Amount"], 'colspan:4; font-size:13; ');
    $table->easyCell("php", 'colspan:2; ');
    $table->printRow();

    $table->rowStyle('min-height:10; valign:B; align:{L} ');
    $table->easyCell("", 'colspan:20; ');
    $table->printRow();

    $isDone = ($appointment[0]["IsDone"]) ? "Done" : "Not Done";
    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Done ", $x1);
    $table->easyCell($isDone, $x2);
    $table->printRow();

    $table->rowStyle('min-height:10; valign:B; align:{L} ');
    $table->easyCell("", 'colspan:20; ');
    $table->printRow();


    $table->rowStyle('min-height:10');
    $table->easyCell('', 'colspan:1; bgcolor:#fafafa');
    $table->easyCell('Payment', 'colspan:18; bgcolor:#fafafa; font-color:#333333 ; font-style:B; font-size:15;');
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Payment Method ", $x1);
    $table->easyCell($appointment[0]["Payment_Method"], $x2);
    $table->printRow();

    $isPaid = ($appointment[0]["IsPaid"]) ? "Paid" : "Not Paid";
    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Paid ", $x1);
    $table->easyCell($isPaid, $x2);
    $table->printRow();


    $table->endTable(5);



    $pdf->Output();
}
if (isset($_POST["archivedApp_ID"])) {
    $pdf->SetTitle("Archived Appointment " . $_POST["archivedApp_ID"]);

    $table1 = new easyTable($pdf, 2);
    $table1->easyCell('', 'img:../resources/icons/LOGOV2.6.png, h15; align:L; valign:B;');
    // $table1->easyCell('Appointment', 'font-size:25; font-style:B; font-color:#F05F79; valign:B;');
    $table1->printRow();
    $table1->endTable(5);


    $appointment = $appointment_obj->getArchivedAppointmentById($_POST["archivedApp_ID"]);
    $patient = $patient_obj->getPatientById($appointment[0]["Patient_ID"]);

    $data = "<b>Appointment ID :\n\n Patient ID :\n Name :\n Contact :\n\n Appointment Date :\n  Appointment Time:\n Duration :\n Allotted Time:\n Date Created:\n\n </b>";

    $appId = $_POST["archivedApp_ID"];
    $patientId = $appointment[0]["Patient_ID"];
    $patient = $patient_obj->getPatientById($patientId);

    $patientName = $patient["Name"];
    $contact = $appointment[0]["Contact"];
    $appDate = date_format(date_create($appointment[0]["Appoinment_Date"]), "M d, Y");
    $appTime_Start = date_create($appointment[0]["Appointment_StartTime"]);
    $appTime_End = date_create($appointment[0]["Appointment_EndTime"]);
    $time = date_format($appTime_Start, " h:i a") . " - " . date_format($appTime_End, " h:i a");
    $appTime_Duration = $appointment[0]["Duration_Minutes"] . " mins ";
    $appTime_Allotted = $appointment[0]["Allotted_Hours"] . " hour/s";
    $dateCreated = date_format(date_create($appointment[0]["Date_Created"]), "M d, Y");


    $appData = $appId . $patientId . $patientName . $contact . $appDate . $time . $appTime_Duration
        . $appTime_Allotted . $dateCreated;

    $table = new easyTable($pdf, 20,);

    $table->rowStyle('min-height:10');
    $table->easyCell('', 'colspan:1; bgcolor:#faa2b2');
    $table->easyCell('Archived Appointment', 'colspan:18; bgcolor:#faa2b2; font-color:#ffffff ; font-style:B; font-size:18;');
    $table->printRow();

    $table->easyCell('', 'colspan:12;');
    $table->printRow();

    $x1 = "colspan:6; font-size:13; font-color:#bf2441; font-style:B;";
    $x2 = 'colspan:6; font-size:13; ';

    $table->rowStyle('min-height:12; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Appointment ID ", $x1);
    $table->easyCell($appId, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Patient ID ", $x1);
    $table->easyCell($patientId, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Patient Name ", $x1);
    $table->easyCell($patientName, $x2);
    $table->printRow();

    $table->rowStyle('min-height:12; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Contact", $x1);
    $table->easyCell($contact, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Appointment Date", $x1);
    $table->easyCell($appDate, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Appointment Time", $x1);
    $table->easyCell($time, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Duration", $x1);
    $table->easyCell($appTime_Duration, $x2);
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Allotted time", $x1);
    $table->easyCell($appTime_Allotted, $x2);
    $table->printRow();

    $table->rowStyle('min-height:15; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Date Created", $x1);
    $table->easyCell($dateCreated, $x2);
    $table->printRow();

    $table->rowStyle('min-height:10');
    $table->easyCell('', 'colspan:1; bgcolor:#fafafa');
    $table->easyCell(' Appointment Service/s', 'colspan:18; bgcolor:#fafafa; font-color:#333333 ; font-style:B; font-size:15;');
    $table->printRow();

    $x3 = "colspan:10; font-size:13; font-color:#222222; ";
    $x4 = 'colspan:4; font-size:13; ';

    $table->rowStyle('min-height:10; align:{L}');
    $table->easyCell('', 'colspan:3; ');
    $table->easyCell("Services Name ", $x3);
    $table->easyCell("Price", $x4);
    $table->printRow();

    $svNum = 1;
    foreach ($appointment[1] as $service) {
        $svId =   $service["Service_Id"];
        $svName =   $service["Service_Name"];
        $svPrc =   $service["Service_Prc"];

        $table->rowStyle('min-height:7; align:{L}');
        $table->easyCell("", 'colspan:2; ');
        $table->easyCell($svNum, 'colspan:1; ');
        $table->easyCell($svName, $x3);
        $table->easyCell($svPrc, $x4);
        $table->easyCell("php", 'colspan:1; ');
        $table->printRow();

        $svNum++;
    }

    $table->rowStyle('min-height:12; valign:B; align:{L} ');
    $table->easyCell("", 'colspan:2; ');
    $table->easyCell("Total Amount ", 'colspan:10; font-size:13; align:R;');
    $table->easyCell("", 'colspan:1; ');
    $table->easyCell($appointment[0]["Amount"], 'colspan:4; font-size:13; ');
    $table->easyCell("php", 'colspan:2; ');
    $table->printRow();

    $table->rowStyle('min-height:10; valign:B; align:{L} ');
    $table->easyCell("", 'colspan:20; ');
    $table->printRow();

    $isDone = ($appointment[0]["IsDone"]) ? "Done" : "Not Done";
    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Done ", $x1);
    $table->easyCell($isDone, $x2);
    $table->printRow();

    $table->rowStyle('min-height:10; valign:B; align:{L} ');
    $table->easyCell("", 'colspan:20; ');
    $table->printRow();


    $table->rowStyle('min-height:10');
    $table->easyCell('', 'colspan:1; bgcolor:#fafafa');
    $table->easyCell('Payment', 'colspan:18; bgcolor:#fafafa; font-color:#333333 ; font-style:B; font-size:15;');
    $table->printRow();

    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Payment Method ", $x1);
    $table->easyCell($appointment[0]["Payment_Method"], $x2);
    $table->printRow();

    $isPaid = ($appointment[0]["IsPaid"]) ? "Paid" : "Not Paid";
    $table->rowStyle('min-height:7; align:{L}');
    $table->easyCell('', 'colspan:1; ');
    $table->easyCell("Paid ", $x1);
    $table->easyCell($isPaid, $x2);
    $table->printRow();


    $table->endTable(5);



    $pdf->Output();
} else if ($_POST["archives"]) {
    if (isset($_POST["sql"])) {
        $stmt_appointments = $appointment_obj->getByFiltered($_POST["sql"]);
        $textFilter = $_POST["filterTxt"];
        $textFilter = str_replace("<br>", "\n", $textFilter);
        $textFilter  = substr($textFilter, 27);
        $header = 'Filtered By';
    } else {
        $stmt_appointments = $appointment_obj->getAllArchivedAppointment();
        $header = 'All archives appointments';
    }



    $pdf->SetTitle("Archived Appointments");

    $table1 = new easyTable($pdf, 2);
    $table1->easyCell('', 'img:../resources/icons/LOGOV2.6.png, h15; align:L; valign:B;');
    $table1->easyCell('Archived Appoinments', 'font-size:20; font-style:B; font-color:#F05F79; valign:B;');
    $table1->printRow();

    $table1->rowStyle('font-size:15; font-style:B;');
    $table1->easyCell($header);

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
        $table = new easyTable($pdf, 12);
        $table->easyCell('Archived Appointment', 'colspan:12; bgcolor:#faa2b2; font-color:#ffffff ; font-style:B;');
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

        $amounttxt = "\n<b>Amount : </b>" . $app["Amount"] . "\n\n";
        $col2txt .= $amounttxt;

        $IsDone = ($app["IsDone"]) ? "Done" : "Not Done";
        $donetxt = "\n<b>Is Done : </b>" . $IsDone;

        $col2txt .= $donetxt;



        $table->rowStyle('min-height:20; align:{L}');   // let's adjust the height of this row
        $table->easyCell($data, 'colspan:3');
        $table->easyCell($appData, 'colspan:4');
        $table->easyCell($col2txt, 'colspan:5');
        $table->printRow();

        $table->endTable(10);

        $appNum++;
    }





    $pdf->Output();
} else {
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



    $pdf->SetTitle("Appointment");

    $table1 = new easyTable($pdf, 2);
    $table1->easyCell('', 'img:../resources/icons/LOGOV2.6.png, h15; align:L; valign:B;');
    $table1->easyCell('Appointments', 'font-size:25; font-style:B; font-color:#F05F79; valign:B;');
    $table1->printRow();

    $table1->rowStyle('font-size:15; font-style:B;');
    $table1->easyCell($header);

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
        $table = new easyTable($pdf, 12);
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

        $amounttxt = "\n<b>Amount : </b>" . $app["Amount"] . "\n\n";
        $col2txt .= $amounttxt;

        $IsDone = ($app["IsDone"]) ? "Done" : "Not Done";
        $donetxt = "\n<b>Is Done : </b>" . $IsDone;

        $col2txt .= $donetxt;



        $table->rowStyle('min-height:20; align:{L}');   // let's adjust the height of this row
        $table->easyCell($data, 'colspan:3');
        $table->easyCell($appData, 'colspan:4');
        $table->easyCell($col2txt, 'colspan:5');
        $table->printRow();

        $table->endTable(10);

        $appNum++;
    }





    $pdf->Output();
}
