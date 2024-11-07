<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT distinct M.patientname FROM adv_collection as H,ip_pat_admit as A,patientregister as M WHERE H.PAT_NO=A.PAT_NO AND A.PAT_REGNO=M.registerno and upper(dis_status) not like upper('Discharged') and M.patientname LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['patientname'];
	echo "$cname\n";
}



?>