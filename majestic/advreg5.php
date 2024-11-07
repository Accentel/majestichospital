<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="select  distinct b.mrno from bill b,bill1 b1 where b.BillNO=b1.BillNO   and b.mrno LIKE '$q%'"; 


$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['mrno'];
	echo "$cname\n";
}



?>