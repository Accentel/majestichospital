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
$rid = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$rtype = $_POST['rtype'];
$remarks=$_POST['remarks'];

$sq="update roomtype set ROOMTYPE = '$rtype',REMARKS = '$remarks',CURRENTDATE = now(),AUTH_BY ='$aname' where ROOMTYPE_ID = $rid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='room_type.php';";
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
		  
          <h1 style="color:red;" align="center">EDIT ROOM TYPE</h1>
          
                      <form name="frm" method="post" action="">
<?php
include("config.php");


$sql = mysqli_query($link,"select * from roomtype where ROOMTYPE_ID = $rid")or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$roomtype = $row['ROOMTYPE'];
	$remark = $row['REMARKS'];
}

?>                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Room Type Name <font color="red">*</font> : </td><td><input type="text" name="rtype" id="rtype" class="text" value="<?php echo $roomtype; ?>" required/></td></tr>
<tr><td class="label1">Remarks : </td><td><textarea name="remarks" id="remarks" cols="34" rows="5"><?php echo $remark; ?></textarea></td></tr>

<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='room_type.php'"/></td><td></td></tr></table>
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