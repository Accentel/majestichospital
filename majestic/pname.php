<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
				
 $rs="SELECT patientname FROM patientregister  WHERE patientname LIKE '%$q%'"; 
$rsd = mysql_query($rs) or die(mysql_error());
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['patientname'];
	echo "$cname\n";
}



?>