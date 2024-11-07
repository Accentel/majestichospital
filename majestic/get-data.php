<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT * FROM hosp_tariff WHERE id = 1";
$result = mysql_query($sql);
if($result){
	$row = mysql_fetch_array($result);
	//$date=$row['registerdate'];
	//$d=date('Y-m-d',strtotime($date));
	//echo ":" . $d;
	//echo ":" . $row['bed']." .".$row['patientname'];
	echo ":" . $row['bed']*$q;
	echo ":" . $row['inten']*$q;
	echo ":" . $row['nurse']*$q;
	echo ":" . $row['monitor']*$q;
	echo ":" . $row['house']*$q;
	echo ":" . $row['pump']*$q;	
	echo ":" . $row['ven']*$q;
	echo ":" . $row['ven']*$q;
	//echo ":" . $d;
	
		
	
	
}

?>	

