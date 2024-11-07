<?php
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$q=$_GET["q"];
$itype=$_GET['itype'];
if($itype == "Yes"){
$sql="SELECT iprice FROM testdetails WHERE TestName = '$q'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
$amount=$row['iprice'];
echo ":" . $amount;
}else{
	$sql="SELECT  Amount FROM testdetails WHERE TestName = '$q'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	$amount=$row['Amount'];
	echo ":" . $amount;
}

?>	

