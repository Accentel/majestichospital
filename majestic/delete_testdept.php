<?php
include("config.php");

$id=$_GET['dcode'];

$sq=mysqli_query($link,"DELETE  FROM `masterdept` WHERE deptcode='$id'")or die(mysqli_error($link));
if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='new_dept.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='new_dept.php';";
	print "</script>";
}                         
?>