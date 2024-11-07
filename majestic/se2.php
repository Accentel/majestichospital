<?php /*?><?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  PRD_NAME FROM  phr_prddetails_mast WHERE PRD_NAME LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['PRD_NAME'];
	echo "$cname\n";
}



?><?php */?>
<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
$rs="SELECT  PRD_NAME FROM  phr_prddetails_mast WHERE PRD_NAME LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$return_arr[] = $rs['PRD_NAME'];
	//echo "$cname\n";
}

echo json_encode($return_arr);

?>