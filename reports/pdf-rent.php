<?php
// ob_start();

include_once '../class/class.rent.php';
include '../config/config.php';
require('../fpdf185/fpdf.php');

$rent = new Rent();

class PDF extends FPDF
{
//Page header
function Header(){
	 
	//Arial 12
	$this->SetFont('Arial','',12);
	//Background color
	$this->SetFillColor(200,220,255);
	//Title
	$this->Cell(0,6,"System Administrators",0,1,'L',1);
	$this->SetFont('Arial','BIU',10);
	$this->Cell(0,6,"Date Generated ".date("Y-m-d h:i:s A")." ",0,1,'L',1);
	$this->SetFont('Arial','',12);
    
   
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
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
// Default Header
//$header=array('Nbr','Name','Access Level','E-Mail');
//$pdf->BasicTable($header);
// Custom Header
$pdf->Cell(10,12,"Nbr",1,0,'C');
$pdf->Cell(45,12,"Name",1,0,'C');
$pdf->Cell(45,12,"E-mail",1,0,'C');
$pdf->Cell(30,12,"Home Address",1,0,'C');
$pdf->Cell(22,12,"Contact No.",1,0,'C');
$pdf->Cell(20,12,"Room No.",1,0,'C');
$pdf->Cell(20,12,"Type",1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$count = 1;
if($rent->list_rent() != false){
    foreach($rent->list_rent() as $value){
        extract($value);
                $pdf->Cell(10,12,"  ".$count,0,0,'L');
                $pdf->Cell(45,12,$rent->get_cust_fname($cust_id).' '.$rent->get_cust_mname($cust_id).' '.$rent->get_cust_lname($cust_id),0,0,'L');
                $pdf->Cell(45,12,$rent->get_cust_email($cust_id),0,0,'L');
                $pdf->Cell(30,12,$rent->get_cust_address($cust_id),0,0,'L');
                $pdf->Cell(22,12,$rent->get_cust_cnumber($cust_id),0,0,'L');
                $pdf->Cell(20,12,$rent->get_room_number($room_id),0,0,'L');
                $pdf->Cell(20,12,$rent->get_transaction_type_description($type_id),0,0,'L');
                $pdf->Ln(6);
                $count++;
    }
}	

$pdf->SetFont('Arial','I',12);
$pdf->Cell(176,12,"--Nothing Follows--",0,0,'C');
$pdf->Output();

// ob_end_flush();
?>