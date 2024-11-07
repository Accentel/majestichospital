<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT a.pname_type,a.patientname,a.registerdate,a.gaurdianname,a.age,a.gender,b.ADMIT_TIME,b.PAT_REGNO FROM patientregister a,ip_pat_admit b WHERE a.registerno=b.PAT_REGNO and a.registerno = '$q'";
$result = mysql_query($sql);
if($result){
	$row = mysql_fetch_array($result);
	$date=$row['registerdate'];
	$d=date('d-m-Y',strtotime($date));
	$t=mysql_real_escape_string($row['ADMIT_TIME']);
	echo ":" . $d;
	echo ":" . $row['pname_type']." .".$row['patientname'];
	echo ":" . $row['gaurdianname'];
	echo ":" . $row['age'];
	echo ":" . $row['gender'];
	echo ":" . $t;
	
	
		
	
	
}

?>	

