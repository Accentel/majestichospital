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

	<div id="conteneur container">
		
		  

		 <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		  
	
<?php
ob_start();
include("config.php");
$did = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$depname = $_POST['depname'];
$mdname=$_POST['mdname'];
$lname = $_POST['locname'];

$sq="update dept set DEPT_NAME = '$depname',UDEPT_CODE = '$mdname',LOC = '$lname' where DEPT_CODE = $did";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='deptview.php';";
			print "</script>";

}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?> <style>
.th{padding-top:15px !important; padding-bottom:15px !important;}</style>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT DEPARTMENT</h1>
           <div align="center" style="width:100%">

         <fieldset style="border:1px solid; width:auto;">
                      <form name="frm" method="post" action="">
<?php
include("config.php");


$sql = mysqli_query($link,"select * from dept where DEPT_CODE = $did")or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$dtname = $row['DEPT_NAME'];
	$UDEPT_CODE=$row['UDEPT_CODE'];
	$LOC=$row['LOC'];
}

?> 
<?php 
				$sq=mysqli_query($link,"select * from location where FLOOR_CODE='$LOC' ")or die(mysqli_error($link));
				$res=mysqli_num_rows($sq);
				while($row=mysqli_fetch_array($sq)){
				 $lid = $row['FLOOR_CODE'];
				 $lname=$row['FLOOR_NAME'];
				}
			
				?>               
<table  cellspacing="10" align="center"><tr><td><br /></td></tr>
<tr><td class="label1" class="th">Department Name <font color="red">*</font> : </td><td><input type="text" name="depname" id="depname" class="text" value="<?php echo $dtname; ?>"/></td></tr>
<tr><td><br /></td></tr>
<tr ><td class="label1">Main Department Name <font color="red">*</font> : </td><td>
<select name="mdname" required="reqired" id="mdname" class="text">
<?php
				$sq=mysqli_query($link,"select DISTINCT FLOOR_CODE,FLOOR_NAME from department") or die(mysqli_error($link));
				$res=mysqli_num_rows($sq);
				while($row=mysqli_fetch_array($sq)){
				 $did = $row['FLOOR_CODE'];
				 $rk=$row['FLOOR_NAME'];
			
				?>
				<option value="<?php echo $did;?>" <?php if($did==$UDEPT_CODE){ echo 'selected';} ?>>
				<?php 
				echo $rk; ?>
				</option><?php }?></select></td>
				
				</tr>
<tr><td><br /></td></tr>
<tr><td class="label1">Location <font color="red">*</font> : </td>
<td>
		<select name="locname" required="reqired" id="locname" class="text">
		
			<?php //include("config.php");
				$sq=mysqli_query($link,"select DISTINCT FLOOR_CODE,FLOOR_NAME from location");
				$res=mysqli_num_rows($sq);
				while($row=mysqli_fetch_array($sq)){
				 $lid = $row['FLOOR_CODE'];
				 $lname=$row['FLOOR_NAME'];
			
				?>
				<option value="<?php echo $lid;?>" <?php if($lid==$LOC){ echo 'selected';} ?>>
				<?php 
				echo $lname; ?>
				</option>
				<?php }?></select>
</td></tr>
<tr><td><br /></td></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='deptview.php'"/></td><td></td></tr></table>
	       <tr><td><br /></td></tr>    </form>        
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