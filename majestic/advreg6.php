<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct mrnum FROM  `casesheet_activity` WHERE mrnum LIKE '$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['mrnum'];
	echo "$cname\n";
}



?>