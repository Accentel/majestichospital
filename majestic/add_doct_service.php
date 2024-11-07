<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{

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
$serv_name = $_POST['serv_name'];
$amount = $_POST['amount'];
//$remarks=$_POST['remarks'];
//$cdate = date("d-m-Y");

$sq="INSERT INTO doct_serv(serv_name,amount)VALUES('$serv_name','$amount')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added');";
			print "self.location='add_doct_service.php';";
			print "</script>";

}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
		  
          <h1 style="color:red;" align="center">ADD DOCTOR SERVICE</h1>	
          <div style="width:100%;" align="center">
                     <fieldset style="border:1px solid; height:auto; padding:10px;
          width:auto;"> <form name="frm" method="post" action="">
                
<table  cellspacing="10" align="center" class="table" >
<tr><td><br /></td></tr>
<tr><td class="label1"><strong>SERVICE NAME</strong> <font color="red">*</font> : </td><td><input type="text" name="serv_name" id="serv_name" class="text"/></td></tr>
<tr><td class="label1"><strong>SERVICE COST</strong> <font color="red">*</font> : </td><td><input type="text" name="amount" id="amount" class="text"/></td></tr>
<!--<tr><td class="label1">Remarks <font color="red">*</font> : </td><td><textarea name="remarks" id="remarks" cols="34" rows="5"></textarea></td></tr>
-->
<tr><td><br /></td></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='servicelist.php'"/></td><td></td></tr></table>
	     <tr><td><br /></td></tr>      </form>     </fieldset>   
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