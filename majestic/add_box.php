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
$rows = $_POST['rows'];
	 $box=$_POST['boxno'];
	 
 
 for($i=0;$i<$rows;$i++)
{

$program=$_POST['program'][$i];

if($program != ""){
$sql1 = mysqli_query($link,"insert into box(boxno,medicine) values('$box','$program')")or die(mysqli_error($link));
}

}
if($sql1)
{
	print "<script>";
	print "alert('Successfully saved');";
	print "self.location='add_box.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='add_box.php';";
	print "</script>";
	}	
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD BOX</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">

<tr><td class="label1">BOX No <font color="red">*</font> : </td><td><input type="text" name="boxno" class="text" id="boxno"/></td>
</tr> <tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" id="box1" class="text"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box2"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box3"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box4"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box5"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box6"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box7"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box8"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box9"/></td></tr>
<tr style="height:6px;"></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program[]" class="text" id="box10"/>
<input type="hidden" name="rows" id="rows" value="10" /></td></tr>
<tr style="height:6px;"></tr>


<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='boxview.php'"/></td><td></td></tr></table>
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