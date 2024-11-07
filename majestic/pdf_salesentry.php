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
$text="Sales Entry Report";


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

$prdcode=$_REQUEST['prdcode'];
$sdate=$_REQUEST['s_date'];
$edate=$_REQUEST['e_date'];
$ctype = $_REQUEST['ctype'];
$cname = $_REQUEST['cname'];
$cname1 = $_REQUEST['cname1'];
if($ctype == "c"){ $ct = "Customer / OP";}elseif($ctype == "p"){ $ct = "IP Patients"; }
if($cname != ""){ $cn = $cname;}elseif($cname1 != ""){ $cn = $cname1; }

$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(16, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'From Date : ', 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, $sdate , 0, 0, 'L', FALSE);
$pdf->Cell(26, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'To Date : ', 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, $edate , 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);
if(($ctype != "" && $cname != "") || ($ctype != "" && $cname1 != "") ){

$pdf->Cell(16, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, 'Customer Type : ', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, $ct , 0, 0, 'L', FALSE);
$pdf->Cell(26, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, 'Consultant Name : ', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, $cn , 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);
}
$pdf->SetFont('Arial','B',10);

$pdf->Cell(4, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'S.No.', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Rec. No.', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Pat. Name', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Prd. Name', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Batch No.', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Qty', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Value', 0, 1, 'C', FALSE);


$array_count = 0;
$sdate = date('Y-m-d',strtotime($sdate));
$edate = date('Y-m-d',strtotime($edate));
if($prdcode != "")	
{
	$qry1=mysqli_query($link,"select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and b.sal_date between '$sdate' and '$edate' and c.PRODUCT_CODE='$prdcode' ")or die(mysqli_error($link));

}
elseif($ctype != "" && $cname != ""){
	$qry1=mysqli_query($link,"select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and b.sal_date between '$sdate' and '$edate' and b.customer_type='p' and b.consultant_name='$cname'")or die(mysqli_error($link));

}elseif($ctype != "" && $cname1 != ""){
	$qry1=mysqli_query($link,"select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and b.sal_date between '$sdate' and '$edate' and b.customer_type='c' and b.consultant_name='$cname1'")or die(mysqli_error($link));

}else {
$qry1=mysqli_query($link,"select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and b.sal_date between '$sdate' and '$edate' order by a.lr_no desc")or die(mysqli_error($link));

}

if($qry1){
$sum = 0;	
$pdf->SetFont('Arial','',10);
while($row1 = mysqli_fetch_array($qry1)){	
$cust_name=$row1[2];
$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}

$count++;
$pdf->SetFont('Arial','',10);
$pdf->Cell(4, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $count, 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row1[5], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $cust_name, 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $row1[1], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row1[6], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row1[3], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $row1[4], 0, 1, 'C', FALSE);

$sum = $sum+$row1[4];
}//inner while		
}
$pdf->SetFont('Arial','B',10);
$pdf->Cell(4, 10,'', 0, 1, 'C', FALSE);
$pdf->Cell(4, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Total', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, number_format($sum,2), 0, 1, 'C', FALSE);
if($count==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	


$pdf->Output(); 
	
 ?>
 
 