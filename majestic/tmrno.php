<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
				
 $rs="SELECT mrno FROM referalpatients where mrno LIKE '%$q%'"; 
$rsd = mysql_query($rs) or die(mysql_error());
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['mrno'];
	echo "$cname\n";
}



?>