<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
			
$rs="SELECT dname1 FROM doct_infor WHERE dname1 LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['dname1'];
	echo "$cname\n";
}



?>