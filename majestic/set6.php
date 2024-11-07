<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct BillNO FROM  bill WHERE BillNO LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$cname = $rs['BillNO'];
	echo "$cname\n";
}



?>