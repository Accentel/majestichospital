<?php
include("config.php");
echo $pname = $_REQUEST['pname'];
//$pname1 = explode(" / ",$pname);
//$regno1 = $pname1[1];
//$query = mysql_query("select a.age,a.gender,b.dname1,d.concession_type,a.registerno,d.concession_cardno,d.insu_type from patientregister as a,doct_infor as b, ip_pat_admit as d where d.pat_no='$pname' and d.doc_code=b.id and a.registerno=d.pat_regno");
echo $x="select a.age,a.gender,b.dname1,a.registerno from patientregister as a,doct_infor as b, op_pat_dlt as d 
where d.PAT_REGNO='$pname' and d.doc_code=b.id and a.registerno=d.pat_regno";
$query = mysqli_query($link,$x);

if($query){
$row = mysqli_fetch_array($query);
$age=$row[0];
$sex=$row[1];
$consultantname=$row[2];
//$concessiontype1=$row[3];
//$regno=$row[4];
//$ccardno = $row[5];
//$insutype = $row[6];
}

//$concessiontype = "General";
//if($concessiontype1 != ""){
//$query1 = mysql_query("select conce_name from concession_type where conce_code='$concessiontype1'");
//if($query1){
//$row1 = mysql_fetch_array($query1);
//$concessiontype=$row1[0];
//}
//}
//if($insutype != ""){ $concessiontype = $insutype; }else{ $concessiontype = $concessiontype; }
//$data = ":".$age.":".$sex.":".$consultantname.":".$concessiontype.":".$regno.":".$ccardno; 
$data = ":".$age.":".$sex.":".$consultantname; 
echo $data;
?>