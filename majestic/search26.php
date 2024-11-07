<?php
include("config.php");
$q=$_GET["q"];
$itype=$_GET['itype'];
if($itype == "Yes"){
$sql="SELECT amount FROM doct_serv WHERE serv_name = '$q'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
$amount=$row['iprice'];
echo ":" . $amount;
}else{
	$sql="SELECT  amount FROM doct_serv WHERE serv_name = '$q'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	$amount=$row['amount'];
	echo ":" . $amount;
}



	
	
	
	

?>	

