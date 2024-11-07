<?php
include("config.php");
 $emp_id = $_REQUEST['emp_id'];

 //$xx="select a.patientname,c.dname1,c.id ,registerdate,age,a.gender,a.con_type,a.card_no,a.insu_type from patientregister as a,op_pat_dlt as b,doct_infor as c where a.registerno='$emp_id' and a.registerno=b.PAT_REGNO and  b.doc_code=c.id";
$xx="select a.patientname,c.dname1,c.id ,registerdate,age,a.gender,a.con_type from patientregister as a,op_pat_dlt as b,doct_infor as c where a.registerno='$emp_id' and a.registerno=b.PAT_REGNO and  b.doc_code=c.id";

 
$query = mysqli_query($link,$xx) or die(mysqli_error($link));
if($query){
while($row =mysqli_fetch_array($query))
{
$name=$row[0];	
$docname=$row[1];	
$doccode=$row[2];	
$date=date('d-m-Y',strtotime($row[3]));
$age = $row[4];
$gender = $row[5];	
$ctype = $row[6];
//$cardno = $row[7];	
//$insutype = $row[8];	
}//while
}
$data = ":".$emp_id.":".$name.":".$docname.":".$doccode.":".$date.":".$age.":".$gender.":".$ctype;
echo $data; 

?>