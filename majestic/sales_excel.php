<?php
require_once("config.php");
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=marks_report_printexcel".date('d-m-Y').".xls");

header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header("Content-Disposition: attachment; filename=Pharmacy-Sales_Report".date('d-m-Y').".xls");

header('Cache-Control: max-age=0');
//$objWriter->save('php://output');

// $val5=$_REQUEST['d1'];
  //$val7=$_REQUEST['d2'];
 

//echo"<table border='1'><tr><th></th><th width='2%'>Location:</th><th>$val4</th><th >From Date:</th><th>$val5</th><th>Todate:</th><th>$val7</th></tr></table>";
//echo"<table width='100%'><tr><th >S NO</th><th width='10%' >Emp Id</th><th width='15%'>Employee Name</th>";
 
?>	
<?php
include("config.php");

if(isset($_POST['submit'])){
	$prdcode=$_REQUEST['prdcode'];
$sdate=$_REQUEST['fdate'];
$edate=$_REQUEST['tdate'];
$ctype = $_REQUEST['ctype'];
$cname = $_REQUEST['cname'];
$cname1 = $_REQUEST['cname1'];

$rs=mysql_query("select * from  pharmacydetaisl");
while($res = mysql_fetch_array($rs)){
$HOSP_NAME=$res['pharmacyname'];
$ADDR=$res['address'];     
     
$PHONE1=$res['phoneno'];

 }



?>
  <?php
//$sdate=$_REQUEST['d1'];
//$edate=$_REQUEST['d2'];


 $sdate=date('Y-m-d',strtotime($_REQUEST['fdate']));
$edate=date('Y-m-d',strtotime($_REQUEST['tdate']));

if($ctype == "c"){ $ct = "Customer / OP";}elseif($ctype == "p"){ $ct = "IP Patients"; }
if($cname != ""){ $cn = $cname;}elseif($cname1 != ""){ $cn = $cname1; }

?>
	<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
    <td width="75%" align="center">
<table width="75%" border="0" cellpadding="0" cellspacing="0" >
    <tr><td>&nbsp;</td></tr>
  <tr>
    <td class="heading1"><?php echo $HOSP_NAME ?></td>
  </tr>
  <tr>
    <td class="heading2"> <?php echo $ADDR ?></td>
  </tr>
  <tr>
    <td class="heading2">Ph : <?php echo $PHONE1 ?></td>
  </tr>
</table>
  </td>
    </tr>
</table>
<p>&nbsp;</p>


<div align="center">

  
  <table width="75%" cellpadding="0" cellspacing="0" border="1" style="font-family: arial;font-size: 12px">
    <tr><td colspan=7><div align="center"><strong>Sales Entry Report</strong></div></td></tr>
  

  <tr><td colspan=2><div align="right"><strong>From Date</strong>:</div></td><td><strong><?php echo $sdate ?></strong></td><td></td>
  <td colspan="2"><div align="right"><strong>To Date</strong>:</div></td><td><strong><?php echo $edate ?></strong></td>
  
     
	   
</tr>


<tr>
  <td align="center"><strong>S.No.</strong></td>
   <td align="center"><strong>Rec. No.</strong></td>
   <td align="center"><strong>Pat. Name.</strong></td>

  <td align="center"><strong>Prd. Name</strong></td>
  <td align="center"><strong>Batch No.</strong></td>
  <td align="center"><strong>Qty.</strong></td>
  <td align="center"><strong>Value</strong></td>
 <!-- <td align="center"><strong>Total</strong></td>-->
  </tr>
  
   <?php
$tt=0;
$counts=0;
$sdate = date('Y-m-d',strtotime($sdate));
$edate = date('Y-m-d',strtotime($edate));
if($prdcode != "")	
{
	$qry=mysql_query("select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and b.sal_date between '$sdate' and '$edate' and c.PRODUCT_CODE='$prdcode'");

}
elseif($ctype != "" && $cname != ""){
	$qry=mysql_query("select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and b.sal_date between '$sdate' and '$edate' and b.customer_type='p' and b.consultant_name='$cname'");

}elseif($ctype != "" && $cname1 != ""){
	$qry=mysql_query("select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and b.sal_date between '$sdate' and '$edate' and b.customer_type='c' and b.consultant_name='$cname1'");

}else {
	 $a="select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl as a,phr_salent_mast as b,phr_purinv_dtl as c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and b.sal_date between '$sdate' and '$edate'";
$qry=mysql_query($a);

}
//$qry=mysql_query($s);
if($qry){
$sno=0;
$tot3=0;
while($res1 = mysql_fetch_array($qry)){
    $sno++;
//$tot2=$res1['total'];
?>
  
<tr>
  <td align="center"><?php echo $sno ?></td>
     <td align="center"><?php echo $res1['lr_no']; ?></td>
    <td align="center"><?php $cust_name=$res1[2];
$rs1=mysql_query("Select patientname from patientregister where registerno='$cust_name' ");
$rw1 = mysql_fetch_array($rs1); echo $cust_name =$rw1[0];?></td>
<td align="center"><?php echo $product_name=$res1['product_name']; ?></td>
<td align="center"><?php echo $batch_no=$res1['batch_no']; ?></td>
<td align="center"><?php echo $u_qty=$res1['u_qty']; ?></td>
<td align="center"><?php echo $value=$res1['value']; ?></td>



  </tr>

<?php 		
	$tt=$value+$tt;
	//$sg=$a+$sg;	
}
}
?>
  <tr><td colspan="6" style="text-align:right;"><strong >Total</strong></td><td style="text-align:center;"><strong><?php echo $tt?></strong></td></tr>

  </table>
<?php }?>
