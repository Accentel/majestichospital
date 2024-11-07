<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT PAT_REGNO FROM ip_pat_admit WHERE dis_status='ADMITTED' or dis_status='Intimated' and PAT_REGNO LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$cname = $rs['PAT_REGNO'];
	echo "$cname\n";
}



?>