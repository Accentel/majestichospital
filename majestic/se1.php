<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  FLOOR_NAME FROM  department WHERE FLOOR_NAME LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['FLOOR_NAME'];
	echo "$cname\n";
}



?>