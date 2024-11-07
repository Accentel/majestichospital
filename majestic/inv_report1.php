<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../css/style1.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>
<script language="javascript" type="text/javascript" src="../js/actb.js"></script>
<script language="javascript" type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/sortable.js"></script>
<script type="text/javascript">window.onload=function(){tableruler();}</script>
<script language="JavaScript" src="../js/gen_validatorv31.js" type="text/javascript"></script>
<title>Pharmacy</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color:#fff;
	color:#000;
}
.heading1 {	font-size:20px;
	text-align:center;
        font-family: "Times New Roman";
        font-weight: bold;
}
.heading2 {	font-size:12px;
	text-align:center;
        font-family: "arial";
}
.heading3 {	font-size:15px;
	text-align:center;
	
	text-decoration:underline;	
}
-->
</style>
<script type="text/javascript">
function printWindow(){
		document.getElementById("submit1").style.display='none';
	document.getElementById("submit2").style.display='none';
	window.print();	
	}
	function fun(){
	window.close();
	}
</script>

</head>
<body>
<?php
include("config.php");

$rs=mysqli_query($link,"select * from  pharmacydetaisl")or die(mysqli_error($link));
while($res = mysqli_fetch_array($rs)){
$HOSP_NAME=$res['pharmacyname'];
$ADDR=$res['address'];     
     
$PHONE1=$res['phoneno'];

 }



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
  <?php
$batchno=$_REQUEST['batchno'];
$pname=$_REQUEST['pname'];
//$edate=$_REQUEST['e_date'];

$s_date=date('Y-m-d',strtotime($_REQUEST['s_date']));
//$e_date=date('Y-m-d',strtotime($_REQUEST['e_date']));

?>
  
  <table width="75%" cellpadding="0" cellspacing="0" border="1" style="font-family: arial;font-size: 12px">
    <tr><td colspan=7><div align="center"><strong>Invoice Report</strong></div></td></tr>
  

  
  
     
	   
</tr>


<tr>
  <td align="center"><strong>S.No.</strong></td>
  <td align="center"><strong>Batch No.</strong></td>
   <td align="center"><strong>Product Name.</strong></td>
  <td align="center"><strong>Invoice No.</strong></td>
 
  <td align="center"><strong>Supplier Name.</strong></td>
  <td align="center"><strong>Pur Date</strong></td>
  <td align="center"><strong>Entry Date</strong></td>
 
  </tr>
  
   <?php

$counts=0;
if($batchno!=''){
 $s="select * from phr_purinv_dtl where BATCH_NO='$batchno' ";
}else if($pname!=''){
 $s="select * from phr_purinv_dtl where PRODUCT_NAME='$pname' ";
    
}else{
  $s="select * from phr_purinv_dtl where PRODUCT_NAME='$pname' and BATCH_NO='$batchno'  ";  
}    
  //$s="select  distinct b.registerno,a.INV_NO,a.CUST_NAME,a.SAL_DATE,a.total,a.mrnum,b.patientname,a.sr_bill_num from phr_salent_mast a,patientregister b
 //where a.SAL_DATE='$s_date'  and b.registerno=a.mrnum ";
$qry=mysqli_query($link,$s) or die(mysqli_error($link));
if($qry){
$sno=0;
$tot3=0;
while($res1 = mysqli_fetch_array($qry)){
    $sno++;
$lrno=$res1['LR_NO'];
$p=mysqli_query($link,"select a.SUPPL_INV_NO,a.INV_DATE,a.CURRENTDATE,b.SUPPL_NAME from phr_purinv_mast a,phr_supplier_mast b where a.SUPPL_CODE=b.SUPPL_CODE  and a.LR_NO='$lrno'") or die(mysqli_error($link));
$p1=mysqli_fetch_assoc($p);
?>
  
<tr>
  <td align="center"><?php echo $sno ?></td>
  <td align="center"><?php echo $res1['BATCH_NO'] ?></td>
   <td align="center"><?php echo $res1['PRODUCT_NAME'] ?></td>
  <td align="center"><?php echo $p1['SUPPL_INV_NO'] ?></td>
  <td align="center"><?php echo $p1['SUPPL_NAME'] ?></td>
   <td align="center"><?php echo $p1['INV_DATE'] ?></td>
  <td align="center"><?php  $d=$res1['CURRENTDATE']; echo date("d-m-Y", strtotime($d)); ?></td>
  
  
 

  </tr>
  
<?php 		

$counts++;

}
}
?>

  <?php if($counts==0){ ?>
  <tr><td colspan=7><div align="center"><strong>No Records</strong></div></td></tr>
  
<?php } ?>
  
  </table>
   <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td>&nbsp;</td>
                
              </tr>
            </table></td>
          </tr>
    <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td>
                  <div align="right">
                    <input type="button" value="Print" id="submit1" onclick="javascript:printWindow()"  />
                </div></td>
					 <td>
                       <div align="left">
                         <input type="button" value="Close" id="submit2" onclick="fun()"  />
                     </div></td>
              </tr>
            </table></td>
          </tr>
</div>
</body>
</html>