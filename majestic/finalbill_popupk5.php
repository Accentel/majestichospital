<?php
include("config.php");

echo $emp_id = $_REQUEST['emp_id']; 

 echo $x="select a.age,a.gender,b.dname1,a.registerno,a.patientname,a.phoneno from patientregister as a,doct_infor as b, op_pat_dlt as d 
where  d.doc_code=b.id and a.registerno=d.pat_regno and a.registerno='$emp_id'";

$consult=mysqli_query($link,$x);

while($r=mysqli_fetch_array($consult)){
	$patientname=$r['patientname'];
	$age=$r[0];
$sex=$r[1];
$consultantname=$r[2];
$phoneno=$r['phoneno'];
}
?>
<?php
echo $data="|".$patientname."|".$age."|".$sex."|".$consultantname."|".$phoneno."|".$emp_id;
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>