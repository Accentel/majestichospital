<?php
	include("config.php");
	$id=$_GET['id'];
	 
	//$name=$_GET['name'];
	//echo $name;
	$sql="DELETE FROM adddischarge WHERE id='$id'";
	$result=mysqli_query($link,$sql)or die(mysqli_error($link));
	if($result)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='dischare_view.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='dischare_view.php';";
		print "</script>";
	}
?>