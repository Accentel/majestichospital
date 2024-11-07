<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();

$start_dt=$_REQUEST['s_date'];
$end_dt=$_REQUEST['e_date'];
$report=$_REQUEST['ptype'];
$tot6 = 0;
if($report == "PI")
{
	$text="Vat Report For Purchase Invoice";
}
if($report == "PR")
{
	$text="Vat Report For Purchase Returns";
}
if($report == "SE")
{
	$text="Vat Report For Sales Entry";
}
if($report == "SR")
{
	$text="Vat Report For Sales Returns";
}

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
$pdf->Cell(156, 10, '', 0, 1, 'C', FALSE);
$pdf->SetFont('Arial','B',10); 
$pdf->Cell(46, 6, 'From Date : ', 0, 0, 'R', FALSE);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(26, 6, $start_dt , 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, '', 0, 0, 'R', FALSE);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(46, 6, 'End Date : ', 0, 0, 'R', FALSE);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(26, 6, $end_dt , 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, '', 0, 1, 'C', FALSE);

if($report == "PI")
{
$pdf->SetFont('Arial','B',10);
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, 'Pro.Code', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, 'Pro.Name', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Supp.Name', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Qty', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(5%)', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(14.5%)', 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(15%)', 0, 1, 'C', FALSE);
		
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
$qry1=mysqli_query("select a.product_code,a.product_name,c.suppl_name,a.vat,a.s_qty,a.vat_amt from phr_purinv_dtl as a,phr_purinv_mast as b,phr_supplier_mast as c where a.lr_no=b.lr_no and b.suppl_code=c.suppl_code AND a.currentdate between '$sdate' and '$edate' ");

$counts = 0;
$tot1 = 0;
$tot2 = 0;
$tot3 = 0;
$pdf->SetFont('Arial','',10);
while($row1 = mysqli_fetch_array($qry1)){	
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $row1[0], 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, $row1[1], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $row1[2], 0, 0, 'L', FALSE);
$pdf->Cell(20, 6, $row1[4], 0, 0, 'C', FALSE);
$cost=$row1[5];
$vat=$row1[3];
if($vat==5.0 || $vat==4.0)
	{
		$tot3=$cost;
		$pdf->Cell(20, 6, $cost, 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 1, 'C', FALSE);	
		$tot1=$tot1+$tot3;
	}
if($vat==14.5 || $vat==12.5)
	{
		 $tot4=$cost;
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, $cost, 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 1, 'C', FALSE);
		$tot2=$tot2+$tot4;
	}
if($vat==15.0)
	{
		 $tot5=$cost;	
		 $pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, $cost, 0, 1, 'C', FALSE);
		$tot6=$tot6+$tot5;
	}	

$counts++;
	 
}//inner while		
}
if($report == "PR")
{
$pdf->SetFont('Arial','B',10);
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, 'Pro.Code', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, 'Pro.Name', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Supp.Name', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Qty', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(5%)', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(14.5%)', 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(15%)', 0, 1, 'C', FALSE);
		
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
$qry1=mysqli_query($link,"select a.product_code,d.product_name,c.suppl_name,d.vat,a.r_qty,(a.r_qty*d.vat)/100 from phr_pur_returns_dtl as a,phr_pur_returns_mast as b,phr_supplier_mast as c,phr_purinv_dtl as d where a.lr_no=b.lr_no and a.inv_id=d.inv_id and b.suppl_code=c.suppl_code AND a.currentdate between '$sdate' and '$edate' ")or die(mysqli_error($link));

$counts = 0;
$tot1 = 0;
$tot2 = 0;
$tot3 = 0;
$pdf->SetFont('Arial','',10);
while($row1 = mysqli_fetch_array($qry1)){	
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $row1[0], 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, $row1[1], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $row1[2], 0, 0, 'L', FALSE);
$pdf->Cell(20, 6, $row1[4], 0, 0, 'C', FALSE);
$cost=$row1[5];
$vat=$row1[3];
if($vat==5.0 || $vat==4.0)
	{
		$tot3=$cost;
		$pdf->Cell(20, 6, $cost, 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 1, 'C', FALSE);	
		$tot1=$tot1+$tot3;
	}
if($vat==14.5 || $vat==12.5)
	{
		 $tot4=$cost;
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, $cost, 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 1, 'C', FALSE);
		$tot2=$tot2+$tot4;
	}
if($vat==15.0)
	{
		 $tot5=$cost;	
		 $pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, $cost, 0, 1, 'C', FALSE);
		$tot6=$tot6+$tot5;
	}	

