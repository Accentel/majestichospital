<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
//$reportval=$_REQUEST['report'];
$count=0;
$text="Sales Return Report";


$sql = mysqli_query($link,"select * from organization")or die(mysqli_error($link));
if($sql){
$res = mysqli_fetch_array($sql);
$orgname = $res['orgname'];
$addr = $res['address'];
$phone = $res['phone'];
$mob = $res['mobile'];
$email = $res['email'];
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

$sdate=$_REQUEST['s_date'];
$edate=$_REQUEST['e_date'];

$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(16, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'From Date : ', 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, $sdate , 0, 0, 'L', FALSE);
$pdf->Cell(26, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'To Date : ', 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, $edate , 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(6, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'S.No.', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Prd. Code', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Prd. Name', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Cust. Name', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'R.Qty', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Value', 0, 1, 'C', FALSE);


$array_count = 0;
$sdate = date('Y-m-d',strtotime($sdate));
$edate = date('Y-m-d',strtotime($edate));

$qry1=mysqli_query($link,"select a.product_code,a.product_name,b.cust_name,a.r_qty,a.value from phr_salreturn_dtl as a,phr_salreturn_mast as b where a.lr_no=b.lr_no AND a.currentdate between '$sdate' and '$edate'")or die(mysqli_error($link));

if($qry1){
$sum=0;	
$pdf->SetFont('Arial','',10);
while($row1 = mysqli_fetch_array($qry1)){	
$cust_name=$row1[2];
$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}

$count++;
$pdf->SetFont('Arial','',10);
$pdf->Cell(6, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $count, 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $row1[0], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $row1[1], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $cust_name, 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $row1[3], 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $row1[4], 0, 1, 'C', FALSE);

$sum = $sum+$row1[4];
}//inner while		
}
$pdf->SetFont('Arial','B',10);
$pdf->Cell(6, 10,'', 0, 1, 'C', FALSE);
$pdf->Cell(6, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Total', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, number_format($sum,2), 0, 1, 'C', FALSE);
if($count==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 	
 ?>