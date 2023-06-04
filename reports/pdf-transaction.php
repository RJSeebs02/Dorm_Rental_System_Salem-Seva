<?php
// ob_start();

include_once '../class/class.transaction.php';
include '../config/config.php';
require('../fpdf185/fpdf.php');

$transaction = new Transaction();

class PDF extends FPDF
{
//Page header
function Header(){
	 
		//Arial 12
        $this->SetFont('Arial','B',12);
        //Background color
        $this->SetFillColor(260,200,255);
        //Title
        $this->Cell(0,6,"BACOLOD GATEWAY DORMITORY",0,1,'C',1);
    
        $this->SetFont('Arial','BI',10);
        $this->Cell(0,6,"89 C.L. Montelibano Ave, Bacolod, 6100 C.L. Montelibano Ave, Bacolod, 6100 Negros Occidental \n",0,1,'C',1);
    
        $this->Cell(0,6,"",0,1,'C',1);
    
        $this->SetFont('Arial','B',12);
        $this->Cell(0,6,"- Transaction Type -",0,1,'C',1);
    
        $this->SetFont('Arial','BIU',10);
        $this->Cell(0,6,"".date("Y-m-d")." ",0,1,'C',1);
        
        
       
        //Line break
        $this->Ln(4);
}
function BasicTable($header){
    //Header
    foreach($header as $col)
        $this->Cell(47,7,$col,0,0,'C');
	$this->Ln();
}
//Page footer
function Footer(){
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,0,"~ Date Generated ".date("Y-m-d h:i:s A")." ",0,1,'L');
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
// Default Header
//$header=array('Nbr','Name','Access Level','E-Mail');
//$pdf->BasicTable($header);
// Custom Header
$pdf->SetX(70);
$pdf->Cell(20,12,"No.",1,0,'C');
$pdf->Cell(50,12,"Description",1,0,'C');

$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$count = 1;
if($transaction->list_transactions() != false){
    foreach($transaction->list_transactions() as $value){
        extract($value);
                $pdf->SetX(70);
                $pdf->Cell(20,12,"  ".$count,0,0,'C');
                $pdf->Cell(50,12,$type_description,0,0,'C');

                $pdf->Ln(6);
                $count++;
    }
}	

$pdf->Output();

// ob_end_flush();
?>