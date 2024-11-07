<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();

$text="Over All Stock Position";
$rtype1=$_REQUEST['reporttype'];
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



if($rtype1 == "All" || $rtype1 == "Datewise")
{
 
$qry1=mysqli_query($link,"select distinct b.TYPE,c.PRDTYPE_NAME  from phr_purinv_dtl as a,phr_prddetails_mast as b,phr_prdtype_mast as c where a.PRODUCT_NAME=b.PRD_NAME and b.TYPE=c.PRDTYPE_NAME order by PRDTYPE_NAME ")or die(mysqli_error($link));

while($row = mysqli_fetch_array($qry1)){ 
$type_tot=0;
$z=0;
	$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(16, 6, '', 0, 0, 'R', FALSE);
	$pdf->Cell(106, 6, 'Product Type : '.$row[1], 0, 1, 'L', FALSE);
	
	$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'SNO', 120, 0, 'C', FALSE);
	$pdf->Cell(40, 6, 'Product Name', 0, 0, 'C', FALSE);
	//$pdf->Cell(20, 6, 'UOM', 120, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'BatchNo', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'Ex.Date', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'QTY', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'Amount', 0, 1, 'C', FALSE);

if($rtype1 == "All")
{
 $X="select distinct a.PRODUCT_CODE,a.PRODUCT_NAME,a.PACKING_TYPE,round((a.balance_qty*a.MRP)),a.balance_qty,a.BATCH_NO,a.EXP_DATE,a.MRP,a.noitems,a.S_QTY from phr_purinv_dtl as a,phr_prddetails_mast as b where b.TYPE='$row[0]' and a.PRODUCT_NAME=b.PRD_NAME  and a.balance_qty>0 order by a.PRODUCT_NAME";
$qry=mysqli_query($link,$X) or die(mysqli_error($link));
}

elseif($rtype1 == "Datewise")
{
$aa=$_REQUEST['aa'];
$bb=$_REQUEST['bb'];

$qry=mysqli_query($link,"select distinct a.product_code,a.product_name,a.packing_type,round((a.balance_qty*a.mrp)),a.balance_qty,a.batch_no,a.exp_date,mrp,noitems,s_qty from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$row[0]' and a.product_code=b.PRD_code and a.balance_qty>0 and upper(substr(a.product_name,1,1)) between '$aa' and '$bb' order by a.product_name")or die(mysqli_error($link));
}
$counts = 0;
$i=1;
while($res = mysqli_fetch_array($qry)){
$z++;

$pdf->SetFont('Arial','',10);

$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $i, 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $res[1], 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $res[2], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[5], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[6], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[4], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[3], 0, 1, 'C', FALSE);
$tot2=$res[3];
$tot3=$tot3+$tot2;
$type_tot=$type_tot+$tot2;

$counts++;
$i++;
}
if($z==0){
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(106, 6, 'No '.$row[1].' In  Central Store ', 0, 0, 'L', FALSE);
}
$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(106, 6, 'Total Amount For '.$row[1].' : '.$type_tot, 0, 1, 'L', FALSE);
   
}
}else{
$ptype=$_REQUEST['ptype'];		
//$aa=$_REQUEST['aa'];
//$bb=$_REQUEST['bb'];
//$qry1=mysqli_query("select distinct b.type,PRDTYPE_NAME  from phr_purinv_dtl as a,phr_prddetails_mast as b,phr_prdtype_mast as c where a.PRODUCT_NAME=b.PRD_NAME and b.type=c.PRDTYPE_CODE and b.type='$ptype'");

//while($row = mysqli_fetch_array($qry1)){ 
$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(16, 6, '', 0, 0, 'R', FALSE);
	$pdf->Cell(106, 6, 'Product Type : '.$ptype, 0, 1, 'L', FALSE);
	
	
	
//}
$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(16, 6, '', 0, 0, 'R', FALSE);
	
	
	$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
	//$pdf->Cell(20, 6, 'Product Code', 120, 0, 'C', FALSE);
	$pdf->Cell(40, 6, 'Product Name', 0, 0, 'C', FALSE);
	//$pdf->Cell(20, 6, 'UOM', 120, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'BatchNo', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'Ex.Date', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'QTY', 0, 0, 'C', FALSE);
	$pdf->Cell(20, 6, 'Amount', 0, 1, 'C', FALSE);
	$qry=mysqli_query($link,"select distinct a.product_code,a.product_name,a.packing_type,round((a.balance_qty*a.mrp)),a.balance_qty,a.batch_no,a.exp_date,mrp,noitems,s_qty from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$ptype' and a.product_code=b.PRD_code and a.balance_qty>0 order by a.product_name")or die(mysqli_error($link));
$counts = 0;
while($res = mysqli_fetch_array($qry)){
	
$pdf->SetFont('Arial','',10);

$pdf->Cell(10, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $res[0], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $res[1], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[2], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[5], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, date('d-m-Y',strtotime($res[6])), 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[4], 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $res[3], 0, 1, 'C', FALSE);
$tot2=$res[3];
$tot3=$tot3+$tot2;
$type_tot=$type_tot+$tot2;

$counts++;
}
}
$tot1=$tot3;
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