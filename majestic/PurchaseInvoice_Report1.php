<?php
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="css/form_style.css" />
<link rel="stylesheet" type="text/css" href="css/table_style.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript" src="js/tableruler.js"></script>
<script language="javascript" type="text/javascript" src="js/actb.js"></script>
<script language="javascript" type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/sortable.js"></script>
<SCRIPT type="text/javascript">window.onload=function(){tableruler();}</SCRIPT>
<script language="JavaScript" src="../js/gen_validatorv31.js" type="text/javascript"></script>
<script>
function printWindow(){
		
			document.getElementById('submit1').style.display='none';
			document.getElementById('submit2').style.display='none';
		window.print();
		window.close();
	}
	function fun(){
	window.close();
	}
</script>
</head>
<body>
<?php
$sql = mysqli_query($link,"select * from organization");
if($sql){
$res = mysqli_fetch_array($sql);
$orgname = $res['orgname'];
$addr = $res['address'];
$phone = $res['phone'];
$mob = $res['mobile'];
$email = $res['email'];
}
?>
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #999999;background:#FFFFFF">
                    <tr>
                        <td style="text-align:center;font-size:24px;" colspan="6"><?php echo $orgname ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;font-size:18px;" colspan="6"><?php echo $addr ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;font-size:18px;" colspan="6">Ph : <?php echo $phone ?></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </td>
            </tr>
</table>



  <?php

$lr_id=$_REQUEST['lr_id'];

	$result = mysqli_query($link,"select a.suppl_code,b.suppl_name,b.addr1,pur_type,suppl_inv_no,inv_date,rec_by,total,rec_date,grn,b.city,lr_no from phr_purinv_mast1 as a,phr_supplier_mast as b where lr_no='$lr_id' and a.suppl_code=b.suppl_code");
while($row = mysqli_fetch_array($result))
	{
		$suppl_code=$row[0];
		$suppl_name=$row[1];
		$address=$row[2];
		$pur_type=$row[3];
		$invno=$row[4];
		$invdt=$row[5];
		$recby=$row[6];
		$total=$row[7];
		$recdt=$row[8];
		$gr_no=$row[9];
		$city=$row[10];
		$lr_no=$row[11];
		

		if($address == "")
		{
			$address="---";
		}
		if($city == "")
		{
			$city="---";
		}
		if($pur_type == "C")
		{
			$pur_type="Cash";
		}
		if($pur_type == "B")
		{
			$pur_type="Bank";
		}
		if($pur_type == "CR")
		{
			$pur_type="Credit Card";
		}

	}

 
 $sql1 = mysqli_query($link,"select product_code,product_name,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,mfg_date,noitems,cost,manu_by,sgst,cgst from phr_purinv_dtl1 where lr_no='$lr_id'");
 
?>
  <table width="100%" border="0" cellspacing="5" cellpadding="2">
              <tr>
                <td width="23%" class="label"><div align="right">Supplier Code<span class="style2">*</span>:</div></td>
                <td  align="left"><?php echo $suppl_code ?></td>
              
                <td width="23%" class="label"><div align="right">Supplier Name<span class="style2">*</span>:</div></td>
                <td  align="left"><?php echo $suppl_name ?></td>
              </tr>
			    <tr>
			      <td class="label"><div align="right">Address:</div></td>
			      <td align="left"><?php echo $address ?></td>
			      <td class="label"><div align="right">GRN NO:</div></td>
			      <td align="left"><?php echo $gr_no ?></td>
			    </tr>
			    <tr>
			      <td class="label"><div align="right">City:</div></td>
			      <td align="left"><?php echo $city ?></td>
                  <td class="label"><div align="right">Invoice No<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $invno ?></td>
			    </tr>
				<tr>
				  <td class="label"><div align="right">Purchase Type<span class="style2">*</span>:</div></td>
				  <td align="left"><?php echo $pur_type ?></td>
                  <td class="label"><div align="right">Invoice Date<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $invdt ?>
                    
					</td>
				</tr>
				<tr>
				  <td class="label">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td class="label"><div align="right">Received Date<span class="style2">*</span>:</div></td>
				  <td><div align="left">
                      <?php echo $recdt ?>
                  </div>
				  </td>
				</tr>
				
        
            </table>
			<table id="t1" width="100%">
			<tr><td></td>
            	   
           <tr><td width="100%" align="center"><br />

