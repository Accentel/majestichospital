<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
 $rs="SELECT  distinct serv_name  FROM  sevices WHERE serv_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	//$cname = $rs['registerno'];
	 $return_arr[] =  $rs['serv_name'];
//	echo "$cname\n";
}
echo json_encode($return_arr);
//echo $return_arr;


?>