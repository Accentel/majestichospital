<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT * FROM doct_infor WHERE id ='$q'";
$result = mysqli_query($link,$sql);
if($result){
	$row = mysqli_fetch_array($result);
	//$date=$row['registerdate'];
	//$d=date('Y-m-d',strtotime($date));
	//echo ":" . $d;
	//echo ":" . $row['bed']." .".$row['patientname'];
	echo ":" . $row['fee1'];
	
	
	//echo ":" . $d;
	
		
	
	
}

?>	

