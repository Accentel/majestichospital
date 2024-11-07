<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
			
$rs="SELECT ROOM_NO FROM room_tariff WHERE ROOM_NO LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['ROOM_NO'];
	echo "$cname\n";
}



?>