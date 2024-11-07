<?php
include("config.php");
$emp_id = $_REQUEST['emp_id'];

$query = mysqli_query($link,"select a.pat_no,b.patientname,b.age,b.gender,a.admit_date from ip_pat_admit as a,patientregister as b where a.pat_no='$emp_id' and a.pat_regno=b.registerno");
if($query){
while($row=mysqli_fetch_array($query))
{
$patno=$row[0];	
$patname=$row[1];	
$patage=$row[2];	
$patsex=$row[3];		
$patdate=date('d-m-Y',strtotime($row[4]));	
}//while
}
$data = ":".$patno.":".$patname.":".$patage.":".$patsex.":".$patdate;
echo $data;	
?>