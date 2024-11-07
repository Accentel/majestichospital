<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
$rs="SELECT  distinct serv_name FROM  doct_serv WHERE serv_name LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$return_arr[] = $rs['serv_name'];
	//echo "$cname\n";
}

echo json_encode($return_arr);

?>