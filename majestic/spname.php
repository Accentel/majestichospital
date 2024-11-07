<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="select distinct a.product_name from phr_purinv_dtl as a,phr_prddetails_mast as b where a.PRODUCT_NAME=b.PRD_NAME and a.product_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['product_name'];
	echo "$cname\n";
}



?>