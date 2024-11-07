<?php
include("config.php");

	$scode =$_REQUEST['id'];
	
    $vsql=mysqli_query($link,"update phr_supplier_mast set status='N' where suppl_code='$scode'")or die(mysqli_error($link));
	if($vsql)
	{
		print "<script>";
		print "alert('Successfully removed ');";
		print "self.location='supplier_info_list.php';";
		print "</script>";
	}	
?>