<?php
include("config.php");
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	
	$depname1=$_REQUEST['depname'];
	$testname1=$_REQUEST['testname'];
	$method=$_REQUEST['method'];
	$tamt=$_REQUEST['tamt'];
	$itamt=$_REQUEST['itamt'];
	$ltype=$_REQUEST['ltype'];
	
	$sq=mysqli_query($link,"update testdetails set  Amount = '$tamt',iprice='$itamt' , method='$method',ltype='$ltype' where Department='$depname1' and TestName='$testname1'")or die(mysqli_error($link));
	
	if($sq){
	print "<script>";
	print "alert('Successfully updated ');";
	print "self.location='new_test.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='edit_test.php?dept=$depname1&tname=$testname1';";
	print "</script>";
}
}
?>		 