<?php
require 'vendor/autoload.php';
include("config.php");
error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 1); // Display errors on the screen


$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();

$text="Purchase Entry Report";
$start_dt=$_REQUEST['s_date'];
$end_dt=$_REQUEST['e_date'];

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
$pdf->Cell(206, 6, $orgname, 0, 1, 'C', FALSE);
$pdf->SetFont('Arial','',12);
$pdf->Cell(206, 6, $addr, 0, 1, 'C', FALSE);
$pdf->Cell(206, 6, 'Phone : '.$phone, 0, 1, 'C', FALSE);

$pdf->SetFont('Arial','',14);
$pdf->Cell(206, 10, '', 0, 1, 'C', FALSE);
$pdf->Cell(206, 6, $text , 0, 1, 'C', FALSE);
$pdf->Cell(206, 10, '', 0, 1, 'C', FALSE);
$pdf->SetFont('Arial','B',10); 
$pdf->Cell(46, 6, 'From Date : ', 0, 0, 'R', FALSE);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(46, 6, $start_dt , 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, '', 0, 0, 'R', FALSE);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(46, 6, 'End Date : ', 0, 0, 'R', FALSE);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(26, 6, $end_dt , 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, '', 0, 1, 'C', FALSE);

$pdf->SetFont('Arial','B',10);
//$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, 'Pro.Code', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, 'Pro.Name', 0, 0, 'C', FALSE);
$pdf->Cell(80, 6, 'Supp.Name', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Exp.Dt', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'SQty', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Pur.Date', 0, 0, 'C', FALSE);
$pdf->Cell(15, 6, 'Value', 0, 1, 'C', FALSE);
		
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
 $x="select a.product_code,a.product_name,c.suppl_name,a.exp_date,a.s_qty,a.vat,a.value,a.CURRENTDATE from
 phr_purinv_dtl as a,phr_purinv_mast as b,phr_supplier_mast as c where a.lr_no=b.lr_no and b.suppl_code=c.suppl_code AND
  a.currentdate between '$sdate' and '$edate' ";
$qry1=mysqli_query($link,$x)or die(mysqli_error($link));

$counts = 0;
$tot1 = 0;
$tot2 = 0;
$tot3 = 0;
$pdf->SetFont('Arial','',10);
while($row1 = mysqli_fetch_array($qry1)){	
//$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $row1[0], 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, $row1[1], 0, 0, 'C', FALSE);
$pdf->Cell(80, 6, $row1[2], 0, 0, 'L', FALSE);
$pdf->Cell(20, 6, $row1[3], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row1[4], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row1['CURRENTDATE'], 0, 0, 'C', FALSE);
$pdf->Cell(15, 6, $row1[6], 0, 1, 'C', FALSE);	
$tot2=$row1[6];
$tot3=($tot3+$tot2);
$counts++;
	 
}//inner while		
$tot1=$tot3;

$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Total Price : ', 0, 0, 'R', FALSE);
$pdf->Cell(26, 6, $tot1.'.00', 0, 1, 'L', FALSE);


if($counts==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 	
 ?>