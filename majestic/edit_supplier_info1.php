<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	
	$scode = $_REQUEST['id'];
	$sql=mysqli_query($link,"select suppl_name,type,addr1,city,state,country,pincode,area,phone1,fax1,email,contact_person,phone2,agr_no,agr_date,cst_reg_no,apgst_no,ecc_no,remarks,fsno from phr_supplier_mast where suppl_code='$scode'")or die(mysqli_error($link));
if($sql){

while($row = mysqli_fetch_array($sql))
{
	 $supname=$row[0];
	 $suptype=$row[1];
	 $addr=$row[2];
	 $city=$row[3];
	 $state=$row[4];
	 $country=$row[5];
	 $pincode=$row[6];
	 $area=$row[7];
	 $pno1=$row[8];
	 $fax=$row[9];
	 $email=$row[10];
	 $conperson=$row[11];
	 $pno2=$row[12];
	 $aggrno=$row[13];
	 $aggrdate=$row[14];
	 $cstno=$row[15];
	 $gstno=$row[16];
	 $exno=$row[17];
	 $remarks=$row[18];
	 $fsno=$row['19'];
}
        if($pno1=="")
		{
			$pno1="---";
		}
		if($conperson=="")
		{
			$conperson="---";
		}
		if($pno2=="")
		{
			$pno2="---";
		}
		if($area=="")
		{
			$area="---";
		}
		if($pincode=="")
		{
			$pincode="---";
		}
		if($fax=="")
		{
			$fax="---";
		}
		if($email=="")
		{
			$email="---";
		}
		if($aggrno=="")
		{
			$aggrno="---";
		}
		if($cstno=="")
		{
			$cstno="---";
		}
		if($gstno=="")
		{
			$gstno="---";
		}
		if($exno=="")
		{
			$exno="---";
		}
		if($remarks=="")
		{
			$remarks="---";
		}
}		
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

	</head>
    
    <script type="text/javascript">
function val1(str,id)
{




var doscount=document.getElementById("dis"+id).value;
var doscount1=document.getElementById("bal"+id).value;
//alert(doscount);
//if(doscount=='' || doscount==null){doscount=0;}
//if(doscount==0){
//document.getElementById("pamt"+id).value=Math.abs(srate2);
document.getElementById("nbalk"+id).value=Math.abs((eval(doscount1))-(eval(doscount)));
//}else{
//var value=document.getElementById("value"+id).value;
//document.getElementById("amt"+id).value=Math.abs((eval(value))-(eval(value))*(eval(str))/100);
//document.getElementById("total").value=vall;
//}
}

</script>
    
    
    
  
<script type="text/javascript">
function val(str,id)
{




var doscount=document.getElementById("pamt"+id).value;
var doscount1=document.getElementById("nbalk"+id).value;
//alert(doscount);
//if(doscount=='' || doscount==null){doscount=0;}
//if(doscount==0){
//document.getElementById("pamt"+id).value=Math.abs(srate2);
document.getElementById("nbal"+id).value=Math.abs((eval(doscount1))-(eval(doscount)));
//}else{
//var value=document.getElementById("value"+id).value;
//document.getElementById("amt"+id).value=Math.abs((eval(value))-(eval(value))*(eval(str))/100);
//document.getElementById("total").value=vall;
//}
}

</script>

	<body >

	<div id="conteneur container">

		  <?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php */?><?php
		include("logo.php");
			include("main_menu.php");
		?>
		  
		 <div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
		  
          <h1 style="color:red;" align="center">EDIT SUPPLIER INFORMATION</h1>
          
        <form name="form" method="post" action="update_supplier_info1.php">
                

