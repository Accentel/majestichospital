<?php /*?><?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="select unit_name from phr_unit_mast where unit_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['unit_name'];
	echo "$cname\n";
}



?><?php */?>
<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
$rs="select suppl_name from phr_supplier_mast where status='Y' and suppl_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$return_arr[] = $rs['suppl_name'];
	//echo "$cname\n";
}

echo json_encode($return_arr);

?>