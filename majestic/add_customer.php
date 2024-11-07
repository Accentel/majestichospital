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

	<div id="conteneur">
		
		  

		 <?php include("logo.php");?><?php
			include("main_menu.php");
			?>
		  
	
<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$date2 = date('Y-m-d',strtotime($_POST['date2']));
//$date2 = $_POST['date2'];
$cname=$_POST['cname'];
$mobileno = $_POST['mobileno'];
$address = $_POST['address'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$sq="INSERT INTO customer(date1,cname,cmobile,caddress,`age`,`sex`)VALUES('$date2','$cname','$mobileno','$address','$age','$sex')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='customerview.php';";
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
		  
          <h1 style="color:red;" align="center">ADD CUSTOMER</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Requirement Date <font color="red">*</font> : </td><td><input type="text" name="date2" class="tcal" value="<?php echo date('d-m-Y'); ?>"/></td></tr>
<tr style="height:12px;"></tr>
<tr><td class="label1">Customer Name <font color="red">*</font> : </td><td>
<input type="text" name="cname" id="cname" class="text" onclick="window.open('finalbill_popupk.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')"/></td></tr>
<tr style="height:12px;"></tr>
<tr><td class="label1">Mobile No <font color="red">*</font> : </td><td>
<input type="text" name="mobileno" id="mobileno" class="text"/>
</td>
				
				</tr>
                
  <tr style="height:12px;"></tr>              
                <tr><td class="label1">Age<font color="red">*</font> : </td><td>
<input type="text" name="age" id="age" class="text"/>
</td>
				
				</tr>
                <tr style="height:12px;"></tr>
                <tr><td class="label1">Sex <font color="red">*</font> : </td><td>
<input type="radio" name="sex" id="sex"  value="Male" checked="checked"/>Male
<input type="radio" name="sex" id="sex"  value="Female" />Female
</td>
				
				</tr>
                <tr style="height:12px;"></tr>

<tr><td class="label1">Address <font color="red">*</font> : </td>
<td>
		<textarea name="address" cols="33"></textarea>
</td></tr>
<tr style="height:12px;"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='customerview.php'"/></td><td></td></tr></table>
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