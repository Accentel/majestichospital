<?php //include('config.php');
session_start();
if($_SESSION['name1'])
{
$name=$_SESSION['name1'];
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
		<?php
			include("logo.php");
			?>
		<?php
			include("main_menu.php");
			?>
		  

	
 <?php 
include('config.php');
if(isset($_POST['sub']))
{
@session_start();
$name=$_POST['name'];
$pwd=$_POST['password'];
if (@eregi('^[A-Za-z0-9]$',$pwd))
{
$valid_pwd=$pwd;
}
else
{
$error_name='Enter Valid Password .';
}
if (@eregi('^[A-Za-z0-9.] $',$name))
{
$valid_name=$name;
}
else
{
$error_name='Enter Valid Username .';
}
if($name!='' && $pwd!='')
{
$sql="SELECT * FROM pharmacydetaisl WHERE `username`='$name' && `pwd`='$pwd'";
$res=mysqli_query($link,$sql)or die(mysqli_error($link));
$row=mysqli_fetch_assoc($res);
$runame=$row['username'];
$rpass=$row['pwd'];
if($runame == $name && $rpass == $pwd)
{
//$count=mysql_num_rows($res);
//echo $count;exit();

//if($count==1)
//{
//header('Location: home.php');
$_SESSION['uname']=$name;
$_SESSION['id']=$row['id'];
$_SESSION['phname']=$row['pharmacyname'];
$_SESSION['regsterno']=$row['registerno'];
$_SESSION['dlno1']=$row['dlno1'];
$_SESSION['dlno2']=$row['dlno2'];
$_SESSION['est']=$row['establishment'];
$_SESSION['address']=$row['address'];
$_SESSION['pno']=$row['phoneno'];
$_SESSION['mno']=$row['mobileno'];
//var_dump($_SESSION);exit;
echo "<script> window.location='org2.php' </script>";
}
else
{
$error_name="Invalid Username And Password";
//echo mysql_error();
}
}
//include('db/closedb.php');
}
?>
	
	
		  <div id="centre" class="table-responsive">
          <h1 style="color:red;" align="center">HOSPITIAL LOGIN</h1>
        <div align="center" style="width:100%">  <form action="" method="post" name="frm">
<table style="" cellspacing="10" class="table">
<tbody>
<tr>
<td class="label1"> <strong>Username:</strong></td>
<td><input name="name" required="required" type="text" class="form-control" ></td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
<td class="label1"><strong>Password:</strong></td>
<td><input name="password" id="password" required="required" type="password" class="form-control"></td>
</tr>
<tr><td colspan="2"><br /></td></tr>
<tr>
<td colspan="2" align="center"><input name="sub" value="Login" type="submit" class="butt"> <input name="cancel" value="Cancel" type="button" class="butt" onclick="window.location.href='pharmacydetailsview.php'"></td></tr>
</tbody></table></form>	</div>
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