<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
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
}
.heading1 {	
    font-size:20px;
	text-align:center;
        font-family: "Times New Roman";
        font-weight: bold;
}
.heading2 {	font-size:12px;
	text-align:center;
        font-family: arial;
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

$rs=mysql_query("select * from  pharmacydetaisl");
while($res = mysql_fetch_array($rs)){
$HOSP_NAME=$res['pharmacyname'];
$ADDR=$res['address'];     
     
$PHONE1=$res['phoneno'];

 }



?>


<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
    <td width="100%" align="center">
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
$edate=$_REQUEST['e_date'];
$prdcode=$_REQUEST['prdcode'];
$amt=$_REQUEST['amt'];
$e_date=date('Y-m-d',strtotime($edate));

?>
  
<table width="100%" border="1" style="font-family: arial;font-size: 12px" cellpadding="4" cellspacing="0">
    <tr><td colspan=7><div align="center"><strong>Sales Entry Report</strong></div></td></tr>
    <tr>
        <td colspan="7" align="center"><strong>Date:</strong>&nbsp;<?php echo $edate ?></td>
	   
</tr>
  
<tr>
  <td width="10%"><strong>Sno</strong></td>
  <td width="10%"><strong>Rec.No</strong></td>
  <td width="18%"><strong>Patient Name</strong></td>
  <td width="20%"><strong>Product Name</strong></td>
  <td width="10%"><strong>Batch No.</strong></td>
  <td width="10%"><strong>Qty</strong></td>
  <td width="10%"><strong>Value</strong></td>
  </tr>
  
   <?php

$counts=0;
 if($prdcode==""){
   $qry=mysql_query("select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl a,phr_salent_mast b,phr_purinv_dtl c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and a.value between '1' and '$amt' and date_format(b.sal_date,'%Y-%m-%d')='$e_date'");
   }else{
$qry=mysql_query("select c.product_code,c.product_name,b.cust_name,a.u_qty,a.value,b.lr_no,batch_no from phr_salent_dtl a,phr_salent_mast b,phr_purinv_dtl c where a.lr_no=b.lr_no and a.inv_id=c.inv_id and a.value between '1' and '$amt' and date_format(b.sal_date,'%Y-%m-%d')='$e_date' and c.product_code='$prdcode' ");
}
$sno=0;
$tot3=0;
while($res = mysql_fetch_array($qry)){
$sno++;

$cust_name=$res[2];
$rs1=mysql_query("Select patientname from patientregister where registerno='$cust_name' ");
while($res1 = mysql_fetch_array($rs1)){$cust_name=$res1[0];}

?>
  
<tr>
  <td><?php echo $sno ?></td>
  <td><?php echo $res[5] ?></td>
  <td><?php echo $cust_name ?></td>
  <td><?php echo $res[1]  ?></td>
    <td><?php echo $res[6]  ?></td>
   <td><?php echo $res[3]  ?></td>
  <td><?php echo $res[4]  ?></td>
  </tr>
  
<?php		
		$tot2=$res[4];
        $tot3=$tot3+$tot2;
		$counts++;

}

$rs2=mysql_query("select date_format(total_date,'%Y-%m-%d') from z_gran_tot where date_format(total_date,'%Y-%m-%d')='$e_date'");
while($res2 = mysql_fetch_array($rs2))
{
$total_dat=$res2[0];
}     
if($total_dat == $edate)
{
    $st2=mysql_query("update z_gran_tot set grand_total=$tot3 where date_format(total_date,'%Y-%m-%d')='$e_date'");
}
else
{

$st2=mysql_query("insert into z_gran_tot values('$e_date','$tot3')");
}

?>
  <tr><td colspan=6><div align="right"><strong>Total Price:</strong></div></td><td  ><div align="left"><?php echo $tot3 ?></div></td>
  

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