<div id="purtable" valign="top">

            <table width="100%" id="TABLE1">
              <thead>
              	 
              	 <tr>
  <!-- <th width="7%" class="TH1">P.Code</th>-->
   <th width="15%" class="TH1">P.Name </th>
     <!-- <th width="7%" class="TH1">Pack</th>-->
	   <th width="7%" class="TH1">Mnf.By</th>
	     <th width="7%" class="TH1">Pk.Qty </th>
   <th width="10%" class="TH1">Batch.NO</th>
 
  <!-- <th width="9%" class="TH1">MFG.Dt</th>-->
   <th width="9%" class="TH1">EXP.Dt</th>
   <th width="7%" class="TH1">Qty</th>
   <th width="7%" class="TH1">Free</th>
    <th width="9%" class="TH1">Rate</th>
   <th width="9%" class="TH1">Amount</th>
   <th width="9%" class="TH1">MRP</th>
   <th width="5%" class="TH1">SGST</th>
   <th width="5%" class="TH1">SGST Amount</th>
   <th width="5%" class="TH1">CGST</th>
   <th width="5%" class="TH1">CGST Amount</th>
   <th width="5%" class="TH1">GST</th>
    </tr>
   </thead>
   <tbody>
    <?php
		if($sql1){
		$vat4 = 0;
		$vat14 = 0;
		$vat12 = 0;
		$p = 0;
		while($row1 = mysqli_fetch_array($sql1))
		 {	
			$pcode=$row1[0];
			$pname=$row1[1];
			$packing=$row1[2];
			$batch=$row1[3];
			$mrp=$row1[4];
			$expdt=date('d-m-Y',strtotime($row1[5]));
			$sqty=$row1[6];
			$sfree=$row1[7];
			$srate=$row1[8];
			$dis=$row1[9];
			$valu=$row1[10];
			 $vat=$row1[11];
			$vat_amt=$row1[12];
			$mfgdt=date('d-m-Y',strtotime($row1[13]));
			$noi=$row1[14];
			$cst=$row1[15];
			$maniby=$row1[16];
			$sgst=$row1[17];
			$cgst=$row1[18];
			if($vat==5.0){$vat4=($vat4+$vat_amt);}
		if($vat==15.0){$vat14=($vat14+$vat_amt);}
		if($vat==14.5){$vat12=($vat12+$vat_amt);}
		$vatadd=($vatadd+$vat_amt);
		$nit=($nit+$sqty);
			$p = $p+1;
			
			
			
			if($vat==0.00){
			$novat1=$vat_amt;
			$novat=$novat1+$novat;
		} elseif($vat==5.00) {
			$gst51=$vat_amt;
			$gst5=$gst51+$gst5;
		}else if($vat==12.00){
			 $gst121=$vat_amt;
			$gst12=$gst121+$gst12;
		}else if($vat==18.00){
			$gst181=$vat_amt;
			$gst18=$gst181+$gst18;
		}else if($vat==28.00){
			$gst281=$vat_amt;
			$gst28=$gst281+$gst28;
		}
			
			
			 ?>
        <tr> 
 		
		<?php /*?> <td class="TD1"><?php echo $pcode ?></td><?php */?>
		<td class="TD1"><?php echo $pname ?></td>
	<!--	<td class="TD1"><?php  $packing ?></td>-->
		<td class="TD1"><?php echo $maniby ?></td>
		<td class="TD1"><?php echo $noi ?></td>
        <td class="TD1"><?php echo $batch ?></td>
		<!--<td class="TD1"><?php echo $mfgdt ?></td>-->
		<td class="TD1"><?php echo $expdt ?></td>
		<td class="TD1"><?php echo $sqty ?></td>
        <td class="TD1"><?php echo $sfree ?></td>
		 <td class="TD1"><?php echo $srate ?></td>
        <td class="TD1"><?php echo $valu ?></td>
		<td class="TD1"><?php echo $mrp ?></td>
		<td class="TD1"><?php echo $va=$vat/2;
		
		
		 ?></td>
        <td class="TD1"><?php echo $sgst; ?></td>
        <td class="TD1"><?php echo $vat/2; ?></td>
        <td class="TD1"><?php echo $cgst; ?></td>
        <td class="TD1"><?php echo $vat ?></td>
       
        </tr> <?php
		
		
		} 
		}?>
   </tbody>
 </table>

 </div>
 </td>
 
  
  </tr>


