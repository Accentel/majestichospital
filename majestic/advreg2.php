<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct mrno FROM  `caseshhet_initial1` WHERE mrno LIKE '$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['mrno'];
	echo "$cname\n";
}



?>