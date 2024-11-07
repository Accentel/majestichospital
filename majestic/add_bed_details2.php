<?php include('config.php');

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
ob_get_flush();
?>


<?php 
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from hosp_tariff where id='$id'")or die(mysqli_error($link));
while($r=mysqli_fetch_array($sq)){
	
$bed=$r['bed'];
$inten=$r['inten'];	
$nurse=$r['nurse'];
$monitor=$r['monitor'];
$pump=$r['pump'];
$ven=$r['ven'];
$house=$r['house'];
	
	
}?>
		  <div id="centre">
		  
          <h1 style="color:red;" align="center">Edit Hospital Tariff</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Bed Charges <font color="red">*</font> : </td>
<td>
	<input type="text" name="bed" value="<?php echo $bed?>" class="text" required="required" />
</td>
<td class="label1">Intensivist/DR<font color="red">*</font> : </td>
<td id="rmno">
		<input type="text" name="inten" value="<?php echo $inten?>" class="text" required="required" />
</td></tr>
<tr>
<td class="label1">Nursing Charges <font color="red">*</font> : </td>
<td>
	<input type="text" name="nurse" value="<?php echo $nurse?>" class="text" required="required" />
</td>
<td class="label1">Monitor Charge <font color="red">*</font> : </td>
<td>
	<input type="text" value="<?php echo $monitor?>" name="monitor" class="text" required="required" />
</td></tr>
<tr>
	<td class="label1">Infusion/Syringe Pump <font color="red">*</font> : </td>
	<td><input type="text" name="pump" class="text" value="<?php echo $pump?>" required="required" /></td>
	<td class="label1"><div align="right">Ventilator</div></td>
	<td>
		<input type="text" name="ven" value="<?php echo $ven?>" class="text" required="required" />
	  </td>
	
  </tr>
  <tr>
	<td class="label1">House Keeping <font color="red">*</font> : </td>
	<td><input type="text" name="house" value="<?php echo $house?>" class="text" required="required" /></td>
	<td class="label1"><div align="right"></div></td>
	<td>
		
	  </td><input type="hidden" name="id" value="<?php echo $id?>" />
	
  </tr>




<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;
<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='bed_details1.php'"/></td><td></td></tr></table>
	           </form>        
		
        
        </div>

		<?php include('footer.php'); ?>

	</div>
    
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
$id=$_POST['id'];
$ven=$_POST['ven'];

$sq="update  hosp_tariff set `bed`='$bed',`inten`='$inten',`nurse`='$nurse',`monitor`='$monitor',
`pump`='$pump',`house`='$house',`ven`='$ven' where id='$id' ";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='bed_details1.php';";
			print "</script>";

}
else{
mysqli_error();}
}
?>

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