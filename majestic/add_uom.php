<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	$i=1;
	$sql = mysqli_query($link,"select unit_name from phr_unit_mast")or die(mysqli_error($link));
	if($sql){
	while($row = mysqli_fetch_array($sql)){ $deptname[$i]=$row[0];$i++; }
	}
	
	$sql1 = mysqli_query($link,"select max(unit_code) from phr_unit_mast")or die(mysqli_error($link));
	if($sql1){
	while($row1 = mysqli_fetch_array($sql1)){ $deptcode=$row1[0]; }
	}
	$deptcode = $deptcode + 1;
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	
<script>

function cur(){
document.getElementById("uname").focus(); 
}
</script>
	</head>

	<body onload="cur();">

	<div id="conteneur">
<?php

include("config.php");

if(isset($_POST['submit'])){
error_reporting(E_ALL);
$uid = $_POST['uid'];
$uname=$_POST['uname'];
$sql = mysqli_query($link,"select * from phr_unit_mast where UNIT_NAME = '$uname'")or die(mysqli_error($link));
$rows = mysqli_num_rows($sql);
if($rows <= 0)
{

$sq="INSERT INTO phr_unit_mast(UNIT_NAME,CURRENTDATE,AUTH_BY)VALUES('$uname',now(),'$aname')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='uom_list.php';";
			print "</script>";

}
else{
mysqli_error();}
}
else
{
	print "<script>";
	print "alert('unit name already exists');";
	print "self.location='add_uom.php';";
	print "</script>";
}
}
?>
		  

		  <?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
		?>
		  
		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD UOM</h1>
          
        <form name="form" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td width="43%" class="label1">Unit Id <font color="red">*</font> : </td><td><input type="text" name="uid" id="uid" value="<?php echo $deptcode ?>" class="text" required /></td></tr>


<tr><td class="label1">Unit Name <font color="red">*</font> : </td>
<td>
	<input type="text" name="uname" id="uname" class="text" required />
</td></tr>
<tr height="10px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='uom_list.php'"/></td></tr></table>
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