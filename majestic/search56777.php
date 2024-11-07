<?php
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$q=$_GET["q"];

$sql="SELECT * FROM  referal_doctor WHERE refcode = '$q'";
$result = mysql_query($sql);
if($result){
	$row = mysql_fetch_array($result);
	
	
	echo ":" . $row['ref_docname'];
	
		
	
	
}

?>	

