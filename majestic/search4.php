<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT PHONE1  FROM hr_emp WHERE EMP_CODE = '$q'";
$result = mysql_query($sql);
if($result){
	$row = mysql_fetch_array($result);
	
	echo ":" . $row['PHONE1'];
	
	
		
	
	
}

?>	

