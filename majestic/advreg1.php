<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="
select distinct(A.PAT_REGNO)
					 from ip_pat_admit as A,patientregister as M WHERE  A.PAT_REGNO=M.registerno
					  and dis_status not like 'Discharged' order by reg_id desc";
//SELECT distinct A.PAT_REGNO FROM adv_collection as H,ip_pat_admit as A,patientregister as M WHERE H.PAT_NO=A.PAT_NO AND A.PAT_REGNO=M.registerno and upper(dis_status) not like upper('Discharged') and A.PAT_REGNO LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['PAT_REGNO'];
	echo "$cname\n";
}



?>