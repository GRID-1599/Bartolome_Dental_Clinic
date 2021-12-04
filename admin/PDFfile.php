<?php
require "fpdf/fpdf.php";

class PDFfile extends FPDF
{
    public  $pageTitle = '';
    // for pageTitle initialization 
    function __construct($pageTitle)
    {
        parent::__construct('P', 'mm', 'A4');
        $this->pageTitle = $pageTitle;
        $this->SetTitle($pageTitle);
    }

    // Page header
    function Header()
    {
        // Logo
        $this->Image('../resources/icons/LOGOV2.6.png', 15, 12, 75);
        // Arial bold 15
        $this->SetFont('helvetica', 'B', 18);
        // Move to the right
        $this->Cell(80);
        // pageTitle
        $pageTitle = $this->pageTitle;
        $w = $this->GetStringWidth($pageTitle) + 6;
        $this->SetX((210 - $w) / 2);
        // $pageTitle = "patient";
        $this->SetTextColor(255, 20, 147);
        $this->Cell(100, 20, $pageTitle, 0, 1, 'R');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', '', 10);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }

}



