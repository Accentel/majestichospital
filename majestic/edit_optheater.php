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

	<div id="conteneur container">
		
		  

		   <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		  
	
<?php
ob_start();
include("config.php");
$tid = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$thname1 = $_POST['thname'];
$thcost1 = $_POST['thcost'];
$excost1 = $_POST['excost'];
$remarks1 =$_POST['remarks'];


$sq="update operation_theater set THEATER_NAME = '$thname1',THEATER_COST='$thcost1',REMARKS = '$remarks1',EXTRA_COST='$excost1', CURRENTDATE=now(), AUTH_BY='admin' where THEATER_CODE = $tid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='optheaterview.php';";
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
		  
          <h1 style="color:red;" align="center">EDIT OPERATION THEATER</h1>
           <div align="center" style="width:100%">

         <fieldset style="border:1px solid; width:auto;">
                      <form name="frm" method="post" action="">
<?php
//include("config.php");
$sql = mysqli_query($link,"select * from operation_theater where THEATER_CODE = $tid");
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$thname = $row['THEATER_NAME'];
	$thcost=$row['THEATER_COST'];
	$excost=$row['EXTRA_COST'];
	$remarks = $row['REMARKS'];
}

?>                
<table  cellspacing="10" align="center">
<tr><td><br /></td></tr>
<tr><td class="label1">Theater Name <font color="red">*</font> : </td><td><input type="text" name="thname" id="thname" value="<?php echo $thname; ?>" class="text" required/></td></tr>
<tr><td><br /></td></tr><tr><td class="label1">Cost per Hour <font color="red">*</font> : </td><td><input type="text" name="thcost" id="thcost" value="<?php echo $thcost; ?>" class="text" required/></td></tr>
<tr><td><br /></td></tr><tr><td class="label1">Extra Hour Cost  : </td><td><input type="text" name="excost" id="excost" class="text" value="<?php echo $excost; ?>"/></td></tr>
<tr><td><br /></td></tr><tr><td class="label1">Remarks  : </td><td><textarea name="remarks" id="remarks" cols="34" rows="5"><?php echo $remarks; ?></textarea></td></tr>
<tr><td><br /></td></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='optheaterview.php'"/></td><td></td></tr></table>
	<tr><td><br /></td></tr>  <tr><td><br /></td></tr>          </form>        
		</fieldset></div>
        
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