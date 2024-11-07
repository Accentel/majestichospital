<?php //include('config.php');
session_start();
if($_SESSION['name1'])
{
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
		<div id="centre">
          <h1 style="color:red;" align="center">Update Doctor's Information</h1>
          
                      <form name="frm" method="post" >
                

 <?php
 include("config.php");
	$id=$_GET['id1'];
	//echo $id;
	$sql2=mysqli_query($link,"select * from doct_infor where id='$id'") or die(mysqli_error($link));
	while($resu=mysqli_fetch_array($sql2))
	{
		$studname=$resu['spec1'];
		
		$add=$resu['dname1'];
		$contact_name=$resu['desc1'];
		$phone=$resu['dsi1'];
		$alter_phone=$resu['dept1'];
		$land=$resu['ddt1'];
		$land1=$resu['pnum1'];
		$land2=$resu['mnum1'];
		$land3=$resu['addr1'];
		$land4=$resu['fee1'];
		$krk=$resu['id'];
		$wdays=$resu['wdays'];
		$stime=$resu['stime'];
		$etime=$resu['etime'];
		$edays=$resu['edays'];
		$sql = mysqli_query($link,"select dept_name from dept where dept_code=$alter_phone");
		 if($sql){
			$res = mysqli_fetch_array($sql);
			$dept = $res[0];
		 }
	}
	?>

<table width="90%" cellspacing="10">
<input type="hidden" name="krk" value="<?php echo $krk;?>" />
<tr><td class="label1">Specialization <font color="red">*</font> : </td><td><input type="text" name="spec"  class="text"  value="<?php echo $studname?>" id="spec" /></td><td class="label1">Doctor Name <font color="red">*</font> : </td><td width="10%"><input type="text" class="text"  value="<?php echo $add?>"  name="dname" id="dname" width="90%" /></td></tr>

<tr><td class="label1">Designation <font color="red">*</font> : </td><td><input type="text" class="text"  value="<?php echo $contact_name?>"  name="desc" id="desc" /></td><td class="label1">Qualifcation <font color="red">*</font> : </td><td><input type="text" class="text"  value="<?php echo $phone?>"  name="dsi" id="dsi" /></td></tr>

<tr><td class="label1">Department Name <font color="red">*</font> : </td><td><select name="dept" id="dept" style="width:230px;height:20px;"><option value="<?php echo $alter_phone?>" ><?php echo $dept?></option>
<?php
//include("config.php");

$sql = mysqli_query($link,"select * from dept");
if($sql)
{
	while($row = mysqli_fetch_array($sql))
	{
?>
<option value="<?php echo $row['DEPT_CODE'] ?>"><?php echo $row['DEPT_NAME'] ?></option>
<?php		
	}
}
?>
</select></td><td class="label1">Doctor Duty Type <font color="red">*</font> : </td><td><input type="text" class="text"  value="<?php echo $land?>"  name="ddt"  id="ddt" /></td></tr>

<tr><td class="label1">Phone Number : </td><td><input type="text" class="text"  name="pnum" value="<?php echo $land1?>"  id="pnum" /></td><td class="label1">Mobile Number <font color="red">*</font> : </td><td><input type="text" class="text"  name="mnum" value="<?php echo $land2?>"  id="mnum" /></td></tr>

<tr><td class="label1">Address : </td><td><textarea name="addr" id="addr" cols="34" rows="4"/><?php echo $land3?></textarea></td><td class="label1">Consultant Fee <font color="red">*</font> : </td><td><input type="text" class="text" value="<?php echo $land4?>"  name="fee" id="fee" /></td></tr>

<tr><td class="label1">Days1 : </td><td><input type="text" class="text"  name="wdays" value="<?php echo $wdays?>"  id="wdays" /></td><td class="label1">Days1 Time <font color="red">*</font> : </td><td><input type="text" class="text"  name="stime" value="<?php echo $stime?>"  id="stime" /></td></tr>
<tr><td class="label1">Days2 : </td><td><input type="text" class="text"  name="edays" value="<?php echo $edays?>"  id="edays" /></td><td class="label1">Days2 Time <font color="red">*</font> : </td><td><input type="text" class="text"  name="etime" value="<?php echo $etime?>"  id="etime" /></td></tr>

<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" value="Close" class="butt" id="reset" onclick="window.location.href='doctor_list.php'"/></td></tr></table>     
		 </div>

<?php
	if(isset($_POST['submit']))
	{	
		$sid=$_POST['spec'];
		
	
		$admin=$_POST['dname'];
		$studio_name=$_POST['desc'];
	
		$std_address=$_POST['dsi'];

		$contact_person=$_POST['dept'];

		$phone=$_POST['ddt'];
		$alternative=$_POST['pnum'];
		$land=$_POST['mnum'];
		$land1=$_POST['addr'];
		$land2=$_POST['fee'];
		$id1=$_POST['krk'];
		
		$wdays1=$_POST['wdays'];
		$stime1=$_POST['stime'];
		$etime1=$_POST['etime'];
		$edays1=$_POST['edays'];
		//$land3=$_POST['mnum'];
		 $sql3="UPDATE doct_infor SET spec1='$sid', dname1='$admin', desc1='$studio_name',wdays='$wdays1',stime='$stime1',etime='$etime1',edays='$edays1', dsi1='$std_address', dept1='$contact_person', ddt1='$phone',pnum1='$alternative',mnum1='$land',addr1='$land1',fee1='$land2' WHERE id='$id1'";
		$result1=mysqli_query($link,$sql3);
		if($result1)
		{	
			print "<script>";
			print "alert('Successfully Updated');";
			print "self.location='doctor_list.php';";
			print "</script>";
		}else{
			print "<script>";
			print "alert('unable to update');";
			print "self.location='doctor_list.php';";
			print "</script>";
		}
	}
?>

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