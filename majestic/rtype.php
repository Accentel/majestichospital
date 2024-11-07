<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
			
$rs="SELECT roomtype FROM roomtype WHERE roomtype LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['roomtype'];
	echo "$cname\n";
}



?>