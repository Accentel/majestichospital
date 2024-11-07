<?php /*?><?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
				
 $rs="SELECT b.patientname FROM ip_pat_admit as a ,patientregister as b WHERE a.PAT_REGNO=b.registerno and upper(a.dis_status) not like upper('discharged') and b.patientname LIKE '%$q%'"; 
$rsd = mysql_query($rs) or die(mysql_error());
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['patientname'];
	echo "$cname\n";
}



?><?php */?>
<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
$rs="SELECT b.patientname FROM ip_pat_admit as a ,patientregister as b WHERE a.PAT_REGNO=b.registerno and upper(a.dis_status) not like upper('discharged') and b.patientname LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	$return_arr[] = $rs['unit_name'];
	//echo "$cname\n";
}

echo json_encode($return_arr);

?>