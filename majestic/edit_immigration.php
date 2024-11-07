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
$imid = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$age = explode('to',$_POST['age']);
$phy = $_POST['phexam'];
$lab=$_POST['labtest'];
$xray1 = $_POST['xray'];
$hiv1 = $_POST['hiv'];

$sq="update immigration set min_age = '$age[0]',max_age = '$age[1]',phy = '$phy',lab='$lab',xray='$xray1',hiv='$hiv1' where id = $imid";
mysql_query($sq) or die(mysql_error()); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='immigration_details.php';";
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
		  
          <h1 style="color:red;" align="center">EDIT IMMIGRATION DETAILS</h1>
          
                      <form name="frm" method="post" action="">
<?php
include("config.php");


$sql = mysql_query("select * from immigration where id = $imid");
if($sql)
{
	$row = mysql_fetch_array($sql);
	
	$minage = $row['min_age'];
	$maxage = $row['max_age'];
	$age= $minage."to".$maxage;
	$phys = $row['phy'];
	$labtests = $row['lab'];
	$xray = $row['xray'];
	$hiv = $row['hiv'];
}

?>                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Age Group <font color="red">*</font> : </td>
<td>
	<select name="age" class="select" style="width:230px;height:20px;" required>
	  <option value="<?php echo $age; ?>"><?php echo $age; ?></option>
	   <option value="0to5">Under 5 Yrs</option>
	  <option value="5to11">5 To 11 Yrs</option>
	  <option value="11to15">11 To 15 Yrs</option>
	  <option value="15to100">Above 15 Yrs</option></select>
</td></tr>
<tr><td class="label1">Physical Exam Cost<font color="red">*</font> : </td><td><input type="text" name="phexam" id="phexam" value="<?php echo $phys; ?>" class="text" required/></td></tr>
<tr><td class="label1">Lab Tests Cost : </td><td><input type="text" name="labtest" id="labtest" class="text" value="<?php echo $labtests; ?>" required/></td></tr>
<tr><td class="label1">X-Ray Cost : </td><td><input type="text" name="xray" id="xray" class="text" value="<?php echo $xray; ?>" required/></td></tr>
<tr><td class="label1">HIV Test Cost : </td><td><input type="text" name="hiv" id="hiv" class="text" value="<?php echo $hiv; ?>"required/></td></tr>


<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='immigration_details.php'"/></td><td></td></tr></table>
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