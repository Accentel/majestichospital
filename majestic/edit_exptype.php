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
		  
	
<?php
ob_start();
include("config.php");
$lid = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$locname = $_POST['locname'];
$user=$_SESSION['name1'];
$cdate = date("Y-m-d");

$sq="update expensetype set exptype = '$locname', cdate='$cdate' where id = $lid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='exptype_list.php';";
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
		  
          <h1 style="color:red;" align="center">EDIT EXPENSES Head</h1>
          
                      <form name="frm" method="post" action="">
<?php
include("config.php");


$sql = mysqli_query($link,"select * from expensetype where id = $lid")or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$locname = $row['exptype'];
	//$remarks = $row['REMARKS'];
}

?>                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Expense Head <font color="red">*</font> : </td><td><input type="text" name="locname" id="locname" class="text" value="<?php echo $locname; ?>"/></td></tr>
<?php /*?><tr><td class="label1">Remarks <font color="red">*</font> : </td><td><textarea name="remarks" id="remarks" cols="34" rows="5"><?php echo $remarks; ?></textarea></td></tr>
<?php */?>

<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='exptype_list.php'"/></td><td></td></tr></table>
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