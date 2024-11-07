<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	$res = mysqli_query($link,"select max(SUP_ID) FROM phr_supplier_mast")or die(mysqli_error($link));
	IF($res)
	{
		$row = mysqli_fetch_array($res);
		$sid = $row[0];	
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

		<?php /*?>  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
		?>
		  
		  <div id="centre" style="height:auto">
		  
          <h1 style="color:red;" align="center">ADD SUPPLIER INFORMATION</h1>
          
        <form name="form" method="post" action="insert_supplier_info.php">
                

<table width="100%" border="0" cellspacing="5" cellpadding="3">
	<tr><td colspan="4"><div class="style2" align="center">(* Marked Fields are Mandatory)</div></td></tr>
	  <tr>
		<td class="label1">Supplier Name <span class="style2">*</span> : </td>
		<td><input name="supname" type="text" class="text" id="supname" required /></td>
		<td class="label1">Supplier Code : </td>
		<td><input name="supcode" type="text" class="text" id="supcode" value="<?php echo "SUP".($sid+1); ?>" readonly /></td>
	  </tr>
	  <tr>
		<td class="label1">Supplier Type <span class="style2">*</span> : </td>
		<td><!--<input name="textfield3" type="text" class="text" id="textfield3" />-->
		<select name="suptype" class="select" style="width:230px;height:22px;" required>
		<option value=""> -- Supplier Type -- </option>
		<option value="v">Vendor</option>
		<option value="p">Pharmacy</option></select></td>
		
		<td class="label1">Phone No <span class="style2">*</span> : </td>
		<td><input name="pno1" type="text" class="text" id="pno1" required /></td>
	  </tr>
	  <tr>
		<td class="label1">Contact Person : </td>
		<td><input name="conperson" type="text" class="text" id="conperson" /></td>
		<td class="label1">Phone No(Contact Person) : </td>
		<td><input name="pno2" type="text" class="text" id="pno2" /></td>
	  </tr>
	  <tr>
		
		<td class="label1">Area : </td>
		<td><input name="area" type="text" class="text" id="area" /></td>
		<td class="label1">City <span class="style2">*</span> : </td>
		<td><input name="city" type="text" class="text" id="city" required/></td>
	  </tr>
	   <tr>
		<td class="label1">State <span class="style2">*</span> : </td>
		<td><input name="state" type="text" class="text" id="state" required/></td>
		<td class="label1">Country <span class="style2">*</span> : </td>
		<td><input name="country" type="text" class="text" id="country" value="India" required /></td>
	  </tr>
	   <tr>
		<td class="label1">Pincode : </td>
		<td><input name="pincode" type="text" class="text" id="pincode" /></td>
		<td class="label1">Fax : </td>
		<td><input name="fax" type="text" class="text" id="fax" /></td>
	  </tr>
	   <tr>
	   <td class="label1">Address <span class="style2">*</span> : </td>
		<td><textarea rows="3" cols="34" name="addr" id="addr" required></textarea><!--<input name="textfield4" type="text" class="text" id="textfield4" />--></td>
		<td class="label1">Email : </td>
		<td><input name="email" type="text" class="text" id="email" /></td>
	  </tr>
	   <tr>
		<td class="label1">DL.No20B : </td>
		<td><input name="aggrno" type="text" class="text" id="aggrno" /></td>
		<td class="label1">DL.No21B : </td>
		<td><input name="aggrdate" type="text" class="text"  id="aggrdate" /> 
		</td>
	  </tr>
	   <tr>
		<td class="label1">CST Reg.No : </td>
		<td><input name="cstno" type="text" class="text" id="cstno" /></td>
		<td class="label1">AP GST No : </td>
		<td><input name="gstno" type="text" class="text" id="gstno" /></td>
	  </tr>
	   <tr>
		<td class="label1">TIN No : </td>
		<td><input name="exno" type="text" class="text" id="exno" /></td>
		<td class="label1">Remarks : </td>
		<td><textarea rows="3" cols="34" name="remarks" id="remarks" ></textarea><!--<input name="textfield4" type="text" class="textbox" id="textfield4" />--></td>
	  </tr>
       <tr>
		<td class="label1">FSSAI No : </td>
		<td><input name="fsno" type="text" class="text" id="fsno" /></td>
		 </tr>


<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" onclick ="fun();" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='supplier_info_list.php'"/></td></tr>

<tr height=""><td><br /><br /></td></tr>
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