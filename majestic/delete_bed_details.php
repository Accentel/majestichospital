<?php
	include("config.php");
	$id=$_GET['id'];
	 
	//$name=$_GET['name'];
	//echo $name;
	$sql="DELETE FROM bed_details WHERE BED_ID='$id'";
	$result=mysqli_query($link,$sql)or die(mysqli_error($link));
	if($result)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='bed_details.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='bed_details.php';";
		print "</script>";
	}
?>