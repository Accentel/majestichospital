<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct EMP_NAME FROM  hr_emp WHERE EMP_NAME LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['EMP_NAME'];
	echo "$cname\n";
}



?>