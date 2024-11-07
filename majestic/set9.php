<?php
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$q = strtolower($_GET["term"]);
if (!$q) return;
$rs="SELECT  distinct TestName FROM  testdetails WHERE TestName LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$return_arr[] = $rs['TestName'];
	//echo "$cname\n";
}

echo json_encode($return_arr);

?>