<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="select name from tariff where name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['name'];
	echo "$cname\n";
}



?>