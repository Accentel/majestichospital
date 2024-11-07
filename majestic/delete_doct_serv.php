<?php
include("config.php");

$id=$_GET['id'];

$sq=mysqli_query($link,"DELETE  FROM `doct_serv` WHERE id='$id'")or die(mysqli_error($link));
if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='servicelist.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='servicelist.php';";
	print "</script>";
}                         
?>