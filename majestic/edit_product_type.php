<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	
	$ptid = $_REQUEST['id'];
	
	$sql1 = mysqli_query($link,"select PRDTYPE_NAME,REP,TYPE from phr_prdtype_mast where PRDTYPE_CODE='$ptid'")or die(mysqli_error($link));
	if($sql1){
		while($row1 = mysqli_fetch_array($sql1))
		{ 
			$prdtypename=$row1[0]; 
			$repre = $row1[1]; 
			$prdtype = $row1[2]; 
		}
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
$ptname=$_POST['ptname'];
$rep = $_POST['rep'];
$ptype = $_POST['ptype'];
 
$sq="update phr_prdtype_mast set PRDTYPE_NAME='$ptname',REP='$rep',TYPE='$ptype',CURRENTDATE=now(),AUTH_BY='$aname' where PRDTYPE_CODE = $ptid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
		print "<script>";
		print "alert('Successfully updated ');";
		print "self.location='product_type_list.php';";
		print "</script>";

}
else{
mysqli_error();}

}
?>
		  

		  <?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
			include("logo.php");
			include("main_menu.php");
		?>
		  
		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT PRODUCT TYPE</h1>
          
        <form name="form" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td width="43%" class="label1">Product Type Name <font color="red">*</font> : </td>
<td><input type="text" name="ptname" id="ptname" class="text" value="<?php echo $prdtypename; ?>" required /></td></tr>


<tr><td class="label1">Representation <font color="red">*</font> : </td>
<td>
	<input type="text" name="rep" id="rep" class="text" required value="<?php echo $repre; ?>"/>
</td></tr>
<tr><td class="label1">Product Type <font color="red">*</font> : </td>
<td>
	<select name="ptype" class="select" required style="width:230px;height:25px;">
	<?php
		if($prdtype == "drug"){
	?>	
	<option value="drug" selected>Drug</option>
	<option value="general">General</option>
	<?php
		}
		if($prdtype == "general"){
	?>
	<option value="drug" >Drug</option>
	<option value="general" selected>General</option>
	<?php
		}
	?>
	</select>
</td></tr>
<tr height="10px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='product_type_list.php'"/></td></tr></table>
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