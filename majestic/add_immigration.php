<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
	$aname = $_SESSION['name1'];
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
$age = explode('to',$_POST['age']);
$phy = $_POST['phexam'];
$lab=$_POST['labtest'];
$xray = $_POST['xray'];
$hiv = $_POST['hiv'];


$sq="INSERT INTO immigration(min_age,max_age,phy,lab,xray,hiv)VALUES('$age[0]','$age[1]','$phy','$lab',$xray,'$hiv')";
mysql_query($sq) or die(mysql_error()); 
if($sq){
print "<script>";
			print "alert('Successfully Added');";
			print "self.location='add_immigration.php';";
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
		  
          <h1 style="color:red;" align="center">ADD IMMIGRATION DETAILS</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Age Group <font color="red">*</font> : </td>
<td>
	<select name="age" class="select" style="width:230px;height:20px;" required>
	  <option value=""> -- Select -- </option>
	   <option value="0to5">Under 5 Yrs</option>
	  <option value="5to11">5 To 11 Yrs</option>
	  <option value="11to15">11 To 15 Yrs</option>
	  <option value="15to100">Above 15 Yrs</option></select>
</td></tr>
<tr><td class="label1">Physical Exam Cost<font color="red">*</font> : </td><td><input type="text" name="phexam" id="phexam" class="text" required/></td></tr>
<tr><td class="label1">Lab Tests Cost : </td><td><input type="text" name="labtest" id="labtest" class="text" required/></td></tr>
<tr><td class="label1">X-Ray Cost : </td><td><input type="text" name="xray" id="xray" class="text" required/></td></tr>
<tr><td class="label1">HIV Test Cost : </td><td><input type="text" name="hiv" id="hiv" class="text" required/></td></tr>

<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='immigration_details.php'"/></td><td></td></tr></table>
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