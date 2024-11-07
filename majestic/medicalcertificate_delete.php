<?php
	include("config.php");
	$id=$_GET['id'];
	echo $id;
	//$name=$_GET['name'];
	//echo $name;
	$sql="DELETE FROM medicalcertificate WHERE mid='$id'";
	$result=mysqli_query($link,$sql)or die(mysqli_error($link));
	if($result)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='view_medicalcertificate.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='view_medicalcertificate.php';";
		print "</script>";
	}
?>