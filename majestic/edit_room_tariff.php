<?php //include('config.php');
session_start();
if($_SESSION['name1'])
{
$aname= $_SESSION['name1'];
}
else
{
session_destroy();
session_unset();
header('Location:login.php');
}
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
$rtid = $_REQUEST['id'];
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

$sq="update room_tariff set ROOM_NO = '$rno',LOCATION = '$locid',NO_BEDS = '$nobeds',ROOM_TYPE = '$rtype',AC = '$ac',OXYGEN = '$oxy',FBED = '$fbed', ROOM_FEE = '$rfee',MAINT_FEE = '$mfee',NURSE_FEE = '$nfee',OTHER_FEE = '$ofee',CURRENTDATE = now(),AUTH_BY ='$aname' where ROOM_ID = $rtid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
			print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='room_tariff.php';";
			print "</script>";

}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT ROOM TARIFF</h1>
          
                      <form name="frm" method="post" action="">
<?php
include("config.php");


$sql = mysqli_query($link,"select ROOM_NO, LOCATION, NO_BEDS, ROOM_TYPE, AC,OXYGEN,FBED, ROOM_FEE, MAINT_FEE, NURSE_FEE, OTHER_FEE,FLOOR_NAME,ROOMTYPE from room_tariff as a inner join location as b,roomtype as c where a.LOCATION=b.FLOOR_CODE and ROOM_ID=$rtid and a.ROOM_TYPE=c.ROOMTYPE_ID")or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	
	$roomno = $row['ROOM_NO'];
	$locaid = $row['LOCATION'];
	$noofbeds = $row['NO_BEDS'];
	$roomtype = $row['ROOM_TYPE'];
	$ac1 = $row['AC'];
	$oxy1 = $row['OXYGEN'];
	$fbed1 = $row['FBED'];
	$rmfee = $row['ROOM_FEE'];
	$mafee = $row['MAINT_FEE'];
	$nufee = $row['NURSE_FEE'];
	$otfee = $row['OTHER_FEE'];
	$locname = $row['FLOOR_NAME'];
	$rotype = $row['ROOMTYPE'];
}

?>                
<table width="100%" cellspacing="10" align="center">

<tr><td class="label1">Location <font color="red">*</font> : </td>
<td>
	<select name="locname" required="reqired" id="locname" style="width:230px;height:20px;">
		
		<?php //include("config.php");
			$sq=mysqli_query($link,"select DISTINCT FLOOR_CODE,FLOOR_NAME from location") or die(mysqli_error($link));
			$res=mysqli_num_rows($sq);
			while($row=mysqli_fetch_array($sq)){
			 $lid = $row['FLOOR_CODE'];
			 $lname=$row['FLOOR_NAME'];
		
			?>
			<option value="<?php echo $lname;?>" <?php if($locname==$lname){ echo 'selected';} ?>><?php echo $lname; ?></option>
			<?php }?></select>
</td>
<td class="label1">Room Type <font color="red">*</font> : </td>
<td>
		<select name="rtype" required="reqired" id="rtype" style="width:230px;height:20px;">
			
			<?php include("config.php");
				$sq=mysqli_query($link,"select ROOMTYPE_ID,ROOMTYPE from roomtype")or die(mysqli_error($link));
				$res=mysqli_num_rows($sq);
				while($row=mysqli_fetch_array($sq)){
				 $rid = $row['ROOMTYPE_ID'];
				 $rname=$row['ROOMTYPE'];
			
				?>
				<option value="<?php echo $rid;?>" <?php if($roomtype==$rid){ echo 'selected';} ?>><?php echo $rname; ?></option>
				<?php }?></select>
</td></tr>
<tr><td class="label1">Room No. <font color="red">*</font> : </td><td><input type="text" value="<?php echo $roomno?>" name="rno" id="rno" class="text" required/></td>
<td class="label1">No. of Beds <font color="red">*</font> : </td><td><input type="text" value="<?php echo $noofbeds?>" name="nobeds" id="nobeds" class="text" required/></td></tr>
<tr>
	<td class="label1"><div align="right">AC Room<font color="red">*</font> : </div></td>
	<td>

	  <?php if($ac1 == "Yes"){ ?>
		<div align="left">
		<input name="ac" type="radio" value="Yes" checked />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="ac" type="radio" value="No" />
		<strong>No</strong></div>
	<?php }
	else{ ?>
		<div align="left">
		<input name="ac" type="radio" value="Yes" />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="ac" type="radio" value="No" checked />
		<strong>No</strong></div>
	<?php } ?></td>
	<td class="label1"><div align="right">Oxygen Available<font color="red">*</font> : </div></td>
	<td>
		<?php if($oxy1 == "Yes"){ ?>
		<div align="left">
		<input name="oxy" type="radio" value="Yes" checked />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="oxy" type="radio" value="No" />
		<strong>No</strong></div>
		<?php }else{ ?>
		<div align="left">
		<input name="oxy" type="radio" value="Yes" />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="oxy" type="radio" value="No" checked />
		<strong>No</strong></div>
		<?php } ?>
		</td>
		
  </tr>
<tr>
	<td class="label1"><div align="right">Function Bed<font color="red">*</font> : </div></td>
	<td>
		<?php if($fbed1 == "Yes"){ ?>
		<div align="left">
		<input name="fbed" type="radio" value="Yes" checked />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="fbed" type="radio" value="No" />
		<strong>No</strong></div>
		<?php }else{ ?>
		<div align="left">
		<input name="fbed" type="radio" value="Yes" />
		<strong>Yes</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="fbed" type="radio" value="No" checked />
		<strong>No</strong></div>
		<?php } ?>
		</td>
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
     <input name="rfee" type="text" class="text" value="<?php echo $rmfee?>"/>
   </div></td>
   <td width="25%" class="label1"><div align="right">DMO Charges : </div></td>
   <td width="35%" ><div align="left">
     <input name="mfee" type="text" class="text" value="<?php echo $mafee?>"/>
   </div></td>
            </tr>
 <tr>
   <td class="label1"><div align="right">Nursing Charges : </div></td>
   <td><div align="left">
     <input name="nfee" type="text" class="text" value="<?php echo $nufee?>" />
   </div></td>
   <td class="label1"><div align="right">Doctor Cons. Charges : </div></td>
   <td><div align="left">
     <input name="otherfee" type="text" class="text" value="<?php echo $otfee?>"/>
   </div></td>
 </tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='room_tariff.php'"/></td><td></td></tr></table>
	           </form>        
		
        
        </div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>