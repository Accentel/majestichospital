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
$disid = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$disname = $_POST['disname'];
$discode = $_POST['discode'];
$hist=$_POST['hist'];
$diag = $_POST['diag'];
$treat = $_POST['treat'];

$sq="update disease_history set disease_name = '$disname',disease_id = '$discode',history = '$hist',diagnosis='$diag',treatment_given='$treat',CURRENTDATE=now(), AUTH_BY='$aname' where ID = $disid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='disease_history.php';";
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
		  
          <h1 style="color:red;" align="center">EDIT DISEASE HISTORY</h1>
          
                      <form name="frm" method="post" action="">
<?php
//include("config.php");


$sql = mysqli_query($link,"select * from disease_history where ID = $disid");
if($sql)
{
	$row = mysqli_fetch_array($sql);
	
	$diseaname = $row['disease_name'];
	$diseahis = $row['history'];
	$diagno = $row['diagnosis'];
	$treatment = $row['treatment_given'];
	$diseacode = $row['disease_id'];
}

?>                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Disease Name <font color="red">*</font> : </td><td><input type="text" name="disname" id="disname" class="text" value="<?php echo $diseaname; ?>" required/></td></tr>
<tr><td class="label1">Disease Code <font color="red">*</font> : </td><td><input type="text" name="discode" id="discode" class="text" value="<?php echo $diseacode; ?>" required/></td></tr>
<tr><td class="label1">History : </td><td><textarea name="hist" id="hist" cols="34" style="width:100%" class="text" rows="3"><?php echo $diseahis; ?></textarea></td></tr>
<tr><td class="label1">Diagnosis : </td><td><textarea name="diag" id="diag" cols="34" rows="3" style="width:100%" class="text"><?php echo $diagno; ?></textarea></td></tr>
<tr><td class="label1">Treatment Given : </td><td><textarea name="treat" id="treat" cols="34" rows="3" style="width:100%" class="text"><?php echo $treatment; ?></textarea></td></tr>

<tr><td style="height:15px;"></td></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='disease_history.php'"/></td><td></td></tr></table>
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