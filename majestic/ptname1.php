<?php /*?><?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="select packing_name from `phr_packing_mast` where packing_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['packing_name'];
	echo "$cname\n";
}



?><?php */?>
<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
$rs="select packing_name from `phr_packing_mast` where packing_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$return_arr[] = $rs['packing_name'];
	//echo "$cname\n";
}

echo json_encode($return_arr);

?>