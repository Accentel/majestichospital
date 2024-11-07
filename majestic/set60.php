<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct PRODUCT_NAME FROM  phr_purinv_dtl WHERE PRODUCT_NAME LIKE '$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['PRODUCT_NAME'];
	echo "$cname\n";
}



?>