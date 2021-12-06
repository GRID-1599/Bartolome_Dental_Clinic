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

    function SetCol($col)
    {
        // Set position at a given column
        $this->col = $col;
        $x = 10 + $col * 65;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function AcceptPageBreak()
    {
        // Method accepting or not automatic page break
        if ($this->col < 2) {
            // Go to next column
            $this->SetCol($this->col + 1);
            // Set ordinate to top
            $this->SetY($this->y0);
            // Keep on page
            return false;
        } else {
            // Go back to first column
            $this->SetCol(0);
            // Page break
            return true;
        }
    }

    function ChapterTitle($num, $label)
    {
        // Title
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(200, 220, 255);
        $this->Cell(0, 6, "Chapter $num : $label", 0, 1, 'L', true);
        $this->Ln(4);
        // Save ordinate
        $this->y0 = $this->GetY();
    }

    function ChapterBody($file)
    {
        // Read text file
        // $txt = file_get_contents($file);
        // Font
        $this->SetFont('Times', '', 12);
        // Output text in a 6 cm width column
        $this->MultiCell(100, 5, $file);
        $this->Ln();
        // Mention
        $this->SetFont('', 'I');
        $this->Cell(0, 5, '(end of excerpt)');
        // Go back to first column
        $this->SetCol(0);
    }

    function PrintChapter($num, $title, $file)
    {
        // Add chapter
        $this->AddPage();
        $this->ChapterTitle($num, $title);
        $this->ChapterBody($file);
    }
}
