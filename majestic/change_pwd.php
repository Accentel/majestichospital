<?php //include('config.php');

session_start();

if($ses=$_SESSION['name1'])

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
$user=$_POST['user'];
$pwd1=$_POST['pwd1'];
	 



$sql1 = mysqli_query($link,"update  login set passowrd='$pwd1' where name1='$user'")or die(mysqli_error($link));



if($sql1)
{
	print "<script>";
	print "alert('Successfully saved');";
	print "self.location='home.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='change_pwd.php';";
	print "</script>";
	}	
}
?>
<?php
ob_get_flush();
?>

		<div id="centre">
		  
          <h1 style="color:red;" align="center">Change Password</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center" class="table">
<input type="hidden" name="user" value="<?php echo $ses;?>">
<tr><td class="label1">Current Password<font color="red">*</font> : </td><td><input type="password" required name="old" class="text" id="old"/></td></tr>
<tr><td class="label1">News Password  : </td><td>

<input id="password" class="text" type="password" required  name="pwd1" >

</td></tr>
<tr><td class="label1">Confirm Password  : </td><td>
<input class="text" type="password" id="confirm_password" onchange="check()" required  name="pwd2" >
</td></tr>



<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>
&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='home.php'"/></td><td></td></tr></table>
	           </form>        
		
        
        </div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script>
function check() {
	//alert("hi");
    if(document.getElementById('password').value ===
            document.getElementById('confirm_password').value) {
       // document.getElementById('message').innerHTML = "match";
    } else {
		alert("Password and Confirm Password did not match!");
		document.getElementById('password').value="";
		document.getElementById('confirm_password').value="";
		
        //document.getElementById('message').innerHTML = "no match";
    }
}		</script>
<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>