<?php
include("../connection.php");
	$id=$_GET['id'];
	 
	//$name=$_GET['name'];
	//echo $name;
	$sql="DELETE FROM jobs WHERE id='$id'";
	$result=mysqli_query($link,$sql);
	if($result)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='job1.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='job1.php';";
		print "</script>";
	}
?>