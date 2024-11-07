<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
$aname= $_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	<script>
function getroomno(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		var show=xmlhttp.responseText;
		 document.getElementById("rmno").innerHTML=show;
    }
  }
xmlhttp.open("GET","get_roomno.php?q="+str,true);
xmlhttp.send();
}
</script>	
	</head>

	<body>

	<div id="conteneur">
		
		  

		   <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		  
	
<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$bed = $_POST['bed'];
$inten = $_POST['inten'];
$nurse=$_POST['nurse'];
$monitor = $_POST['monitor'];
$pump=$_POST['pump'];
$house=$_POST['house'];
$ven=$_POST['ven'];

$sq="INSERT INTO hosp_tariff(`bed`,`inten`,`nurse`,`monitor`,`pump`,`house`,`ven`)VALUES
('$bed','$inten','$nurse','$monitor','$pump','$house','$ven')";
mysql_query($sq) or die(mysql_error()); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='add_bed_details1.php';";
			print "</script>";

}
else{
mysql_error();}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">Add Hospital Tariff</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Bed Charges <font color="red">*</font> : </td>
<td>
	<input type="text" name="bed" class="text" required="required" />
</td>
<td class="label1">Intensivist/DR<font color="red">*</font> : </td>
<td id="rmno">
		<input type="text" name="inten" class="text" required="required" />
</td></tr>
<tr>
<td class="label1">Nursing Charges <font color="red">*</font> : </td>
<td>
	<input type="text" name="nurse" class="text" required="required" />
</td>
<td class="label1">Monitor Charge <font color="red">*</font> : </td>
<td>
	<input type="text" name="monitor" class="text" required="required" />
</td></tr>
<tr>
	<td class="label1">Infusion/Syringe Pump <font color="red">*</font> : </td>
	<td><input type="text" name="pump" class="text" required="required" /></td>
	<td class="label1"><div align="right">Ventilator</div></td>
	<td>
		<input type="text" name="ven" class="text" required="required" />
	  </td>
	
  </tr>
  <tr>
	<td class="label1">House Keeping <font color="red">*</font> : </td>
	<td><input type="text" name="house" class="text" required="required" /></td>
	<td class="label1"><div align="right"></div></td>
	<td>
		
	  </td>
	
  </tr>




<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;
<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='bed_details1.php'"/></td><td></td></tr></table>
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