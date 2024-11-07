<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct Pname FROM  reportentry WHERE Pname LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$cname = $rs['Pname'];
	echo "$cname\n";
}



?>