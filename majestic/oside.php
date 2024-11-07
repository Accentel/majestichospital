<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT ANAE_DOCNAME FROM outside_consultants WHERE ANAE_DOCNAME LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['ANAE_DOCNAME'];
	echo "$cname\n";
}



?>