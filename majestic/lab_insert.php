<?php
include("config.php");
if(isset($_POST['submit'])){

	error_reporting(E_ALL);
	$cname=$_POST['cname'];
	$addr=$_POST['addr'];
	$email=$_POST['tin'];
	$phone=$_POST['phone'];
	$mob=$_POST['mob'];
	$web=$_POST['web'];
	$id=$_POST['id'];
	$f=date('Y-m-d');
	$sq=mysqli_query($link,"update lab set labname='$cname',address='$addr',phone='$phone',email='$email',mobile='$mob',website='$web' where id='$id'")or die(mysqli_error($link));
	if($sq){
		print "<script>";
		print "alert('Successfully Updated ');";
		print "self.location='lab_details.php';";
		print "</script>";
	
	}
else{
	mysql_error();
}


}

?>