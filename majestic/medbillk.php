<?php
include("config.php");
$lr_id=$_REQUEST['lr_id'];

$rs=mysql_query("select customer_type from phr_salent_mast where lr_no='$lr_id' ");
while($rw = mysql_fetch_array($rs))
{
	$customer_type=$rw[0];
}


 if($customer_type == "p"){
	 $cc="select CUST_NAME,sal_date,cust_name,Consultant_Name,auth_by,concession_type from 
	phr_salent_mast  where lr_no='$lr_id'";
	$ss=mysql_query($cc);
 } else {
	$ss=mysql_query("select cust_name,sal_date,cust_name,Consultant_Name,auth_by,concession_type,conce_cardno from phr_salent_mast where lr_no='$lr_id'");
 }
 

while($rss = mysql_fetch_array($ss))
{
 $custname=$rss[0];
$saledate=date('d-m-Y',strtotime($rss[1]));
$custname1=$rss[2];
$ConsultantName=$rss[3];
$authby=$rss[4];
$contype=$rss[5];
//$cardno=$rss[6];
}

$rest = substr("$custname", 0, 3); 
				if($rest=='DHS'){
					//$ctype="Out Patient";
				$res=mysql_query("Select a.patientname from patientregister a,`op_pat_dlt` b where
				 a.registerno=b.PAT_REGNO and a.registerno='$custname'");
				} else {
					//$ctype="In Patient";
				$res=mysql_query("Select a.patientname from patientregister a,`ip_pat_admit` b where a.registerno=b.PAT_REGNO and b.pat_no='$custname'");
				}


  //$xx=mysql_query("Select a.patientname from patientregister a,`ip_pat_admit` b where a.registerno=b.PAT_REGNO and b.pat_no='$custname'");
				  //$rs1=mysql_query($xx);
				  $r=mysql_fetch_array($res);
				  $custname2=$r['patientname'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Pharmacy </title>
<style type="text/css">
.label1{
	font-weight:bold;
}
.heading1{
	font-size:32px;
	text-align:center;
}
.heading2{
	font-size:18px;
	text-align:center;
    
}
.heading3{
	font-size:14px;
	text-align:center;
	font-family: arial;

}
</style>
<script type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}
function printp(){
window.print();
window.close();
}
</script>
<style type="text/css" media="all">
table.table1{
	border-collapse:collapse;
}
table.table1, th.table1, td.table1{
border:1px solid #999999;
}
.cell_left{
	border-right:0px solid #999999;
	border-bottom:1px solid #999999;
}

</style>
</head>


<?php
		  include('config.php');
		  $sql="select *from  pharmacy";
		  $result=mysql_query($sql) or die(mysql_error());
		  $i=1;
		  while($row=mysql_fetch_array($result))
		  {
			  $orgname=$row['orgname'];
		  }
		  ?>
          
       

<?php

$res=mysql_query("select * from  pharmacydetaisl");
while($row = mysql_fetch_array($res)){
$HOSP_NAME=$row[1];
$phrno=$row[2];
$ADDR=$row[6];         
$PHONE1=$row[7];   
$PHONE2=$row[8];         
$dlno =$row[3];          
$tin =$row[4]; 
 }

?>
<body style="margin-top:10px; font-style:normal; font-family:Verdana, Geneva, sans-serif;" >
<div align="center" class="heading" style="font-size:22px;" ><?php echo $HOSP_NAME ?></div>
                        <div align="center" class="heading"  style="font-size:18px;"><?php echo $orgname ?></div>
                     <div align="center"  class="heading2" >Licence No. : TG/20/04/2015-8388,TG/20/04/2015-8389</div>
                     
                        <div align="center" class="heading" ><?php echo $ADDR ?>. Ph : <?php echo $PHONE1 ?></div>
                    
                        
                    
        
	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" style="font-size:12px;border-top:1px solid #999999;" cellspacing="4" cellpadding="0">
		<!--<tr height="5px"></tr>
		
		 <tr height="5px"></tr>-->
		<tr>
            <td style="padding-left:10px;" width="15%" align="left"><span class="label1">Receipt No</span>: <?php echo $lr_id ?></td>
            <td width="35%" align="left"> </td>
            <td width="15%" ><div align="left"><span class="label1">Date</span>: <?php echo $saledate ?> </div></td>
            <td width="35%" align="left"> </td>
          </tr>
          <tr>
             <td style="padding-left:10px;"><div align="left"><span class="label1">Patient Name</span>: <?php echo $custname2 ?></div></td>
            <td align="left"> </td>
            <td align="left"><span class="label1">Doctor</span>: <?php echo $ConsultantName ?></td>
            <td align="left"> </td>
           
          </tr>
		  <tr style="display:none">
             <td style="padding-left:10px;"><div align="left"><span class="label1">Payment Type</span></div></td>
            <td align="left"> : <?php echo $contype ?></td>
            <td align="left"><span class="label1">Card No.</span></td>
            <td align="left"> : <?php echo $cardno ?></td>
           
          </tr>
          <tr>
            <td colspan="8"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" style="border:1px solid #999999;background:#FFFFFF">
              <tr class="label1">
                <td width="26" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">S No. </td>
                <td width="125" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">Drug Name</td>
                <td width="55" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">Batch No</td>
                <td width="65" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">EXP dt.</td>
				<td width="23" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">QTY</td>
				<td width="45" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">U.Price</td>
              <!--  <td width="72" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">Tot.Price</td>-->
               <!-- <td width="45" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">Dis(%)</td>-->
                <td width="72" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">Total</td>
              </tr>
                    
			  <?php
			  $nn=0;
			  $tot=0;
			  $discount=0;
			  $price=0;
			  $res1=mysql_query("select a.product_code,b.product_name,b.batch_no,b.mfg_date,b.exp_date,a.u_qty,a.u_rate,a.value,c.discount,c.total,a.disc,a.total from phr_salent_dtl as a,phr_purinv_dtl as b,phr_salent_mast as c where a.inv_id=b.inv_id and a.lr_no=c.lr_no and a.lr_no='$lr_id'");
			  while($row1 = mysql_fetch_array($res1))
				{
				
				$discount=$row1[8];
				$tot=$row1[9];
				$price=($price+$row1[7]);
				
					$nn++;	  
				
			?>
              <tr >
                 <tr >
                <td align="center"><?php echo $nn ?>)</td>
                <td align="center"><?php echo $row1[1] ?></td>
                <td align="center"><?php echo $row1[2] ?></td>
		<td align="center"><?php echo date('d-m-Y',strtotime($row1[4])) ?></td>
		<td align="center"><?php echo $row1[5] ?></td>
                <td align="center"><?php echo $row1[6] ?></td>
		<?php /*?><td align="center"><?php echo $row1[7] ?></td><?php */?>
         <!--       <td align="center"><?php echo $row1[10] ?></td>-->
		<td align="center"><?php echo $row1[11] ?></td>
              </tr>
                <?php } ?>
            </table></td>
          </tr>
          
          
          <tr><td colspan="5">
          
      <div style="width:100%" >
               
               <div  style="width:30%; float:left;"><strong>Total Amount :</strong> <?php echo number_format($price,2) ?></div>
               <div  style="width:30%; float:left"><strong> Discount(%) :</strong> <?php echo number_format($discount,2) ?></div>
               <div  style="width:30%; float:left"><strong>Amount To Pay :</strong> <?php echo $tot ?></div></div>
               
               </td></tr>
          
		 <?php /*?>  <tr>
            <td  colspan="5">
            
            
            
            
            
            
            
            
            
            
			<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" >
			
			<tr>
			  <td width="545" align="center">&nbsp;</td>
			  <td width="211" class="label1"><div align="right">Total Amount : </div></td>
			  <td align="center"><?php echo number_format($price,2) ?></td>
			  </tr>
			  <tr>
			  <td align="center">&nbsp;</td>
			  <td class="label1"><div align="right">Average Discount(%) : </div></td>
			  <td align="center"><?php echo number_format($discount,2) ?></td>
			  </tr>
			
              <tr>
                <td align="center">&nbsp;</td>
                <td class="label1"><div align="right">Amount To Pay: </div></td>
                <td width="69" align="center"><?php echo $tot ?></td>
              </tr>
            </table><?php */?></td>
          </tr>
        </table>
		<table width="100%" align="center" style="font-size:10px;outline:1px solid black;">
		<tr >
            <td style="padding-left:10px;" width="15%" align="left"><span class="label1">Attended By</span></td>
            <td width="40%" align="left"> : <?php echo $authby ?></td>
            <td width="15%" ><div align="left"><span class="label1">Order Date</span> </div></td>
            <td width="30%" align="left"> : <?php echo date('d-m-Y h:i:s'); ?></td>
          </tr>
	  </table>
	<!--<table width="100%" align="center" style="font-size:12px;outline:1px solid black;">
		<tr >
		<td style=""><b>Terms & Conditions : </b></td>
		
		</tr>
		<tr >
		<td>01. This Bill / Order once processed cannot be cancelled or modified. Amount will not be refunded under any circumstances.</td>
		
		</tr>
		<tr >
		<td>02. Please bring this bill when collecting your Spectacles. Spectacles can collect during store working hours.</td>
		
		</tr>
		<tr >
		<td>03. Customers own frames and lenses given to the store  for adjustments can only be handled at customer's risk.</td>
		
		</tr>
	</table>-->
	
	<div align="center" style="margin-top:2px;margin-bottom:2px; font-size:9px">We will pray for your good health and a speedy recovery.</div> 
	<div align="center"  style=" font-size:9px"> **** Thank You. Visit Again. **** </div> 
		<!--<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#FFFFFF">
                    <tr height="30"></tr>
				<tr><td align="left"><b>GRN No. :</b><?php echo $phrno ?></td></tr>
                    <tr><td align="left"><b>D.L No.  :</b> <?php echo $dlno ?></td></tr>
                    <tr><td align="left"><?php if($tin == ""){ echo "";}else{ echo "<b>TIN No. : </b>".$tin;} ?></td></tr>
                    <tr><td>&nbsp;</td></tr>
		<tr align="right" style="font-size:18px;"><td>For <?php echo $HOSP_NAME ?></td></tr>
		</table>-->
		</td>
      </tr>
    </table>
	

<div align="center"><input type="button" value="Print" class="butt" id="prnt" onclick="prnt();"/> <input type="button" value="Close" class="butt" id="cls" onclick="closew();"/> </div>
</body>
</html>