<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();

$text="Patient Report";
//$reportval=$_REQUEST['report'];
//$dept_code=$_REQUEST['doc'];
$f1=$_REQUEST['f'];
$f=date('Y-m-d', strtotime($f1));
$t1=$_REQUEST['t'];
$t=date('Y-m-d', strtotime($t1));
$k=$_REQUEST['k'];

$sql = mysql_query("select * from organization");
if($sql){
$res = mysql_fetch_array($sql);
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
$pdf->Cell(186, 10, '', 0, 1, 'C', FALSE);
$pdf->Cell(186, 6, $text , 0, 1, 'C', FALSE);

$pdf->Cell(186, 16, '', 20, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(16, 6, 'S.No.', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Reg No.', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Reg Date', 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, 'Pat Name', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Pat Type', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Age', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Gender', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Reg Fee', 0, 1, 'C', FALSE);

$pdf->Cell(156, 4, '', 20, 1, 'R', FALSE);
 $start_dt=$_REQUEST['f'];
 $end_dt=$_REQUEST['t'];
 if($k!='All'){
 
  $x="SELECT distinct registerno,patientname,pat_type,date,age,gender,registerfee FROM patientregister where pat_type='$k' and 
 date between '$f' and '$t'";
 } else {
  $x="SELECT distinct registerno,patientname,pat_type,date,age,gender,registerfee FROM patientregister where 
 date between '$f' and '$t'";
 }
 
$qry=mysql_query($x);

$counts = 0;
$tot=0;
while($row = mysql_fetch_array($qry)){
$counts++;
$pdf->SetFont('Arial','',12);
$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(16, 6, $counts, 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $row[0], 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $row[3], 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, $row[1], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row[2], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row[4], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row[5], 0, 0, 'C', FALSE);

$pdf->Cell(20, 6, $row[6].".00", 0, 1, 'R', FALSE);	
$tot = round($tot +$row[6]);
 
}//inner while		


$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(16, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(30, 6, 'Total Amount', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $tot.".00", 0, 1, 'R', FALSE);
 

if($counts==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 	
 ?>