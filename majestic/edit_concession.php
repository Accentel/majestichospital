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
$cid = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$cname = $_POST['cname'];
$cper = $_POST['cper'];
$remarks=$_POST['remarks'];

$sq="update concession_type set CONCE_NAME = '$cname',CONCE_PER = '$cper',REMARKS = '$remarks', CURRENTDATE=now(), AUTH_BY='$aname' where CONCE_CODE = $cid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='concessionview.php';";
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
		  
          <h1 style="color:red;" align="center">EDIT CONCESSION TYPE</h1>
          
                      <form name="frm" method="post" action="">
<?php
//include("config.php");


$sql = mysqli_query($link,"select * from concession_type where CONCE_CODE = $cid");
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$conname = $row['CONCE_NAME'];
	$conper = $row['CONCE_PER'];
	$remarks = $row['REMARKS'];
}

?>                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Concession Name <font color="red">*</font> : </td><td><input type="text" name="cname" id="cname" class="text" value="<?php echo $conname; ?>" required/></td></tr>
<tr><td class="label1">Concession(%) <font color="red">*</font> : </td><td><input type="text" name="cper" id="cper" class="text" value="<?php echo $conper; ?>" required/></td></tr>
<tr><td class="label1">Remarks <font color="red">*</font> : </td><td><textarea name="remarks" id="remarks" cols="34" rows="5"><?php echo $remarks; ?></textarea></td></tr>


<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='concessionview.php'"/></td><td></td></tr></table>
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