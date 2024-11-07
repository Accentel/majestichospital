<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
	$aname = $_SESSION['name1'];
 ?>
<?php
include("config.php");

$lr_id=$_REQUEST['id'];
$sql = mysql_query("select a.suppl_code,b.suppl_name,b.addr1,pur_type,suppl_inv_no,inv_date,rec_by,total,rec_date,grn,b.city,lr_no from phr_purinv_mast as a,phr_supplier_mast as b where lr_no='$lr_id' and a.suppl_code=b.suppl_code");
if($sql){
$row = mysql_fetch_array($sql);

$suppl_code=$row[0];
$suppl_name=$row[1];
$address=$row[2];
$pur_type=$row[3];
$invno=$row[4];
$invdt=date('d-m-Y',strtotime($row[5]));
$recby=$row[6];
$total=$row[7];
$recdt=date('d-m-Y',strtotime($row[8]));
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

$sql1 = mysql_query("select product_code,product_name,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,mfg_date,noitems,cost,manu_by,inv_id,sgst,cgst from phr_purinv_dtl where lr_no='$lr_id'");
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header1.php");
		?>

<style>
.style2{
	color:red;
}
</style>
<script type="text/javascript">

function isNum(value)
{
    return 123;
}

function calcTotals()
{
    var grandTotal = 0;
	var grandTotal1 = 0;
	var grandTotal2 = 0;
	var tt = 0; 
    var row = 0;
	var items=0;
    while (document.forms['form'].elements['sqty[]'][row])
    {
        rateObj = document.forms['form'].elements['sqty[]'][row];
        qtyObj   = document.forms['form'].elements['srate[]'][row];
        totalObj = document.forms['form'].elements['value[]'][row];
			sgst = document.forms['form'].elements['sgst[]'][row];
		cgst = document.forms['form'].elements['cgst[]'][row];
		vt   = document.forms['form'].elements['vat[]'][row];
		

        if (isNaN(rateObj.value))
        {
		
            rateObj = '';
        }
        if (isNaN(qtyObj.value))
        {
            qtyObj = '';
        }

        if (rateObj.value && qtyObj.value)
        {
		
            totalObj.value = (parseFloat(rateObj.value) * parseFloat(qtyObj.value));
            grandTotal = grandTotal + parseFloat(totalObj.value);
			//alert(grandTotal);
			
			items++;
        }
        else
        {
            totalObj.value = '';
        }
		
		
		sgst=rateObj*qtyObj*vt/100;
		cgst=rateObj*qtyObj*vt/100;
		
		
		
		
		
		rateObj1 = document.forms['form'].elements['value[]'][row];
        qtyObj1   = document.forms['form'].elements['vat[]'][row];
		totalObj1   = document.forms['form'].elements['vatamt[]'][row];
			sgst = document.forms['form'].elements['sgst[]'][row];
		cgst = document.forms['form'].elements['cgst[]'][row];
	
		if (isNaN(rateObj1.value))
        {
            rateObj1 = '';
        }
        if (isNaN(qtyObj1.value))
        {
            qtyObj1 = '';
        }
		
		if(rateObj1.value && qtyObj1.value){
		//alert( qtyObj1.value)
			totalObj1.value = (parseFloat(rateObj1.value) * (parseFloat(qtyObj1.value)/100));
			//totalObjx.value=totalObj1.value/2;
			
			grandTotal1 = grandTotal1 + parseFloat(totalObj1.value);
			x=(parseFloat(totalObj1.value)/2);
			//tt=tt+parseFloat(totalObj1.value);
			/*if(qtyObj1.value == "5.00"){
	document.getElementById('vat_4').value = tt+parseFloat(totalObj1.value);
	} if(qtyObj1.value=='14.50'){
	document.getElementById('vat_12').value = tt+parseFloat(totalObj1.value);
	}
	 if(qtyObj1.value=='15.00')
	{
	document.getElementById('vat_14').value = tt+parseFloat(totalObj1.value);
	}
			*/
			//alert(totalObj1);
		}
		
		
		/*rateObj2 = document.forms['form'].elements['amount[]'][row];
        qtyObj2   = document.forms['form'].elements['ltax[]'][row];
		
		if (isNaN(rateObj2.value))
        {
            rateObj2 = '';
        }
        if (isNaN(qtyObj2.value))
        {
            qtyObj2 = '';
        }
		
		if(rateObj2.value && qtyObj2.value){
			totalObj2 = (parseFloat(rateObj2.value) * (parseFloat(qtyObj2.value)/100));
			grandTotal2 = grandTotal2 + parseFloat(totalObj2);
		}*/
		
		
			document.getElementById('vatadd').value = grandTotal1;
			//document.getElementById('sgst').value = x.value;
			//document.getElementById('cgst').value = x.value;
			
			
        row++;
    }
   // document.getElementById('tamount').value = grandTotal;
	var st=document.getElementById('total').value = grandTotal;
	
//document.getElementById('discad').value=grandTotal2;
	//vat nn=st-dis;
	document.getElementById('vatadd').value=grandTotal1;
		document.getElementById('nettot').value=grandTotal+grandTotal1;
		//document.getElementById('nettot1').value=grandTotal+grandTotal1-grandTotal2;
		//document.getElementById('gtot').value=grandTotal+grandTotal1-grandTotal2;
		
	//document.getElementById('vattotal').value = grandTotal2;
	//var net = grandTotal+grandTotal1+grandTotal2;
	
	//document.getElementById('netamount').value = net;
	//var discount=document.getElementById('discount').value;
	//d=net-discount;
	//var net1=document.getElementById('netamount1').value;
	//document.getElementById('netamount1').value = d;
	//var f=d;
	//document.getElementById('paid').value = f;
	document.getElementById('nitem').value = items;
    return;
}

</script>
</head>
<body onload="cur()">
<?php
include("config.php");

$sql = mysql_query("select max(lr_no) from phr_purinv_mast");
if($sql)
{
	$row = mysql_fetch_array($sql);
	$pnid = $row[0];
}
?>
	<div id="conteneur container">
	<?php /*?>	<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">PURCHASE INVOICE</h1>
           <div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
		  <form name="form"  autocomplete="off" method="post" action="insert_purchase_invoice1.php">
		  <input type="hidden" name="authby" value="<?php echo $aname ?>" />
		  <input type="hidden" name="lrno" value="<?php echo $lr_no ?>" />
          <table width="100%" class="" border="0" cellspacing="5" cellpadding="2">
              <tr>
                <td width="23%" class="label1"><div align="right">Supplier Code<span class="style2">*</span>:</div></td>
                <td  align="left"><?php echo $suppl_code ?></td>
              
                <td width="23%" class="label1"><div align="right">Supplier Name<span class="style2">*</span>:</div></td>
                <td  align="left"><?php echo $suppl_name ?></td>
              </tr>
			    <tr>
			      <td class="label1"><div align="right">Address:</div></td>
			      <td align="left"><?php echo $address ?></td>
			      <td class="label1"><div align="right">GRN NO:</div></td>
			      <td align="left"><?php echo $gr_no ?></td>
			    </tr>
			    <tr>
			      <td class="label1"><div align="right">City:</div></td>
			      <td align="left"><?php echo $city ?></td>
                  <td class="label1"><div align="right">Invoice No<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $invno ?></td>
			    </tr>
				<tr>
				  <td class="label1"><div align="right">Purchase Type<span class="style2">*</span>:</div></td>
				  <td align="left"><?php echo $pur_type ?></td>
                  <td class="label1"><div align="right">Invoice Date<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $invdt ?>
                    
					</td>
				</tr>
				<tr>
				  <td class="label1">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td class="label1"><div align="right">Received Date<span class="style2">*</span>:</div></td>
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
   <th width="10%" class="TH1">P.Name </th>
      <!--<th width="7%" class="TH1">Pack</th>-->
	   <th width="7%" class="TH1">Mnf.By</th>
	     <th width="7%" class="TH1">Pk.Qty </th>
   <th width="8%" class="TH1">Batch.NO</th>
 
   <th width="9%" class="TH1">MFG.Dt</th>
   <th width="9%" class="TH1">EXP.Dt</th>
   <th width="7%" class="TH1">Qty</th>
   <th width="7%" class="TH1">Free</th>
    <th width="7%" class="TH1">Rate</th>
   <th width="7%" class="TH1">Amount</th>
   <th width="9%" class="TH1">MRP</th>
   <th width="5%" class="TH1">SGST</th>
    <th width="5%" class="TH1">CGST</th>
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
		while($row1 = mysql_fetch_array($sql1))
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
			$invid=$row1[17];
			$sgst=$row1[18];
			$cgst=$row1[19];
			//if($vat==5.0){$vat4=($vat4+$vat);}
			$vat4=($vat4+$vat);
			$vat14=($vat14+$vat);
		//if($vat==15.0){$vat14=($vat14+$vat);}
		if($vat==14.5){$vat12=($vat12+$vat);}
		$vatadd=($vatadd+$vat_amt);
		$nit=($nit+$sqty);
			$p = $p+1;
			 ?>
        <tr> 
 		
		<!-- <td class="TD1"><?php// echo $pcode ?></td>-->
		<td class="TD1"><input type="text" name="pname[]" value="<?php echo $pname ?>" id="pname1" size="10"/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" name="maniby[]" value="<?php echo $maniby ?>" id="maniby1" size="10"/></td>
		<td class="TD1"><input type="text" name="noi[]" value="<?php echo $noi ?>" id="noi1" size="4"/></td>
        <td class="TD1"><input type="text" name="batch[]" value="<?php echo $batch ?>" id="batch1" size="8"/></td>
		<td class="TD1"><input type="text" name="mfgdate[]" value="<?php echo $mfgdt ?>" id="mfgdate1" size="10"/></td>
		<td class="TD1"><input type="text" name="expdate[]" value="<?php echo $expdt ?>" id="expdate1" size="10"/></td>
		<td class="TD1"><input type="text" name="sqty[]" value="<?php echo $sqty ?>" id="sqty1" size="4" /></td>
        <td class="TD1"><input type="text" name="sfree[]" value="<?php echo $sfree ?>" id="sfree1" size="4"/></td>
		 <td class="TD1"><input type="text" name="srate[]" value="<?php echo $srate ?>" id="srate1" size="6" onChange="calcTotals()"/></td>
        <td class="TD1"><input type="text" name="value[]" value="<?php echo $valu ?>" id="value1" size="6"/></td>
		<td class="TD1"><input type="text" name="mrp[]" value="<?php echo $mrp ?>" id="mrp1" size="6"/></td>
		<td class="TD1"><input type="text" name="sgst[]" value="<?php echo $sgst ?>" id="sgst1" size="6"/></td>
        	<td class="TD1"><input type="text" name="cgst[]" value="<?php echo $cgst ?>" id="cgst1" size="6"/></td>
            	<td class="TD1"><input type="text" name="vat[]" value="<?php echo $vat ?>" id="vat1" size="6"/></td>
		<input type="hidden" name="vatamt[]" value="<?php echo $vat_amt ?>" id="vatamt1" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="<?php echo $invid ?>" size="5" readonly>

       
        </tr> <?php
		
		
		} 
		}?>
		<tr>
		<td class="TD1"><input type="text" name="pname[]" value="" id="pname10" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=10','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" name="maniby[]" value="" id="maniby10" size="10"/></td>
		<td class="TD1"><input type="text" name="noi[]" value="" id="noi10" size="4"/></td>
        <td class="TD1"><input type="text" name="batch[]" value="" id="batch10" size="8"/></td>
		<td class="TD1"><input type="text" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate10" size="10"/></td>
		<td class="TD1"><input type="text" name="expdate[]" value="<?php echo date("d-m-Y"); ?>" id="expdate10" size="10"/></td>
		<td class="TD1"><input type="text" name="sqty[]" value="" id="sqty10" size="4" onChange="calcTotals()"/></td>
        <td class="TD1"><input type="text" name="sfree[]" value="" id="sfree10" size="4"/></td>
		 <td class="TD1"><input type="text" name="srate[]" value="" id="srate10" size="6" onChange="calcTotals()"/></td>
        <td class="TD1"><input type="text" name="value[]" value="" id="value10" size="6"/></td>
		<td class="TD1"><input type="text" name="mrp[]" value="" id="mrp10" size="6"/></td>
		<td class="TD1"><input type="text" name="sgst[]" value="" id="sgst10" size="6"/></td>
        <td class="TD1"><input type="text" name="cgst[]" value="" id="cgst10" size="6"/></td>
        <td class="TD1"><input type="text" name="vat[]" value="" id="vat10" size="6"/></td>
		<input type="hidden" name="vatamt[]" value="" id="vatamt10" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="" size="5" readonly>
		
       
		</tr>
		<tr>
		<td class="TD1"><input type="text" name="pname[]" value="" id="pname11" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=11','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" name="maniby[]" value="" id="maniby11" size="10"/></td>
		<td class="TD1"><input type="text" name="noi[]" value="" id="noi11" size="4"/></td>
        <td class="TD1"><input type="text" name="batch[]" value="" id="batch11" size="8"/></td>
		<td class="TD1"><input type="text" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate11" size="10"/></td>
		<td class="TD1"><input type="text" name="expdate[]" value="<?php echo date("d-m-Y"); ?>" id="expdate11" size="10"/></td>
		<td class="TD1"><input type="text" name="sqty[]" value="" id="sqty11" size="4" /></td>
        <td class="TD1"><input type="text" name="sfree[]" value="" id="sfree11" size="4"/></td>
		 <td class="TD1"><input type="text" name="srate[]" value="" id="srate11" size="6" onChange="calcTotals()"/></td>
        <td class="TD1"><input type="text" name="value[]" value="" id="value11" size="6"/></td>
		<td class="TD1"><input type="text" name="mrp[]" value="" id="mrp11" size="6"/></td>
		
        <td class="TD1"><input type="text" name="sgst[]" value="" id="sgst11" size="6"/></td>
        <td class="TD1"><input type="text" name="cgst[]" value="" id="cgst11" size="6"/></td>
        <td class="TD1"><input type="text" name="vat[]" value="" id="vat11" size="6"/>
		<input type="hidden" name="vatamt[]" value="" id="vatamt10" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="" size="5" readonly>
		</td>
       
		</tr>
		<tr>
		<td class="TD1"><input type="text" name="pname[]" value="" id="pname12" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=12','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" name="maniby[]" value="" id="maniby12" size="10"/></td>
		<td class="TD1"><input type="text" name="noi[]" value="" id="noi12" size="4"/></td>
        <td class="TD1"><input type="text" name="batch[]" value="" id="batch12" size="8"/></td>
		<td class="TD1"><input type="text" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate12" size="10"/></td>
		<td class="TD1"><input type="text" name="expdate[]" value="<?php echo date("d-m-Y"); ?>" id="expdate12" size="10"/></td>
		<td class="TD1"><input type="text" name="sqty[]" value="" id="sqty12" size="4" /></td>
        <td class="TD1"><input type="text" name="sfree[]" value="" id="sfree12" size="4"/></td>
		 <td class="TD1"><input type="text" name="srate[]" value="" id="srate12" size="6" onChange="calcTotals()"/></td>
        <td class="TD1"><input type="text" name="value[]" value="" id="value12" size="6"/></td>
		<td class="TD1"><input type="text" name="mrp[]" value="" id="mrp12" size="6"/></td>
        <td class="TD1"><input type="text" name="sgst[]" value="" id="sgst12" size="6"/></td>
        <td class="TD1"><input type="text" name="cgst[]" value="" id="cgst12" size="6"/></td>
		<td class="TD1"><input type="text" name="vat[]" value="" id="vat12" size="6"/>
		<input type="hidden" name="vatamt[]" value="" id="vatamt10" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="" size="5" readonly>
		</td>
       
		</tr>
		<tr>
		<td class="TD1"><input type="text" name="pname[]" value="" id="pname13" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=13','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" name="maniby[]" value="" id="maniby13" size="10"/></td>
		<td class="TD1"><input type="text" name="noi[]" value="" id="noi13" size="4"/></td>
        <td class="TD1"><input type="text" name="batch[]" value="" id="batch13" size="8"/></td>
		<td class="TD1"><input type="text" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate13" size="10"/></td>
		<td class="TD1"><input type="text" name="expdate[]" value="<?php echo date("d-m-Y"); ?>" id="expdate13" size="10"/></td>
		<td class="TD1"><input type="text" name="sqty[]" value="" id="sqty13" size="4" /></td>
        <td class="TD1"><input type="text" name="sfree[]" value="" id="sfree13" size="4"/></td>
		 <td class="TD1"><input type="text" name="srate[]" value="" id="srate13" size="6" onChange="calcTotals()"/></td>
        <td class="TD1"><input type="text" name="value[]" value="" id="value13" size="6"/></td>
		<td class="TD1"><input type="text" name="mrp[]" value="" id="mrp13" size="6"/></td>
        <td class="TD1"><input type="text" name="sgst[]" value="" id="sgst13" size="6"/></td>
        <td class="TD1"><input type="text" name="cgst[]" value="" id="cgst13" size="6"/></td>
		<td class="TD1"><input type="text" name="vat[]" value="" id="vat13" size="6"/>
		<input type="hidden" name="vatamt[]" value="" id="vatamt10" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="" size="5" readonly>
		</td>
       
		</tr>
		<tr>
		<td class="TD1"><input type="text" name="pname[]" value="" id="pname14" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=14','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" name="maniby[]" value="" id="maniby14" size="10"/></td>
		<td class="TD1"><input type="text" name="noi[]" value="" id="noi14" size="4"/></td>
        <td class="TD1"><input type="text" name="batch[]" value="" id="batch14" size="8"/></td>
		<td class="TD1"><input type="text" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate14" size="10"/></td>
		<td class="TD1"><input type="text" name="expdate[]" value="<?php echo date("d-m-Y"); ?>" id="expdate14" size="10"/></td>
		<td class="TD1"><input type="text" name="sqty[]" value="" id="sqty14" size="4" /></td>
        <td class="TD1"><input type="text" name="sfree[]" value="" id="sfree14" size="4"/></td>
		 <td class="TD1"><input type="text" name="srate[]" value="" id="srate14" size="6" onChange="calcTotals()"/></td>
        <td class="TD1"><input type="text" name="value[]" value="" id="value14" size="6"/></td>
		<td class="TD1"><input type="text" name="mrp[]" value="" id="mrp14" size="6"/></td>
        <td class="TD1"><input type="text" name="sgst[]" value="" id="sgst14" size="6"/></td>
        <td class="TD1"><input type="text" name="cgst[]" value="" id="cgst14" size="6"/></td>
		<td class="TD1"><input type="text" name="vat[]" value="" id="vat14" size="6"/>
		<input type="hidden" name="vatamt[]" value="" id="vatamt10" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="" size="5" readonly>
		</td>
       
		</tr>
   </tbody>
 </table>

 </div>
 </td>
 
  
  </tr>


</table>
<script>
                                                        function pay(mny)
                                                        {
                                                            var fe=document.getElementById("total").value;
                                                            if(mny==null || mny==""){mny=0;}
                                                            var sum=0;
                                                            sum=eval(fe)-eval(mny);
															var vd=document.getElementById("vatadd").value;
															sum1=eval(sum)+eval(vd);
                                                            document.getElementById("nettot").value=sum1.toString();
															document.getElementById("gtot").value=sum1.toString();
                                                        }
                                                </script>
<input type="hidden" name="rows" id="rows" value="0" >
<table width="100%" >
              	   <tr height="40">
              	     <td colspan="6" class="label1">&nbsp;</td>
              	     </tr>
              	   <tr>
              	   <td width="15%" class="label1">SGST: </td>
              	   <td width="9%" class="label1"><div align="left">
              	     <?php echo $vatadd/2; ?></div></td>
              	   <td width="21%" class="label1">No.of Items: </td>
              	   <td width="11%" class="label1"><div align="left">
              	    <input type="text" name="nitem" value="<?php echo ($p) ?>" id="nitem"/></div></td>
              	   <td width="25%" class="label1">Sub Total: </td>
              	   <td width="19%" align="left"><input type="text" name="total" value="<?php echo ($total)  ?>" id="total"/></td></tr>
				   <tr>
              	   <td class="label1">CGST: </td>
              	   <td class="label1"><div align="left">
              	     <?php echo $vatadd/2; ?></div></td>
              	   <td class="label1">&nbsp;</td>
              	   <td class="label1">&nbsp;</td>
              	   <td class="label1">Less Disc: </td>
              	   <td align="left"><input type="text" name="ds" value="<?php echo $dis ?>" id="ds" onkeyup="pay(this.value)"/></td>
            	   </tr>
              	 <tr>
              	   <td class="label1"><!--15% VAT:--> </td>
              	   <td class="label1"><div align="left">
              	     <?php  $vat14 ?></div></td>
              	   <td class="label1">&nbsp;</td>
              	   <td class="label1">&nbsp;</td>
              	   <td class="label1">ADD GST: </td>
              	   <td align="left"><input type="text" name="vatadd" value="<?php echo $vatadd ?>" id="vatadd"/></td>
            	   </tr>
              	 <tr>
                   <td colspan="5" class="label1">Net PAYABLE:</td>
              	   <td align="left"><input type="text" name="nettot" value="<?php echo $total+$vatadd ?>" id="nettot"/></td>
              	 </tr>
 

              	 <tr>
                   <td colspan="5" class="label1">Received By:</td>
              	   <td align="left"><input type="text" name="recby" value="<?php echo $recby ?>" /></td>
            	   </tr>
              	 </table>
				 <div align="center">
				 <input type="submit" name="update" value="Save" class="butt"/>
              <input type="button" value="Close" class="butt" onclick = "window.location.href='purchase_invoice_list.php'" > 
            </div>
			</form>
</div>
</div>
		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>