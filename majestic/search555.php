<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT * FROM patientregister WHERE registerno = '$q'";
$result = mysqli_query($link,$sql);
if($result){
	$row = mysqli_fetch_array($result);
	$date=$row['registerdate'];
	$d=date('Y-m-d',strtotime($date));
	echo ":" . $d;
	echo ":" . $row['pname_type']." .".$row['patientname'];
	echo ":" . $row['age'];
	echo ":" . $row['phoneno'];
	echo ":" . $row['doctorname'];
	echo ":" . $row['pat_type'];
	echo ":" . $row['gender'];
	echo ":" . $row['ins_type'];
		
	
	
}

?>	

