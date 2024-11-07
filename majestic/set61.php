<?php
include("config.php");
$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct mrno FROM  opbill WHERE mrno LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$cname = $rs['mrno'];
	echo "$cname\n";
}



?>