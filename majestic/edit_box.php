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
include("config.php");

 $id=$_REQUEST['id'];
 $q="select * from box where id='$id'";
$res=mysqli_query($link,$q) or die(mysqli_error($link));
	 $row=mysqli_fetch_array($res);
	 $box=$row['boxno'];
	 $id1=$row['id'];
	 $program=$row['medicine'];
?>


		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD BOX</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">

<tr><td class="label1">BOX No <font color="red">*</font> : </td><td><input type="text" name="boxno" class="text" id="boxno" value="<?php echo $box; ?>"/></td></tr>
<tr><td class="label1">Medicine Name  : </td><td><input type="text" name="program" class="text" value="<?php echo $program; ?>"/><input type="hidden" name="id2" class="text" value="<?php echo $id1; ?>"/></td></tr>




<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='boxview.php'"/></td><td></td></tr></table>
	           </form>        
		
        
        </div>
<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
//print_r($_POST);
error_reporting(E_ALL);
 $box=$_POST['boxno'];
$program=$_POST['program'];
$id2=$_POST['id2'];
echo $p="update box set boxno='$box',medicine='$program' where id='$id'";
$sql1 = mysqli_query($link,$p) or die(mysqli_error($link));

if($sql1)
{
	print "<script>";
	print "alert('Successfully saved');";
	print "self.location='boxview.php';";
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