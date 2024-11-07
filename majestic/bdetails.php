<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
			
$rs="SELECT BED_NO FROM bed_details WHERE BED_NO LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['BED_NO'];
	echo "$cname\n";
}



?>