<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	$i=1;
	$sql = mysql_query("select name from tariff");
	if($sql){
	while($row = mysql_fetch_array($sql)){ $deptname[$i]=$row[0];$i++; }
	}
	
	$sql1 = mysql_query("select max(id) from tariff");
	if($sql1){
	while($row1 = mysql_fetch_array($sql1)){ $deptcode=$row1[0]; }
	}
	$deptcode = $deptcode + 1;
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
<!--	
<script>

function cur(){
document.getElementById("uname").focus(); 
}
</script>-->
	</head>

	<body onload="cur();">

	<div id="conteneur">
<?php

include("config.php");

if(isset($_POST['submit'])){
error_reporting(E_ALL);
$uid = $_POST['uid'];
$uname=$_POST['uname'];
$amt=$_POST['amt'];
$final=$_POST['final'];

$sq="INSERT INTO tariff(`name`,`amnt`,`final`)VALUES('$uname','$amt','$final')";
mysql_query($sq) or die(mysql_error()); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='uom_list1.php';";
			print "</script>";

}
else{
mysql_error();}
}


?>
		  

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
		?>
		  
		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD Tariff</h1>
          
        <form name="form" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td width="43%" class="label1"> Id <font color="red">*</font> : </td><td><input type="text" name="uid" id="uid" value="<?php echo $deptcode ?>" readonly="readonly" class="text" required /></td></tr>


<tr><td class="label1">Tariff Name <font color="red">*</font> : </td>
<td>
	<input type="text" name="uname" id="uname" class="text" required />
</td></tr>

<tr><td class="label1">Amount <font color="red">*</font> : </td>
<td>
	<input type="text" name="amt" id="amt" class="text" required />
</td></tr>

<tr><td class="label1">Add Final or Not<font color="red">*</font> : </td>
<td><input type="checkbox" name="final" value="Yes" />
	<!--<input type="text" name="uname" id="uname" class="text" required />-->
</td></tr>
<tr height="10px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='uom_list1.php'"/></td></tr></table>
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