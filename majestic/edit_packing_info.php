<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	
	$pcid = $_REQUEST['id'];
	
	$sql1 = mysqli_query($link,"select PACKING_NAME from phr_packing_mast where PACKING_CODE='$pcid'")or die(mysqli_error($link));
	if($sql1){
			while($row1 = mysqli_fetch_array($sql1)){ $pcname=$row1[0]; }
	}
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
<?php

include("config.php");

if(isset($_POST['submit'])){
error_reporting(E_ALL);

$packname = $_POST['pname'];

$sql = mysqli_query($link,"select * from phr_packing_mast where PACKING_NAME = '$packname'")or die(mysqli_error($link));
$rows = mysqli_num_rows($sql);
if($rows <= 0 )
{

$sq="update phr_packing_mast set PACKING_NAME='$packname',CURRENTDATE=now(),AUTH_BY='$aname' where PACKING_CODE = $pcid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
	print "<script>";
	print "alert('Successfully updated ');";
	print "self.location='packing_info_list.php';";
	print "</script>";
}
else{
mysqli_error();}
}
else
{
	print "<script>";
	print "alert('packing name already exists');";
	print "self.location='edit_packing_info.php?id=$pcid'";
	print "</script>";
}
}
?>
		  

		<?php /*?>  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
		?>
		  
		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT PACKING INFORMATION</h1>
          
        <form name="form" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td width="43%" class="label1">Packing Id <font color="red">*</font> : </td><td><input type="text" name="pid" id="pid" value="<?php echo $pcid ?>" class="text" readonly /></td></tr>


<tr><td class="label1">Packing Name <font color="red">*</font> : </td>
<td>
	<input type="text" name="pname" id="pname" class="text" value="<?php echo $pcname ?>" required />
</td></tr>
<tr height="10px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='packing_info_list.php'"/></td></tr></table>
	           </form>        
		
        
        </div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}
else
{

session_destroy();

session_unset();

header('Location:login.php');

}

?>