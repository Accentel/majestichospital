<?php
ob_start();

include("config.php");
$d=date('Y-m-d');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=addslashes($_POST['name']);
$mypassword=addslashes($_POST['password']);
$sql="SELECT name1,passowrd FROM login WHERE name1='$myusername' and passowrd='$mypassword'";
$result=mysqli_query($link,$sql) or die(mysqli_error($link));
$row=mysqli_fetch_array($result);
//$active=$row['active'];
$count=mysqli_num_rows($result);
if($count==1)
{
//session_register("username");
$_SESSION['name1']=$myusername;

header("location:home.php");
}
else
{
print "<script>";
			print "alert('Your Login Name or Password is invalid');";
			print "self.location='login.php';";
			print "</script>";
//echo "Your Login Name or Password is invalid";
//header("location:login.php?valid=false");

}
}
?>