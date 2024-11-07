<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
$name=$_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header1.php");
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
$locname = $_POST['locname'];
$remarks=$_POST['remarks'];
$cdate = date("d-m-Y");

$sq="INSERT INTO location(FLOOR_NAME,REMARKS,CURRENTDATE,AUTH_BY)VALUES('$locname','$remarks','$cdate','admin')";
mysqli_query($link,$sq) or die(mysql_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added');";
			print "self.location='add_location.php';";
			print "</script>";

}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre" class="table-responsive" style="height:auto;">
		  
          <h1 style="color:red;" align="center">ADD LOCATION</h1>
          <div align="center" style="width:100%">
                      <fieldset style="border:1px solid; width:auto;">  <form name="frm" method="post" action="">
                
<table  cellspacing="10" align="center" class="table">
<tr><td colspan="2"><br /></td></tr>
<tr><td class="label1"><strong>Location Name </strong><font color="red">*</font> : </td><td><input type="text" name="locname" id="locname" class="text"/></td></tr>
<tr><td colspan="2"><br /></td></tr>
<tr><td class="label1"><strong>Remarks</strong> <font color="red">*</font> : </td><td><textarea name="remarks" id="remarks" style="width:100%"></textarea></td></tr>
<tr><td colspan="2"><br /></td></tr>	
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='locationview.php'"/></td><td></td></tr></table>
	
    <tr><td colspan="2"><br /></td></tr>
               </form>   </fieldset>     
		</div>
        
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