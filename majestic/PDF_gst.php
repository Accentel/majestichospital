<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();

$text="Purchase Entry Report";
$start_dt=$_REQUEST['s_date'];
$end_dt=$_REQUEST['e_date'];

$sql = mysql_query("select * from pharmacydetaisl");
if($sql){
$res = mysql_fetch_array($sql);
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
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, 'Pro.Code', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, 'Total Purchase  Amount', 0, 0, 'C', FALSE);
//$pdf->Cell(74, 6, 'Supp.Name', 0, 0, 'C', FALSE);
//$pdf->Cell(15, 6, 'Exp.Dt', 0, 0, 'C', FALSE);
$pdf->Cell(15, 6, 'CGST', 0, 0, 'C', FALSE);
//$pdf->Cell(15, 6, 'SGST', 0, 0, 'C', FALSE);
//$pdf->Cell(15, 6, 'GST', 0, 1, 'C', FALSE);
		
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
  $x="select sum(VALUE) as amt, sum(sgst) as sgst1,sum(cgst) as cgst1,sum(sgst+cgst) as gst from phr_purinv_dtl where  
 currentdate between '$sdate' and '$edate' ";
$qry1=mysql_query($x);

$counts = 0;
$tot1 = 0;
$tot2 = 0;
$tot3 = 0;
$pdf->SetFont('Arial','',10);
while($row1 = mysql_fetch_array($qry1)){	
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, $row1[1], 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $row1[0], 0, 0, 'C', FALSE);
//$pdf->Cell(74, 6, $row1[1], 0, 0, 'C', FALSE);

$pdf->Cell(15, 6, $row1[2], 0, 0, 'C', FALSE);
//$pdf->Cell(15, 6, $row1[3], 0, 0, 'C', FALSE);
//$pdf->Cell(15, 6, $row1[4], 0, 0, 'C', FALSE);
//$pdf->Cell(15, 6, $row1[6], 0, 1, 'C', FALSE);	
//$tot2=$row1[6];
//$tot3=($tot3+$tot2);
$counts++;
	 
}//inner while		
//$tot1=$tot3;

//$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
//$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
//$pdf->Cell(46, 6, 'Total Price : ', 0, 0, 'R', FALSE);
//$pdf->Cell(26, 6, $tot1.'.00', 0, 1, 'L', FALSE);


if($counts==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 	
 ?>