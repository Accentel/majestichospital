<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
			
$rs="SELECT bedtype FROM bedtype WHERE bedtype LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['bedtype'];
	echo "$cname\n";
}



?>