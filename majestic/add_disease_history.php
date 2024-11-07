<?php //include('config.php');
session_start();
if($_SESSION['name1'])
{
	$aname = $_SESSION['name1'];
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
$disname = $_POST['disname'];
$discode = $_POST['discode'];
$hist=$_POST['hist'];
$diag = $_POST['diag'];
$treat = $_POST['treat'];


$sq="INSERT INTO disease_history(disease_name,history,diagnosis,treatment_given,CURRENTDATE,AUTH_BY,disease_id)VALUES('$disname','$hist','$diag','$treat',now(),'$aname','$discode')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added');";
			print "self.location='add_disease_history.php';";
			print "</script>";

}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre" class="table-responsive" style="width:auto; min-height:450px;">
		  
          <h1 style="color:red;" align="center">ADD DISEASE HISTORY</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center" class="table">
<tr><td class="label1">Disease Name <font color="red">*</font> : </td><td><input type="text" name="disname" id="disname" class="text" required/></td></tr>
<tr><td class="label1">Disease Code <font color="red">*</font> : </td><td><input type="text" name="discode" id="discode" class="text" required/></td></tr>
<tr><td class="label1">History : </td><td><textarea name="hist" id="hist"  style="width:100%" class="text" ></textarea></td></tr>
<tr><td class="label1">Diagnosis : </td><td><textarea name="diag" id="diag"  style="width:100%" class="text" ></textarea></td></tr>
<tr><td class="label1">Treatment Given : </td><td><textarea name="treat" id="treat" style="width:100%" class="text" ></textarea></td></tr>

<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='disease_history.php'"/></td><td></td></tr></table>
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