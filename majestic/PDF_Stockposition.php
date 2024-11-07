<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();

$text="Stock Position";
$reporttype=$_REQUEST['reporttype'];
$prdnames = $_REQUEST['prdnames'];
$prdtype=$_REQUEST['ptype'];
$tot1=0;
$tot2 = 0;
$tot3= 0;

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



if($reporttype != "All")
{
$rtype = $_REQUEST['rtype'];
$batno = $_REQUEST['batno'];
$sdate1=$_REQUEST['fdate'];
$edate1=$_REQUEST['tdate'];
 
$sdate=date('Y-m-d',strtotime($_REQUEST['fdate']));
$edate=date('Y-m-d',strtotime($_REQUEST['tdate']));
 
$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(16, 6, '', 0, 0, 'R', FALSE);
$pdf->Cell(46, 6, 'From Date : '.$sdate1, 0, 0, 'L', FALSE);
$pdf->Cell(46, 6, '', 0, 0, 'R', FALSE);
$pdf->Cell(46, 6, 'To Date : '.$edate1, 0, 1, 'L', FALSE);
}

	$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
	//$pdf->Cell(20, 6, 'Product Code', 120, 0, 'C', FALSE);
	$pdf->Cell(40, 6, 'Product Name', 0, 0, 'C', FALSE);
	//$pdf->Cell(20, 6, 'UOM', 120, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'BatchNo', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'Ex.Date', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'QTY', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'Amount', 0, 1, 'C', FALSE);
	

if($reporttype == "All")
{
 $x="select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date 
from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype' and  a.product_name=b.PRD_NAME";
$qry=mysqli_query($link,$x)or die(mysqli_error($link));
}else{
if($rtype == "e"){
$qry=mysqli_query($link,"select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype' and a.product_code='$prdnames' and a.product_code=b.prd_code AND a.exp_date between '$sdate' and '$edate'")or die(mysqli_error($link));

}
else
{
$qry=mysqli_query($link,"select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype'  and a.product_name=b.PRD_NAME AND a.currentdate between '$sdate' and '$edate'  ")or die(mysqli_error($link));
}
}
$counts = 0;
while($res = mysqli_fetch_array($qry)){


$pdf->SetFont('Arial','',10);

$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $res[0], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $res[1], 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $res[2], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[5], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, date('d-m-Y',strtotime($res[6])), 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[4], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[3], 0, 1, 'C', FALSE);
$tot2=($res[3]*$res[4]);
$tot3=$tot3+$tot2;


$counts++;
}
$tot1 = $tot3;

$pdf->SetFont('Arial','',10);
$pdf->Cell(16, 6, '', 20, 0, 'R', FALSE);
$pdf->Cell(106, 6, 'Total Cost = '.$tot1, 0, 1, 'L', FALSE);

if($counts==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 	
 ?>