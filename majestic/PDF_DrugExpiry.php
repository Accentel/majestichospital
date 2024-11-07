<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$reportval=$_REQUEST['report'];

$text="Drug Expiry Report";


$sql = mysqli_query($link,"select * from pharmacydetaisl")or die(mysqli_error($link));
if($sql){
$res = mysqli_fetch_array($sql);
$orgname = $res['pharmacyname'];
$addr = $res['address'];
$phone = $res['phoneno'];
$mob = $res['mobileno'];
//$email = $res['email'];
}
$pdf->SetFont('Arial','',18);
$pdf->Cell(186, 6, $orgname, 0, 1, 'C', FALSE);
$pdf->SetFont('Arial','',12);
$pdf->Cell(186, 6, $addr, 0, 1, 'C', FALSE);
$pdf->Cell(186, 6, 'Phone : '.$phone, 0, 1, 'C', FALSE);

$pdf->SetFont('Arial','',14);
$pdf->Cell(156, 10, '', 0, 1, 'C', FALSE);
$pdf->Cell(186, 6, $text , 0, 1, 'C', FALSE);
$pdf->SetFont('Arial','',10);


$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(6, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(30, 6, 'Type Of Drug', 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, 'Drug Name', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Batch No', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'qty', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Exp.Date', 0, 0, 'C', FALSE);
$pdf->Cell(30, 6, 'Days To Expire', 0, 1, 'C', FALSE);


if($reportval == "All")		
{
$qry1=mysqli_query($link,"select c.prdtype_name,a.product_name,a.batch_no,exp_date,DATEDIFF(exp_date,CURDATE()),balance_qty FROM phr_purinv_dtl as a,phr_prddetails_mast as b,phr_prdtype_mast as c WHERE a.product_name=b.PRD_NAME and b.type=c.PRDTYPE_NAME and exp_date < ADDDATE(CURDATE(), INTERVAL 90 DAY  )")or die(mysqli_error($link));
}
if($reportval == "Datewise")
{
$start_dt=date('Y-m-d',strtotime($_REQUEST['st_dt']));
 $end_dt=date('Y-m-d',strtotime($_REQUEST['end_dt']));
 
$qry1=mysqli_query($link,"select c.prdtype_name,a.product_name,a.batch_no,exp_date,DATEDIFF(exp_date,CURDATE()),balance_qty FROM phr_purinv_dtl as a,phr_prddetails_mast as b,phr_prdtype_mast as c WHERE a.product_name=b.PRD_NAME and b.type=c.PRDTYPE_NAME   and  exp_date  BETWEEN '$start_dt' AND '$end_dt'")or die(mysqli_error($link));
}
$cop = 0;
$tot=0;

$pdf->SetFont('Arial','',10);
while($row1 = mysqli_fetch_array($qry1)){	

$diff=$row1[4];

$pdf->Cell(6, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(30, 6, $row1[0], 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, $row1[1], 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $row1[2], 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $row1[5], 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, date('d-m-Y',strtotime($row1[3])), 0, 0, 'C', FALSE);
if($diff > 0){
$pdf->Cell(30, 6, $diff.' days', 0, 1, 'C', FALSE);
}else{
$pdf->Cell(30, 6, 'Expired', 0, 1, 'C', FALSE);
}
$cop++;
	 
}//inner while		


if($cop==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 	
 ?>	