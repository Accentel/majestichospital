<?php
include("config.php");

if(isset($_POST['submit'])){

$depname =$_POST['depname'];
$method =$_POST['method'];
$testname = ($_POST['testname']);
$tprice = $_POST['tprice'];
$iprice = $_POST['iprice'];
$ltype = $_POST['ltype'];

$sql1 = mysqli_query($link,"insert into testdetails(Department, TestName, Amount,method,iprice,ltype) values('$depname','$testname','$tprice','$method','$iprice','$ltype')")or die(mysqli_error($link));
if($sql1)
{
$sql2 = mysqli_query($link,"insert into testmstr(TestName, Department, Amount,method,iprice,ltype) values('$testname','$depname','$tprice','$method','$iprice','$ltype')")or die(mysqli_error($link));

}
if($sql2)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_test.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='add_test.php';";
	print "</script>";
	}
}
?>