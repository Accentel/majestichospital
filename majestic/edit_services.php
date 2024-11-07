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
		<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#box1").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
$().ready(function() {
	$("#box2").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
$().ready(function() {
	$("#box3").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
$().ready(function() {
	$("#box4").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
$().ready(function() {
	$("#box5").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});

$().ready(function() {
	$("#box6").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
$().ready(function() {
	$("#box7").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
$().ready(function() {
	$("#box8").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
$().ready(function() {
	$("#box9").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
$().ready(function() {
	$("#box10").autocomplete("set61.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>	
	</head>

	<body>

	<div id="conteneur">
		<?php include("logo.php");?>	<?php
			include("main_menu.php");
			?>
		  
	
<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$serv_name = $_POST['serv_name'];
	 $amnt=$_POST['amnt'];
	 $id=$_POST['id'];

$sql1 = mysqli_query($link,"update  sevices set serv_name='$serv_name',amount='$amnt' where id='$id'")or die(mysqli_error($link));

if($sql1)
{
	print "<script>";
	print "alert('Successfully Updated');";
	print "self.location='services_view.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to Updated');";
	print "self.location='services_view.php';";
	print "</script>";
	}	
}



$id=$_GET['id'];
$sql=mysqli_query($link,"select * from sevices where id='$id'")or die(mysqli_error($link));
$r=mysqli_fetch_array($sql);
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT SERVICES</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" class="table" align="center">

<tr><td class="label1">Services Name <font color="red">*</font> : </td><td><input type="text" value="<?php echo $r['serv_name'];?>"  name="serv_name" class="text" id="boxno"/></td></tr>
<tr><td class="label1">Amount  : </td><td><input type="text" value="<?php echo $r['amount'];?>" name="amnt" id="box1" class="text"/></td></tr>

<input type="hidden" name="id" value="<?php echo $id?>" />


<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='services_view.php'"/></td><td></td></tr></table>
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