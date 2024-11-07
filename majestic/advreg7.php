<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct pat_regno FROM  casesheet_sugarchart WHERE pat_regno LIKE '$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['pat_regno'];
	echo "$cname\n";
}



?>