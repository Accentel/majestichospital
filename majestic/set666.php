<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct a.registerno FROM  patientregister a,ip_pat_admit b WHERE a.registerno=b.PAT_REGNO and a.registerno LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['registerno'];
	echo "$cname\n";
}



?>