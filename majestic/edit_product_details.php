<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	$prd_code=$_REQUEST['id'];
	//$ss= mysqli_query("select a.TYPE, PRD_NAME,a.UNIT_CODE,vattax,a.pack_code,b.prdtype_name,unit_name,e.packing_name,mani_by,HSN from phr_prddetails_mast a,phr_prdtype_mast b,phr_unit_mast c,phr_packing_mast e where a.unit_code=c.unit_code and a.type=b.prdtype_code and a.pack_code=e.packing_code and  a.prd_code='$prd_code'");
	$ss=mysqli_query($link,"select * from  phr_prddetails_mast where id='$prd_code'")or die(mysqli_error($link));
	if($ss){
		$row = mysqli_fetch_array($ss);
		$prdcode=$prd_code;
		$id=$row['id'];
		 //$prdtype_code=$row['PRD_NAME'];
		 $prd_name=$row['PRD_NAME'];
	 	// $unit_code=$row[2];
		$vat=$row['vattax']; 
		// $pck_id=$row[4];
		 $type_name=$row['TYPE'];
		 $maniby=$row['mani_by'];
		 $hsn=$row['HSN'];
		 $sgst=$row['sgst'];
		 $cgst=$row['cgst'];
		 
		 
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
<script>
	function save()
	{
	

//Product Name
  if(document.form.prdname.value=="")
	{
		alert("Product Name field is Empty");
		document.form.prdname.focus();
        return(false);
	}

 if(document.form.maniby.value=="")
	{
		alert("Manufactured By field is Empty");
		document.form.maniby.focus();
        return(false);
	}
var checkOK = " ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz/._0123456(){}[]-";
var checkStr = document.form.maniby.value;
var allValid = true;
for (i = 0;  i < checkStr.length;  i++)
{
ch = checkStr.charAt(i);
for (j = 0;  j < checkOK.length;  j++)
if (ch == checkOK.charAt(j))
break;
if (j == checkOK.length)
{
allValid = false;
break;
}
}
if (!allValid)
{
alert("Please enter Letters  in the \"Manufactured By\" field.");
document.form.maniby.focus();
document.form.maniby.value="";
return (false);
}


	document.form.action="Productdetails_Update.jsp";
    document.form.submit();
	}
	</script>
	</head>

	<body >

	<div id="conteneur" class="container">

		  <?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
		?>
		  
		  <div id="centre" style="min-height:500px !important;">
		  
          <h1 style="color:red;" align="center">EDIT PRODUCT DETAILS</h1>
          
        <form name="myform" method="post" action="update_product_details.php">
             <input type="hidden" name="authby" value="<?php echo $aname ?>"/>   
<table width="100%" cellspacing="10" class="table" align="center">
<tr>
  
	<td ><input name="id" type="hidden" class="text" id="prdcode" value="<?php  echo $id ?>" readonly />
	</td>
</tr>
<tr>
	<td class="label1">Product Name <span class="style2">*</span> : </td>
	<td><input name="prdname" type="text" class="text" id="prdname" required value="<?php echo $prd_name ?>"/></td>
  </tr>	
<tr>
   <td class="label1">Type Name <span class="style2">*</span> : </td>
	<td >
	<select name="typename" id="typename" required  class="text">
	<option value="">select</option>
	 <?php
	   
		$sql = mysqli_query($link,"select prdtype_code,prdtype_name from phr_prdtype_mast order by prdtype_name")or die(mysqli_error($link));
		if($sql){
			while($row = mysqli_fetch_array($sql))
			{
				$prdcode=$row[0];
				$prdname=$row[1];
				
	?>
	<option value="<?php echo $prdname ?>" <?php if($prdname==$type_name){ echo 'selected'; } ?>><?php echo $prdname ?></option>
	<?php
			}
		}
	?>
	</select></td> </tr>
  
	
    
    
     <tr>
	<td class="label1">GST(%) <span class="style2">*</span> : </td>
	<td>
	<select name="vtax" id="vtax" required  class="text">
	<option> --- Select GST Tax --- </option>
    
	<option value="0" <?php if($vat=='0'){echo "selected";}  ?>>0</option>
    <option value="5" <?php if($vat=='5'){echo "selected";}  ?>>5</option>
	<option value="12" <?php if($vat=='12'){echo "selected";}  ?>>12</option>
	<option value="18" <?php if($vat=='18'){echo "selected";}  ?>>18</option>
    <option value="28" <?php if($vat=='28'){echo "selected";}  ?>>28</option>
    
	</select>				</tr>
    
    
     <tr>
	<td class="label1"> SGST(%) <span class="style2">*</span> : </td>
	<td>
	<select name="sgst" id="sgst" required  class="text">
	<option> --- Select SGST Tax --- </option>
    <option value="0" <?php if($vat=='0'){echo "selected";}  ?>>0</option>
	<option value="2.5" <?php if($sgst=='2.5'){echo "selected";}  ?>>2.5</option>
	<option value="6" <?php if($sgst=='6'){echo "selected";}  ?>>6</option>
	<option value="9" <?php if($sgst=='9'){echo "selected";}  ?>>9</option>
    <option value="18" <?php if($sgst=='14'){echo "selected";}  ?>>14</option>
    
 
	</select>				</tr>
    
     <tr>
	<td class="label1">CGST(%) <span class="style2">*</span> : </td>
	<td>
	<select name="cgst" id="cgst" required  class="text">
	<option> --- Select CGST Tax --- </option>
    <option value="0" <?php if($vat=='0'){echo "selected";}  ?>>0</option>
	<option value="2.5" <?php if($cgst=='2.5'){echo "selected";}  ?>>2.5</option>
	<option value="6" <?php if($cgst=='6'){echo "selected";}  ?>>6</option>
	<option value="9" <?php if($cgst=='9'){echo "selected";}  ?>>9</option>
    <option value="18" <?php if($cgst=='14'){echo "selected";}  ?>>14</option>
	</select>				</tr>
 
   
  <?php /*?> <tr>
	<td class="label1">Vat Tax(%) <span class="style2">*</span> : </td>
	<td>
	<select name="vtax" id="vtax" required style="width:230px;height:22px;">
	<option value="">Select</option>
	<option value="5" <?php if($vat=='5.00'){echo "selected";}  ?>>5</option>
	<option value="14.5" <?php if($vat=='14.50'){echo "selected";}  ?>>14.5</option>
	<option value="15" <?php if($vat=='15.00'){echo "selected";}  ?>>15</option>
	</select>				</tr><?php */?>
	 <tr>
	<td class="label1">HSN<span class="style2">*</span> : </td>
	<td><input name="hsn" type="text" class="text" id="hsn" required value="<?php echo $hsn ?>" /></td>
  </tr>
   <tr>
	<td class="label1">Manufactured By <span class="style2">*</span> : </td>
	<td><input name="maniby" type="text" class="text" id="maniby" required value="<?php echo $maniby ?>" /></td>
  </tr>

<tr height="10px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='product_details_list.php'"/></td></tr></table>
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