<table width="100%" border="0" class="table" cellspacing="5" cellpadding="3">
	<tr><td colspan="4"><div class="style2" align="center">(* Marked Fields are Mandatory)</div></td></tr>
	  <tr>
		<td class="label1">Supplier Name <span class="style2">*</span> : </td>
		<td><input name="supname" type="text" class="text" id="supname" required value="<?php echo $supname; ?>"/></td>
		<td class="label1">Supplier Code : </td>
		<td><input name="supcode" type="text" class="text" id="supcode" value="<?php echo $scode; ?>" readonly /></td>
	  </tr>
	  <tr>
		<td class="label1">Supplier Type <span class="style2">*</span> : </td>
		<td><!--<input name="textfield3" type="text" class="text" id="textfield3" />-->
		<select name="suptype" class="select" style="width:230px;height:22px;" required>
		<?php
			if($suptype == "v"){
		?>	
		<option value="v" selected>Vendor</option>
		<option value="p">Pharmacy</option>
		<?php
			}
			elseif($suptype == "p"){
		?>
		<option value="v">Vendor</option>
		<option value="p" selected>Pharmacy</option>
		<?php
			}
		?>		
		</select>
		
		</td>
		
		<td class="label1">Phone No <span class="style2">*</span> : </td>
		<td><input name="pno1" type="text" class="text" id="pno1" value="<?php echo $pno1; ?>" required /></td>
	  </tr>
	  <tr>
		<td class="label1">Contact Person : </td>
		<td><input name="conperson" type="text" class="text" id="conperson" value="<?php echo $conperson; ?>" /></td>
		<td class="label1">Phone No(Contact Person) : </td>
		<td><input name="pno2" type="text" class="text" id="pno2" value="<?php echo $pno2; ?>" /></td>
	  </tr>
	  <tr>
		
		<td class="label1">Area : </td>
		<td><input name="area" type="text" class="text" id="area" value="<?php echo $area; ?>" /></td>
		<td class="label1">City <span class="style2">*</span> : </td>
		<td><input name="city" type="text" class="text" id="city" required value="<?php echo $city; ?>"/></td>
	  </tr>
	   <tr>
		<td class="label1">State <span class="style2">*</span> : </td>
		<td><input name="state" type="text" class="text" id="state" value="<?php echo $state; ?>" required/></td>
		<td class="label1">Country <span class="style2">*</span> : </td>
		<td><input name="country" type="text" class="text" id="country" value="<?php echo $country; ?>" required /></td>
	  </tr>
	   <tr>
		<td class="label1">Pincode : </td>
		<td><input name="pincode" type="text" class="text" id="pincode" value="<?php echo $pincode; ?>" /></td>
		<td class="label1">Fax : </td>
		<td><input name="fax" type="text" class="text" id="fax" value="<?php echo $fax; ?>" /></td>
	  </tr>
	   <tr>
	   <td class="label1">Address <span class="style2">*</span> : </td>
		<td><textarea rows="3" cols="34" name="addr" id="addr" required><?php echo $addr; ?></textarea><!--<input name="textfield4" type="text" class="text" id="textfield4" />--></td>
		<td class="label1">Email : </td>
		<td><input name="email" type="text" class="text" id="email" value="<?php echo $email; ?>" /></td>
	  </tr>
      
      <tr>
		<td class="label1">DL.No20B : </td>
		<td><input name="aggrno" type="text" class="text" id="aggrno" value="<?php echo $aggrno; ?>" /></td>
		<td class="label1">DL.No21B : </td>
		<td><input name="aggrdate" type="text" class="text"  id="aggrdate" value="<?php echo $aggrdate; ?>" /> 
		</td>
	  </tr>
      
	  
	   <tr>
		<td class="label1">CST Reg.No : </td>
		<td><input name="cstno" type="text" class="text" id="cstno" value="<?php echo $cstno; ?>" /></td>
		<td class="label1">AP GST No : </td>
		<td><input name="gstno" type="text" class="text" id="gstno" value="<?php echo $gstno; ?>" /></td>
	  </tr>
	   <tr>
		<td class="label1">TIN No : </td>
		<td><input name="exno" type="text" class="text" id="exno" value="<?php echo $exno; ?>" /></td>
		<td class="label1">Remarks : </td>
		<td><textarea rows="3" cols="34" name="remarks" id="remarks" ><?php echo $remarks; ?></textarea><!--<input name="textfield4" type="text" class="textbox" id="textfield4" />--></td>
	  </tr>
       <tr>
		<td class="label1">FSSAI No : </td>
		<td><input name="fsno" type="text" class="text" id="fsno"  value="<?php echo $fsno?>" /></td>
		 </tr>
         </table>
         
         
        </form>
          <table width="100%" class="table" border="1">
     
     <tr><td><strong>Sno</strong></td><td><strong>Invoive No</strong></td>
     <td><strong>Bill Date</strong></td><td><strong>Total Amount</strong></td><td><strong>Disc</strong></td><td><strong>Paid Amount</strong></td>
     <td><strong>Balance Amount</strong></td>
     
     <td><strong>Recpt No</strong></td>
      <td><strong>Discount Amount</strong></td>
     <td><strong>Now Pay Amount</strong></td>
    
     <td><strong>Remain Amount</strong></td>
     <td><strong>VIEW</strong></td>
     
     </tr>
     
     
     <?php
	 $scode = $_REQUEST['id'];
	 $x=0;
	$i=1;
	 $sql = mysqli_query($link,"select * from phr_purinv_mast  where SUPPL_CODE='$scode' order by LR_NO desc")or die(mysqli_error($link));
	 while($r=mysqli_fetch_array($sql)){
		 $i1=$i;
		 $x=$x+1;

	 ?>
	
     <form name="frm" method="post" action=""> 
     <tr><td><?php echo $x?></td><td><?php  echo $s=$r['SUPPL_INV_NO'];?></td>
     <td><?php $adate=$r['INV_DATE'];  echo $b=date("d-m-Y", strtotime($adate)); ?></td>
     
     <td><?php echo $r['TOTAL'];?></td>
      <td><?php echo $ddd=$r['discount'];?></td>
     <td><?php echo $r['paid'];?></td><td><?php echo $b=$r['bal'];?>
     <input name="supcode" type="hidden" class="text" id="supcode" value="<?php echo $scode; ?>" readonly />
     
     
     <input name="inv" type="hidden" class="text" id="inv" value="<?php echo $s; ?>" readonly />
     <input name="lr_no<?php echo $x ?>" type="hidden" class="text" id="lr_no<?php echo $x ?>" value="<?php echo $r['LR_NO']; ?>" readonly />
      <input type="hidden" name="tpaid<?php echo $x ?>" id="tpaid<?php echo $x ?>" value="<?php echo  $r['paid']?>" />
     <input type="hidden" name="bal<?php echo $x ?>" id="bal<?php echo $x ?>" value="<?php echo $b?>" />
     <input type="hidden" name="tot<?php echo $x ?>" id="tot<?php echo $x ?>" value="<?php echo $r['TOTAL'];?>" />
     <input type="hidden" name="dd_dis<?php echo $x ?>" id="dd_dis<?php echo $x ?>" value="<?php echo $ddd?>" />
     </td>
      <td><input type="tel" name="recpt<?php echo $x ?>" /></td>
      <td><input type="text" name="dis<?php echo $x ?>" id="dis<?php echo $x ?>" onkeyup="val1(this.value,<?php echo $x ?>)" /></td>
    
      
     <td><input type="text" name="pamt<?php echo $x ?>" id="pamt<?php echo $x ?>" onkeyup="val(this.value,<?php echo $x ?>)" /></td>
  <input type="hidden" name="nbalk<?php echo $x ?>" id="nbalk<?php echo $x ?>" value="<?php echo $b?>" readonly="readonly" />
    <td><input type="text" name="nbal<?php echo $x ?>" id="nbal<?php echo $x ?>" value="<?php echo $b?>" readonly="readonly" /></td>
    <td><a href="sup_view.php?id=<?php echo $r['LR_NO']; ?>&inv=<?php echo $s; ?>&sup=<?php echo $scode; ?>"><img src="images/view.gif" /></a></td>
     </tr><input type="hidden" name="rows" id="rows" value="<?php echo $i ?>"/>
     
      <input type="hidden" name="x" id="x" value="<?php echo $i ?>"/>
            
			
      <?php  $i++;  }?></table><table>
    
         
         

