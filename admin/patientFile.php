<?php

if (!isset($_GET["patientId"])) {
    exit();
}
$patientId = $_GET["patientId"];
require 'PDFfile.php';
include_once '../classes/patient.class.php';
$patient_obj = new Patient();
$patient = $patient_obj->getPatientById($patientId);



$pdf = new PDFfile("Patient " . $patientId);
$pdf->AliasNbPages();
$pdf->AddPage();

// for ($i = 1; $i <= 40; $i++)
//     $pdf->Cell(0, 10, 'Printing line number ' . $i, 0, 1);
$bday = date_create($patient["Birthday"]);
$colH = 8;
$cellMargin = 10;

$pdf->Cell($cellMargin);
$pdf->SetFont('Arial', 'b', 12);

$pdf->Cell(0, 15, 'Patient Information ', 0, 2, 'L');

// $pdf->Cell($cellMargin);
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, $colH, 'Patient Id :          ' . $patientId, 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Patient Name :    ' . $patient["Name"], 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Nickname :          ' . $patient["Nickname"], 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Birthday :             ' . date_format($bday, "M d, Y"), 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Age :                    ' . $patient["Age"], 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Gender :              ' . $patient["Gender"], 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Civil Status :        ' . $patient["Civil_Status"], 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Address :             ' . $patient["Address"], 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Email :                 ' . $patient["Email"], 0, 1);
$pdf->Cell($cellMargin);
$pdf->Cell(0, $colH, 'Contact :              ' . $patient["Contact"], 0, 1);
$pdf->Cell($cellMargin);

$pdf->Cell(0, 5, '', 0, 1);
$pdf->Cell($cellMargin);

$pdf->SetFont('Arial', 'b', 12);
$pdf->Cell(0, 15, 'Notes ', 0, 2, 'L');

$patient_notes = $patient_obj->getPatientNote($_GET["patientId"]);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(32, 32, 32);

foreach ($patient_notes as $note) {
    $note_body = $note["Note"];
    
    $pdf->Cell($cellMargin);
    $pdf->MultiCell(0, 6, 'Note :       ' . $note_body, 0, 0);
    $pdf->Cell(0, 5, '', 0, 1);
    $pdf->Cell($cellMargin);

}



$pdf->Output();
