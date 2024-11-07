<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  THEATER_NAME FROM  operation_theater WHERE THEATER_NAME LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['THEATER_NAME'];
	echo "$cname\n";
}



?>