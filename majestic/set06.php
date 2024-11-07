<?php
include("config.php");
$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct PatientName FROM  bill1 WHERE PatientName LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$cname = $rs['PatientName'];
	echo "$cname\n";
}



?>