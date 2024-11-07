<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT a.pname_type,a.patientname,a.doctorname,a.gender,a.address,a.registerdate,a.gaurdianname,a.age,b.ADMIT_DATE,b.ADMIT_TIME,b.PAT_NO FROM patientregister a,ip_pat_admit b WHERE a.registerno=b.PAT_REGNO and a.registerno = '$q'";
$result = mysqli_query($link,$sql);
if($result){
	$row = mysqli_fetch_array($result);
	$dc=date('d-m-Y');
	$ad=date('d-m-Y',strtotime($row['ADMIT_DATE']));
	
	echo ":" . $row['PAT_NO'];
	echo ":" . $row['patientname'];
	echo ":" . $row['gaurdianname'];
	echo ":" . $row['age'];
	echo ":" . $row['gender'];
	echo ":" . $ad;
	echo ":" . $dc;
	echo ":" . $row['address'];
	echo ":" . $row['doctorname'];
		
	
	
}

?>	

