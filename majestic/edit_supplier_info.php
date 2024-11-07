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
			include("header.php");
		?>
	
	<style>
	.style2{
		color:red;
	}
	</style>

	</head>

	<body >

	<div id="conteneur">

		 <?php /*?> <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
		?>
		  
		  <div id="centre" style="height:auto">
		  
          <h1 style="color:red;" align="center">EDIT SUPPLIER INFORMATION</h1>
          
        <form name="form" method="post" action="update_supplier_info.php">
                

<table width="100%" border="0" cellspacing="5" cellpadding="3">
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

<tr height="5px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='supplier_info_list.php'"/></td></tr>


</table>

</form>        
		
        
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