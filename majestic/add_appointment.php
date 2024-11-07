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
$docname = $_POST['docname'];
$adate1 = $_POST['adate'];
$adate=date('Y-m-d',strtotime($adate1));
$pname=$_POST['pname'];
$mno = $_POST['mno'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$address=$_POST['address'];
$user=$_POST['user'];
$time=$_POST['time'];
$sq="INSERT INTO dappointment(dname,adate,pname,mno,age,sex,address,user,cdate,time)VALUES('$docname','$adate','$pname','$mno','$age','$sex','$address','$user',now(),'$time')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='appointment_reg.php';";
			print "</script>";

}
else{
mysqli_error();}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD DOCTOR APPOINTMENT</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Doctor Name <font color="red">*</font> : </td>
<td>
	<select name="docname" required="reqired" id="docname" style="width:230px;height:20px;">
		<option value=""> -- Select Doctor Name -- </option>
		<?php include("config.php");
			$sq=mysqli_query($link,"select id,dname1 from doct_infor")or die(mysqli_error($link));
			$res=mysqli_num_rows($sq);
			while($row=mysqli_fetch_array($sq)){
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
	  <td class="label1"> Date of Appointment</td>
	  <td><input type="text" name="adate" class=" tcal" value="<?php echo date('d-m-Y'); ?>"/></td>
</tr>
<tr>	
	  <td class="label1"> Time</td>
	  <td><input type="text" name="time" id="time" class="text"  required /></td>
</tr>
<tr>
<td class="label1"><div align="right">Patient Name : </div></td>
	<td>
		<input type="text" name="pname" class="text" id="pname" placeholder="Enter Patient Name"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Mobile No : </div></td>
	<td>
		<input type="text" name="mno" class="text" id="mno" placeholder="Enter Mobile No"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Age : </div></td>
	<td>
		<input type="text" name="age" class="text" id="age" placeholder="Enter Age"  required/>
        <input type="hidden" name="user" class="text" id="user" value="<?php echo $aname; ?>"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Gender : </div></td>
	<td>
		<input type="radio" required="required" name="sex" id="sex1" value="male"/> Male <input type="radio" required="required" name="sex" id="sex2" value="female"/> Female
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Address : </div></td>
	<td>
		<textarea  name="address" class="text" id="address" rows="5" cols="35" ></textarea>
	  </td>
	
  </tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='appointment_reg.php'"/></td><td></td></tr></table>
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