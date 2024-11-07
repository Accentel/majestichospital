<?php
include("config.php");
$emp_id = $_REQUEST['emp_id'];


$sq=mysqli_query($link,"select sum(adv_ret) as ret from adv_collection_ret where PAT_NO='$emp_id'");
$r1=mysqli_fetch_array($sq);
$ret=$r1['ret'];

$query = mysqli_query($link,"select a.pat_no,b.patientname,b.age,b.gender,a.admit_date,c.ADV_AMT from ip_pat_admit as a,patientregister as b,adv_collection c where a.pat_no='$emp_id' and 
a.pat_regno=b.registerno and c.PAT_NO='$emp_id'");
if($query){
while($row=mysqli_fetch_array($query))
{
$patno=$row[0];	
$patname=$row[1];	
$patage=$row[2];	
$patsex=$row[3];		
$patdate=date('d-m-Y',strtotime($row[4]));
$ADV_AMNT=$row['ADV_AMT'];
$tot=$ADV_AMNT-$ret;	
}//while
}
$data = ":".$patno.":".$patname.":".$patage.":".$patsex.":".$patdate.":".$ADV_AMNT.":".$ret.":".$tot;
echo $data;	
?>