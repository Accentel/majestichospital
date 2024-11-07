<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="select distinct b.suppl_name from  phr_purinv_mast as a,phr_supplier_mast as b where a.suppl_code=b.suppl_code and b.suppl_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['suppl_name'];
	echo "$cname\n";
}



?>