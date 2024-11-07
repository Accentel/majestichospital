<?php //include('config.php');

session_start();

if($_SESSION['name1'])
{
$aname= $_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	</head>

	<body>

	<div id="conteneur">
		
		  

		   <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		  
	
<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$rno = $_POST['rno'];
$locid=$_POST['locname'];
$nobeds = $_POST['nobeds'];
$rtype=$_POST['rtype'];
$ac = $_POST['ac'];
$oxy = $_POST['oxy'];
$fbed = $_POST['fbed'];
$rfee=$_POST['rfee'];
$mfee = $_POST['mfee'];
$nfee=$_POST['nfee'];
$ofee = $_POST['otherfee'];


$sq="INSERT INTO room_tariff(ROOM_NO,LOCATION,NO_BEDS,ROOM_TYPE,AC,OXYGEN,FBED,ROOM_FEE,MAINT_FEE,NURSE_FEE,OTHER_FEE,CURRENTDATE,AUTH_BY)VALUES('$rno','$locid','$nobeds','$rtype','$ac','$oxy','$fbed','$rfee','$mfee','$nfee','$ofee',now(),'$aname')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
	print "<script>";
	print "alert('Successfully Added ');";
	print "self.location='add_room_tariff.php';";
	print "</script>";
}
else{
mysqli_error($link);
}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD ROOM TARIFF</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Location <font color="red">*</font> : </td>
<td>
	<select name="locname" required="reqired" id="locname" style="width:230px;height:20px;">
		<option value=""> -- Select Location -- </option>
		<?php include("config.php");
			$sq=mysqli_query($link,"select DISTINCT FLOOR_CODE,FLOOR_NAME from location");
			$res=mysqli_num_rows($sq);
			while($row=mysqli_fetch_array($sq)){
			 $lid = $row['FLOOR_CODE'];
			 $lname=$row['FLOOR_NAME'];
		
			?>
			<option value="<?php echo $lid;?>">
			<?php 
			echo $lname; ?>
			</option>
			<?php }?></select>
</td>
<td class="label1">Room Type <font color="red">*</font> : </td>
<td>
		<select name="rtype" required="reqired" id="rtype" style="width:230px;height:20px;">
			<option value=""> -- Select Room Type -- </option>
			<?php //include("config.php");
				$sq=mysqli_query($link,"select ROOMTYPE_ID,ROOMTYPE from roomtype");
				$res=mysqli_num_rows($sq);
				while($row=mysqli_fetch_array($sq)){
				 $rid = $row['ROOMTYPE_ID'];
				 $rname=$row['ROOMTYPE'];
			
				?>
				<option value="<?php echo $rid;?>">
				<?php 
				echo $rname; ?>
				</option>
				<?php }?></select>
</td></tr>
<tr><td class="label1">Room No. <font color="red">*</font> : </td><td><input type="text" name="rno" id="rno" class="text" required/></td>
<td class="label1">No. of Beds <font color="red">*</font> : </td><td><input type="text" name="nobeds" id="nobeds" class="text" required/></td></tr>
<tr>
	<td class="label1"><div align="right">AC Room<font color="red">*</font> : </div></td>
	<td>

	  <div align="left">
		<input name="ac" type="radio" value="Yes" />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="ac" type="radio" value="No" />
		<strong>No</strong></div></td>
	<td class="label1"><div align="right">Oxygen Available<font color="red">*</font> : </div></td>
	<td>

	  <div align="left">
		<input name="oxy" type="radio" value="Yes" />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="oxy" type="radio" value="No" />
		<strong>No</strong></div></td>
  </tr>
<tr>
	<td class="label1"><div align="right">Function Bed<font color="red">*</font> : </div></td>
	<td>

	  <div align="left">
		<input name="fbed" type="radio" value="Yes" />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="fbed" type="radio" value="No" />
		<strong>No</strong></div></td>
</tr>
<tr>
	<td colspan="4"><div align="right">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td class="form_boxbg"><div align="left" style="padding-left:10px;"><font color="#000"><strong>Tariff Details </strong></font></div></td>
		  </tr>
	  </table>
	</div></td>            
 </tr>  
  
 <tr>
   <td class="label1"><div align="right">Bed Charges : </div></td>
   <td><div align="left">
     <input name="rfee" type="text" class="text" value=0 size="10"/>
   </div></td>
   <td width="25%" class="label1"><div align="right">DMO Charges : </div></td>
   <td width="35%" ><div align="left">
     <input name="mfee" type="text" class="text" value=0  size="10"/>
   </div></td>
            </tr>
 <tr>
   <td class="label1"><div align="right">Nursing Charges : </div></td>
   <td><div align="left">
     <input name="nfee" type="text" class="text" value=0 size="10" />
   </div></td>
   <td class="label1"><div align="right">Doctor Cons. Charges : </div></td>
   <td><div align="left">
     <input name="otherfee" type="text" class="text" value=0  size="10"/>
   </div></td>
 </tr>


<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='room_tariff.php'"/></td><td></td></tr></table>
	           </form>        
		
        
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