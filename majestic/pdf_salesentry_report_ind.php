<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$reportval=$_REQUEST['report'];
$count=0;
$text="Sales Entry Report";


$sql = mysql_query("select * from pharmacydetaisl");
if($sql){
$res = mysql_fetch_array($sql);
$orgname = $res['pharmacyname'];
$addr = $res['address'];
$phone = $res['phoneno'];
$mob = $res['mobileno'];
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

$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(16, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Date : ', 0, 0, 'C', FALSE);
$pdf->Cell(46, 6, $sdate , 0, 1, 'L', FALSE);

$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(4, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'S.No.', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Product Code', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Open Stock', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Sale Qty', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Return Qty', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'Bal Qty', 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, 'BF Qty', 0, 1, 'C', FALSE);


$array_count = 0;
$sdate = date('Y-m-d',strtotime($sdate));
if($prdcode != "")	
{
 $pp="select distinct PRODUCT_CODE,PRD_NAME from phr_salent_dtl as a,phr_prddetails_mast as b where a.PRODUCT_CODE=b.PRD_NAME and a.current ='$sdate' and PRODUCT_CODE not in (select distinct product_code from phr_salreturn_dtl as a,phr_prddetails_mast as b where a.product_code=b.PRD_NAME and a.currentdate ='$sdate')  order by b.prd_name";
$qry1=mysql_query($pp);

$pdf->SetFont('Arial','',10);
while($row1 = mysql_fetch_array($qry1)){	

 $product_code=$row1[0];

$qry2=mysql_query("select sum(balance_qty) from phr_purinv_mast as a,phr_purinv_dtl as b where a.lr_no=b.lr_no and PRODUCT_NAME='$prdcode' group by PRODUCT_NAME ");
while($row2 = mysql_fetch_array($qry2)){
 $bal_qty=$row2[0];
}
echo $nm="select sum(u_qty) from phr_salent_mast as a,phr_salent_dtl as b where a.lr_no=b.lr_no and a.current ='$sdate' and PRODUCT_CODE='$prdcode' group by PRODUCT_CODE";
$qry3=mysql_query($nm);
while($row3 = mysql_fetch_array($qry3)){
$u_qty=$row3[0];
}
$qry4=mysql_query("select sum(r_qty) from phr_salreturn_mast as a,phr_salreturn_dtl as b where a.lr_no=b.lr_no and a.currentdate='$sdate' and PRODUCT_NAME='$prdcode' group by PRODUCT_NAME");
while($row4 = mysql_fetch_array($qry4)){
$r_qty=$row4[0];
}
$count++;
$pdf->SetFont('Arial','',10);
$pdf->Cell(4, 6,'', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $count, 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $prdcode, 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, (($bal_qty+$u_qty)-$r_qty), 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $u_qty, 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $r_qty, 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $bal_qty, 0, 0, 'C', FALSE);
$pdf->Cell(26, 6, $bal_qty, 0, 1, 'C', FALSE);


}//inner while		
}

if($count==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 	
 ?>