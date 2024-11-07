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
$dcode = $_POST['docname'];
$aptday = $_POST['day'];
$intime=$_POST['intime'];
$outtime = $_POST['outtime'];
$remarks=$_POST['remarks'];

$sq="INSERT INTO doct_appmnt_sch(DOC_CODE,APPMNT_DAY,APPMNT_START_TIME,APPMNT_END_TIME,REMARKS,CURRENTDATE,AUTH_BY)VALUES('$dcode','$aptday','$intime','$outtime','$remarks',now(),'$aname')";
mysql_query($sq) or die(mysql_error()); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='add_duty_timings.php';";
			print "</script>";

}
else{
mysql_error();}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD DOCTOR DUTY TIMINGS</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Doctor Name <font color="red">*</font> : </td>
<td>
	<select name="docname" required="reqired" id="docname" style="width:230px;height:20px;">
		<option value=""> -- Select Doctor Name -- </option>
		<?php include("config.php");
			$sq=mysql_query("select id,dname1 from doct_infor");
			$res=mysql_num_rows($sq);
			while($row=mysql_fetch_array($sq)){
			 $docid = $row['id'];
			 $dname=$row['dname1'];
		
			?>
			<option value="<?php echo $docid;?>">
			<?php 
			echo $dname; ?>
			</option>
			<?php }?></select>
</td>
</tr>
 <tr>
	<td class="label1">Day <font color="red">*</font> : </td>
	<td>
		<select name="day" id="day" style="width:230px;height:20px;">
		<option value=""> -- Select Day -- </option>
		<option value="Sunday">Sunday</option>
		<option value="Monday">Monday</option>
		<option value="Tuesday">Tuesday</option>
		<option value="Wednesday">Wednesday</option>
		<option value="Thursday">Thursday</option>
		<option value="Friday">Friday</option>
		<option value="Saturday">Saturday</option>
		<option value="Everyday">Everyday</option>
		</select>
	</td>
</tr>
<tr>	
	  <td class="label1">In Time in 24 hours(HH:MM) : </td>
	  <td><input type="text" name="intime" class="text" placeholder="00:00:00"/></td>
</tr>
<tr>
  <td class="label1">Out Time in 24 hours(HH:MM) : </td>
  <td><input type="text" name="outtime" class="text" placeholder="00:00:00"/></td>
 
</tr>
<tr>
<td class="label1"><div align="right">Remarks : </div></td>
	<td>
		<textarea name="remarks" cols="34" rows="5"></textarea>
	  </td>
	
  </tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='doctor_duty_timings.php'"/></td><td></td></tr></table>
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