$counts++;
	 
}//inner while		
}
if($report == "SE")
{
$pdf->SetFont('Arial','B',10);
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, 'Pro.Code', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, 'Pro.Name', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Cust.Name', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Qty', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(5%)', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(14.5%)', 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(15%)', 0, 1, 'C', FALSE);
		
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
$qry1=mysqli_query($link,"select d.product_code,d.product_name,b.cust_name,d.vat,a.value,u_qty from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as d where a.lr_no=b.lr_no and a.inv_id=d.inv_id and b.current between '$sdate' and '$edate'")or die(mysqli_error($link));

$counts = 0;
$tot1 = 0;
$tot2 = 0;
$tot3 = 0;
$pdf->SetFont('Arial','',10);
while($row1 = mysqli_fetch_array($qry1)){
$cust_name=$row1[2];
 $sql = mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
while($row = mysqli_fetch_array($sql)){ $cust_name=$row[0];}
	
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $row1[0], 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, $row1[1], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $cust_name, 0, 0, 'L', FALSE);
$pdf->Cell(20, 6, $row1[5], 0, 0, 'C', FALSE);
$cost=$row1[4];
$vat=$row1[3];
if($vat==5.0 || $vat==4.0)
	{
		$tot3=round(($vat/100)*$cost);
		$pdf->Cell(20, 6, $tot3, 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 1, 'C', FALSE);	
		$tot1=$tot1+$tot3;
	}
if($vat==12.5)
	{
		 $tot4=round(($vat/100)*$cost);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, $tot4, 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 1, 'C', FALSE);
		$tot2=$tot2+$tot4;
	}
if($vat==15.0)
	{
		 $tot5=round(($vat/100)*$cost);
		 $pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, $tot5, 0, 1, 'C', FALSE);
		$tot6=$tot6+$tot5;
	}	

$counts++;
	 
}//inner while		
}
if($report == "SR")
{
$pdf->SetFont('Arial','B',10);
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, 'Pro.Code', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, 'Pro.Name', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, 'Cust.Name', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'Qty', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(5%)', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(14.5%)', 0, 'C', FALSE);
$pdf->Cell(20, 6, 'VAT(15%)', 0, 1, 'C', FALSE);
		
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
$qry1=mysqli_query($link,"select a.product_code,a.product_name,b.cust_name,d.vat,a.value,r_qty from phr_salreturn_dtl as a,phr_salreturn_mast as b,phr_purinv_dtl as d where a.lr_no=b.lr_no and a.batch_no=d.batch_no and a.product_code=d.product_code and b.currentdate between '$sdate' and '$edate'  ")or die(mysqli_error($link));

$counts = 0;
$tot1 = 0;
$tot2 = 0;
$tot3 = 0;
$pdf->SetFont('Arial','',10);
while($row1 = mysqli_fetch_array($qry1)){
$cust_name=$row1[2];
 $sql = mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
while($row = mysqli_fetch_array($sql)){ $cust_name=$row[0];}
	
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
//$pdf->Cell(20, 6, $row1[0], 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, $row1[1], 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, $cust_name, 0, 0, 'L', FALSE);
$pdf->Cell(20, 6, $row1[5], 0, 0, 'C', FALSE);
$cost=$row1[4];
$vat=$row1[3];
if($vat==5.0 || $vat==4.0)
	{
		$tot3=round(($vat/100)*$cost);
		$pdf->Cell(20, 6, $tot3, 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 1, 'C', FALSE);	
		$tot1=$tot1+$tot3;
	}
if($vat==12.5)
	{
		 $tot4=round(($vat/100)*$cost);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, $tot4, 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 1, 'C', FALSE);
		$tot2=$tot2+$tot4;
	}
if($vat==15.0)
	{
		 $tot5=round(($vat/100)*$cost);
		 $pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, "---", 0, 0, 'C', FALSE);
		$pdf->Cell(20, 6, $tot5, 0, 1, 'C', FALSE);
		$tot6=$tot6+$tot5;
	}	

$counts++;
	 
}//inner while		
}
$pdf->Cell(6, 10, '', 0, 1, 'C', FALSE);
$pdf->Cell(6, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(36, 6, '', 0, 0, 'C', FALSE);
$pdf->Cell(40, 6, '', 0, 0, 'L', FALSE);
$pdf->Cell(20, 6, 'Grand Total :', 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $tot1, 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $tot2, 0, 0, 'C', FALSE);
$pdf->Cell(20, 6, $tot6, 0, 1, 'C', FALSE);



if($counts==0)
{
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(156, 6, '', 20, 1, 'L', FALSE);
	$pdf->Cell(46, 6, 'No Records', 0, 0, 'C', FALSE);
}
	
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 	
 ?>