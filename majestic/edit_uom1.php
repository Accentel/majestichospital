<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	
	$unitid = $_REQUEST['id'];
	
	 $d="select name,amnt,final from tariff where id='$unitid'";
	$sql1 = mysqli_query($link,$d);
	if($sql1){
			while($row1 = mysqli_fetch_array($sql1)){ 
			
			 $unitname=$row1[0];
			 $amt=$row1[1];
			 $final=$row1[2];
			 
			 
			  }
	}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header1.php");
		?>
	

	</head>

	<body>

	<div id="conteneur">
<?php

//include("config.php");

if(isset($_POST['submit'])){
error_reporting(E_ALL);
$uid = $_POST['uid'];
$uname=$_POST['uname'];
$amt=$_POST['amt'];
$final=$_POST['final'];

$sql = mysqli_query($link,"select * from tariff where name = '$uname'")or die(mysqli_error($link));
$rows = mysqli_num_rows($sql);
if($rows <= 0)
{

$sq="update tariff set `name`='$uname',`amnt`='$amt',`final`='$final' where id = $uid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
		print "<script>";
		print "alert('Successfully updated ');";
		print "self.location='uom_list1.php';";
		print "</script>";

}
else{
mysqli_error($link);}
}

}
?>
		  

		  <!--<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	-->	<?php
	include("logo.php");
			include("main_menu.php");
		?>
		  
		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT TARIFF</h1>
          
        <form name="form" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td width="43%" class="label1"> Id <font color="red">*</font> : </td><td><input type="text" name="uid" id="uid" value="<?php echo $unitid ?>" class="text" readonly /></td></tr>


<tr><td class="label1"> Name <font color="red">*</font> : </td>
<td>
	<input type="text" name="uname" id="uname" class="text" value="<?php echo $unitname ?>" required />
</td></tr>


<tr><td class="label1">Amount <font color="red">*</font> : </td>
<td>
	<input type="text" name="amt" id="amt" class="text" value="<?php echo $amt ?>" required />
</td></tr>

<tr><td class="label1">Add Final Bill or Not<font color="red">*</font> : </td>
<td>
<?php if($final=='Yes'){?>
<input type="checkbox" name="final" value="Yes" checked="checked" />
<?php } else {?>
<input type="checkbox" name="final" value="Yes" />
<?php }?>
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