</table>
<input type="hidden" name="rows" id="rows" value="0" >
<table width="100%" >
              	   <tr height="40">
              	     <td colspan="6" class="label">&nbsp;</td>
              	     </tr>
                     
                     
                     
                     <!--<tr>
              	   <td width="15%" class="label1">SGST: </td>
              	   <td width="9%" class="label"><div align="left">
              	     <?php echo $vatadd/2 ?>   <?php echo $novat1 ?> , <?php echo $gst5 ?> ,
                      <?php echo $gst12 ?>  <?php echo $gst18 ?>, <?php echo $gst28 ?></div></td>
              	   <td width="21%" class="label1">No.of Items: </td>
              	   <td width="11%" class="label"><div align="left">
              	     <?php echo ($p) ?></div></td>
              	   <td width="25%" class="label1">Sub Total: </td>
              	   <td width="19%" align="left"><?php echo (($total+$dis)-$vatadd).".00" ?></td></tr>-->
                     
                     
                     
                     
              	   <tr>
              	   <td width="15%" class="label1">SGST: </td>
              	   <td width="9%" class="label"><div align="left">
              	     <?php echo $vatadd/2 ?></div></td>
              	   <td width="21%" class="label1">No.of Items: </td>
              	   <td width="11%" class="label"><div align="left">
              	     <?php echo ($p) ?></div></td>
              	   <td width="25%" class="label1">Sub Total: </td>
              	   <td width="19%" align="left"><?php echo (($total+$dis)-$vatadd).".00" ?></td></tr>
				   <tr>
              	   <td class="label1">CGST: </td>
              	   <td class="label"><div align="left">
              	     <?php echo $vatadd/2; ?></div></td>
              	   <td class="label">&nbsp;</td>
              	   <td class="label">&nbsp;</td>
              	   <td class="label1">Less Disc: </td>
              	   <td align="left"><?php echo $dis ?></td>
            	   </tr>
              	 <tr>
              	   <td class="label1"><!--15% VAT:--> </td>
              	   <td class="label"><div align="left">
              	     <?php  $vat14 ?></div></td>
              	   <td class="label">&nbsp;</td>
              	   <td class="label">&nbsp;</td>
              	   <td class="label1">ADD GST: </td>
              	   <td align="left"><?php echo $vatadd.".00" ?></td>
            	   </tr>
              	 <tr>
                   <td colspan="5" class="label1">Net PAYABLE:</td>
              	   <td align="left"><?php echo $total ?></td>
              	 </tr>
 

              	 <tr>
                   <td colspan="5" class="label1">Received By:</td>
              	   <td align="left"><?php echo $recby ?></td>
            	   </tr>
              	 </table>
                  <div align="center">
				  <input type="button" id="submit1" value="Report" class="butt" onclick="javascript:printWindow();"/>
              <input type="button" id="submit2" value="Close" class="butt" onclick = "javascript:fun();" > 
            </div>
            
</body>
</html>	