<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  PRD_NAME FROM  phr_prddetails_mast WHERE PRD_NAME LIKE '$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$cname = $rs['PRD_NAME'];
	echo "$cname\n";
}


?>