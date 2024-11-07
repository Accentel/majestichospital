<?php /*?><?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="select prdtype_name from phr_prdtype_mast where prdtype_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['prdtype_name'];
	echo "$cname\n";
}



?><?php */?>
<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
$rs="select prdtype_name from phr_prdtype_mast where prdtype_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$return_arr[] = $rs['prdtype_name'];
	//echo "$cname\n";
}

echo json_encode($return_arr);

?>