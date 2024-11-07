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
$depname = $_POST['depname'];
$room_type=$_POST['room_type'];
$amnt = $_POST['amnt'];
$lab=$_POST['lab'];
$pharma = $_POST['pharma'];

$sq="INSERT INTO package(pkg_name,room_type,amount,lab,pharma)VALUES('$depname','$room_type','$amnt','$lab','$pharma')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='add_pkg.php';";
			print "</script>";

}
else{
mysqli_error();}
}
?>
<?php
ob_get_flush();
?>
  <style>
.th{padding-top:15px !important; padding-bottom:15px !important;}</style>	
		  <div id="centre" style="width:auto; min-height:500px;" >
		  
          <h1 style="color:red;" align="center">ADD PACKAGE</h1>
           <div align="center" class="container" style="width:100%">


         <fieldset style="border:1px solid; width:auto;">
                      <form name="frm" method="post" action="">
                
<table  cellspacing="10" align="center" class="table">
<tr><td><br /></td></tr>
<tr><td class="label1"  >Package Name <font color="red">*</font> : </td>
<td><input type="text" name="depname" required id="depname" class="text"/></td>

<td class="label1"  >Room Type <font color="red">*</font> : </td>
<td>
<select name="room_type" class="text" required>
<option value="">Select</option>
 <?php $sq = mysqli_query($link,"select * from roomtype")or die(mysqli_error($link));
			  $tot=mysqli_num_rows($sq);
		
		
			  while($res=mysqli_fetch_array($sq)){
			 
			  $rid = $res['ROOMTYPE_ID'];?>
              <option value="<?php echo $rid?>"><?php echo $res['ROOMTYPE'];?></option><?php }?>
</select>
</td>
</tr>
<tr><td><br /></td></tr>
<tr><td class="label1"  >Amount <font color="red">*</font> : </td>
<td><input type="text" name="amnt" required id="amnt" class="text"/></td>

<td class="label1"  >Lab Package <font color="red">*</font> : </td>
<td>
<select name="lab" class="text" required>
<option value="">Select</option>
 <option value="Yes">Yes</option>
 <option value="No">No</option>
</select>
</td>
</tr>
<tr><td><br /></td></tr>
<tr><td class="label1"  >Phramacy Package <font color="red">*</font> : </td>
<td><select name="pharma" class="text" required>
<option value="">Select</option>
 <option value="Yes">Yes</option>
 <option value="No">No</option>
</select></td>

<td class="label1"  > <font color="red">*</font> : </td>
<td>

</td>
</tr>

<tr><td><br /></td></tr>
<tr><td colspan="4" align="center" class="th"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='package.php'"/></td><td></td></tr></table>
	      <tr><td><br /></td></tr>     </form>        
		
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