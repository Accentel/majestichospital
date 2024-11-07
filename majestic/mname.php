<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
				
 $rs="SELECT PatientName FROM manual_bill where patientname LIKE '%$q%'"; 
$rsd = mysql_query($rs) or die(mysql_error());
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['PatientName'];
	echo "$cname\n";
}



?>