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
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$thname = $_POST['thname'];
$thcost = $_POST['thcost'];
$excost = $_POST['excost'];
$remarks=$_POST['remarks'];


$sq="INSERT INTO operation_theater(THEATER_NAME,THEATER_COST,REMARKS,EXTRA_COST,CURRENTDATE,AUTH_BY)VALUES('$thname','$thcost','$remarks','$excost',now(),'admin')"or die(mysqli_error($link));
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added');";
			print "self.location='add_optheater.php';";
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
		  
          <h1 style="color:red;" align="center">ADD OPERATION THEATER</h1>
           <div align="center"  style="width:100%; height:auto;">

         <fieldset style="border:1px solid; width:auto;">
                      <form name="frm" method="post" action="">
                
<table  cellspacing="10" align="center">
<tr><td><br /></td></tr>
<tr><td class="label1">Theater Name <font color="red">*</font> : </td><td><input type="text" name="thname" id="thname" class="text" required/></td></tr>
<tr><td><br /></td></tr><tr><td class="label1">Cost per Hour <font color="red">*</font> : </td><td><input type="text" name="thcost" id="thcost" class="text" required/></td></tr>
<tr><td><br /></td></tr><tr><td class="label1">Extra Hour Cost  : </td><td><input type="text" name="excost" id="excost" class="text" /></td></tr>
<tr><td><br /></td></tr><tr><td class="label1">Remarks  : </td><td><textarea name="remarks" id="remarks" cols="34" rows="5"></textarea></td></tr>
<tr><td><br /></td></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='optheaterview.php'"/></td><td></td></tr></table>
	   <tr><td><br /></td></tr>        </form>        
		
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