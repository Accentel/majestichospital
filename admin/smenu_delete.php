<?php
include("../connection.php");
	$id=$_GET['id'];
	 $image=$_GET['img'];
	 unlink('../upload/home_gallery/'.$image);
	//$name=$_GET['name'];
	//echo $name;
	$sql="DELETE FROM menu_content WHERE id='$id'";
	$result=mysqli_query($link,$sql);
	if($result)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='smenu_view.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='smenu_view.php';";
		print "</script>";
	}
?>