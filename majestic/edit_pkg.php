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
$id=$_POST['id'];
$room_type=$_POST['room_type'];
$amnt = $_POST['amnt'];
$lab=$_POST['lab'];
$pharma = $_POST['pharma'];
//$lname = $_POST['locname'];

$sq="update  package set pkg_name='$depname',room_type='$room_type',amount='$amnt',lab='$lab',pharma='$pharma' where id='$id'";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='package.php';";
			print "</script>";

}
else{
mysqli_error();}
}
?>
<?php
ob_get_flush();


$id=$_GET['id'];
$sq=mysqli_query($link,"select * from package where id='$id'")or die(mysqli_error($link));
$r=mysqli_fetch_array($sq);
$pkg=$r['pkg_name'];
$room_type=$r['room_type'];
$amnt = $r['amount'];
$lab=$r['lab'];
$pharma = $r['pharma'];

?>
  <style>
.th{padding-top:15px !important; padding-bottom:15px !important;}</style>	
		  <div id="centre" style="min-height:500px; height:auto;">
		  
          <h1 style="color:red;" align="center">EDIT PACKAGE</h1>
           <div align="center" style="width:100%">


         <fieldset style="border:1px solid; width:auto;">
                      <form name="frm" method="post" action="">
                <input type="hidden" name="id" value="<?php echo $id?>" />
<table  cellspacing="10" align="center" class="table">

<tr><td class="label1" class="th" >Package Name <font color="red">*</font> : </td>
<td><input type="text" name="depname" value="<?php echo $pkg?>" id="depname" class="text"/></td>
<td class="label1"  >Room Type <font color="red">*</font> : </td>
<td>
<select name="room_type" class="text" required>

 <?php $sq = mysqli_query($link,"select * from roomtype ")or die(mysqli_error($link));
			  $tot=mysqli_num_rows($sq);
		
		
			  while($res=mysqli_fetch_array($sq)){
			 
			  $rid = $res['ROOMTYPE_ID'];?>
              <option value="<?php echo $rid?>" <?php if($room_type==$rid){ echo 'selected';} ?>><?php echo $res['ROOMTYPE'];?></option><?php }?>
</select>
</td>
</tr>

<tr><td class="label1"  >Amount <font color="red">*</font> : </td>
<td><input type="text" name="amnt" required id="amnt" value="<?php echo $amnt?>" class="text"/></td>

<td class="label1"  >Lab Package <font color="red">*</font> : </td>
<td>
<select name="lab" class="text" required>
<option value="<?php echo $lab?>"><?php echo $lab?></option>
 <?php if($lab!='Yes'){?><option value="Yes">Yes</option><?php }?>
 <?php if($lab!='No'){?><option value="No">No</option><?php }?>
</select>
</td>
</tr>

<tr><td class="label1"  >Phramacy Package <font color="red">*</font> : </td>
<td><select name="pharma" class="text" required>
<option value="<?php echo $pharma?>"><?php echo $pharma?></option>
 <?php if($pharma!='Yes'){?><option value="Yes">Yes</option><?php }?>
 <?php if($pharma!='No'){?><option value="No">No</option><?php }?>
</select></td>

<td class="label1"  > <font color="red">*</font> : </td>
<td>

</td>
</tr>

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