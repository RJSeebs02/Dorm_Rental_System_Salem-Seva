<?php
// ob_start();

include_once '../class/class.customer.php';
include '../config/config.php';
require('../fpdf185/fpdf.php');

$customer = new Customer();

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
        $this->Cell(0,6,"- Customer Reports -",0,1,'C',1);
    
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
$pdf->Cell(10,12,"No.",1,0,'C');
$pdf->Cell(45,12,"Name",1,0,'C');
$pdf->Cell(50,12,"E-mail",1,0,'C');
$pdf->Cell(33,12,"Home Address",1,0,'C');
$pdf->Cell(30,12,"Contact No.",1,0,'C');
$pdf->Cell(22,12,"Status",1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$count = 1;
if($customer->list_customers() != false){
    foreach($customer->list_customers() as $value){
        extract($value);
                $pdf->Cell(10,12,"  ".$count,0,0,'L');
                $pdf->Cell(45,12,$cust_fname.' '.$cust_mname.' '.$cust_lname,0,0,'L');
                $pdf->Cell(50,12,$cust_email,0,0,'L');
                $pdf->Cell(33,12,$cust_address,0,0,'L');
                $pdf->Cell(30,12,$cust_cnumber,0,0,'L');
                $pdf->Cell(22,12,$cust_status,0,0,'L');
                $pdf->Ln(6);
                $count++;
    }
}	

$pdf->Output();

// ob_end_flush();
?>