<tr height="5px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;
<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='supplier_info_list2.php'"/></td></tr>


</table>

</form>       


 <?php if(isset($_POST['submit'])){
			$supcode=$_POST['supcode'];	
			//$lr_no=$_POST['lr_no'];
			//$paid=$_POST['paid'];
			//$paid1=$_POST['paid1'];
			//$paid2=$paid1+$paid;
			//$bal=$_POST['bal'];
			$d=date('Y-m-d');
			//$chq_num=$_POST['chq_num'];
			//$chq_date=$_POST['chq_date'];
			//$bank=$_POST['bank'];
			//$payment_type=$_POST['payment_type'];
			
			
			
			//echo $i = $_REQUEST['x'];
			 $count = $_REQUEST['rows'];
			// $cont=1;
//echo $count;
for($m=1;$m <= $count;$m++)
{
//echo $count;
//echo $m;
 $bal=$_REQUEST['bal'.$m];
//$tot=$_REQUEST['mfg'+$m];
//$exp=$_REQUEST['exp'+$m];
$pamt=$_REQUEST['pamt'.$m];
$nbal=$_REQUEST['nbal'.$m];
$tpaid=$_REQUEST['tpaid'.$m];
$tot=$_REQUEST['tot'.$m];
 $lr_no=$_REQUEST['lr_no'.$m];
 $recpt=$_REQUEST['recpt'.$m];
$paid2=$tpaid+$pamt;
 $dis=$_REQUEST['dis'.$m];
 $ddd=$_REQUEST['ddd'.$m];
//$amt=$_REQUEST['amt'.$m];
	 $dis_amt=$dis+$ddd;		
			
			  $dx="update phr_purinv_mast set paid='$paid2',bal='$nbal',discount='$dis_amt' where suppl_code='$supcode' and LR_NO='$lr_no'"; 
			$sq=mysqli_query($link,$dx)or die(mysqli_error($link));
			if($pamt!=''){
				 $f="insert into `sup_amount`(sup_code,tamt,paid,bal,date1,status1,LR_NO,recpt_num,discount)
			values('$supcode','$tot','$pamt','$bal','$d','1','$lr_no','$recpt','$dis')";
			$cc=mysqli_query($link,$f)or die(mysqli_error($link));
			}
			
} 
				if($sq)
{
	print "<script>";
	print "alert('successfully Updated');";
	print "self.location='supplier_info_list2.php'";
	print "</script>";
}
			}
				?>

 
	<script type="text/javascript">
		$(function(){
$('#pamt').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#bal').val());
    $('#nbal').val(totalpoints - balance);
});



});//]]>  
</script>	
        
        </div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}
else
{

session_destroy();

session_unset();

header('Location:login.php');

}

?>