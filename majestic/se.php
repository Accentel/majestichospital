<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  DEPT_NAME FROM  dept WHERE DEPT_NAME LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['DEPT_NAME'];
	echo "$cname\n";
}



?>