<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct PatientMRNo FROM  final_bill WHERE PatientMRNo LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['PatientMRNo'];
	echo "$cname\n";
}



?>