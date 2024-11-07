<?php
include("config.php");

$q=$_GET["q"];
$roomtype=$_GET['roomtype'];
if($roomtype=='general'){
$sql="SELECT * FROM room_tariff WHERE ROOM_ID = 2";
}else{
	$sql="SELECT * FROM room_tariff WHERE ROOM_ID =4";
	}
$result = mysql_query($sql);
if($result){
	$row = mysql_fetch_array($result);
	//$date=$row['registerdate'];
	//$d=date('Y-m-d',strtotime($date));
	//echo ":" . $d;
	//echo ":" . $row['bed']." .".$row['patientname'];
	echo ":" . $row['ROOM_FEE']*$q;
	echo ":" . $row['NURSE_FEE']*$q;
	echo ":" . $row['OTHER_FEE']*$q;
	
	//echo ":" . $d;
	
		
	
	
}

?>	

