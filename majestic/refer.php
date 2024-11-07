<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT ref_docname FROM referal_doctor WHERE ref_docname LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['ref_docname'];
	echo "$cname\n";
}



?>