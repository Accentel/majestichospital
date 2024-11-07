<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
 $rs="SELECT  distinct PAT_REGNO FROM  ip_pat_admit WHERE  PAT_REGNO LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	//$cname = $rs['registerno'];
	 $return_arr[] =  $rs['PAT_REGNO'];
//	echo "$cname\n";
}
echo json_encode($return_arr);
//echo $return_arr;


?>