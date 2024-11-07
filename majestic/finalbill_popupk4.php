<?php
include("config.php");
echo $emp_id = $_REQUEST['emp_id']; 
 //echo $x="select a.age,a.gender,b.dname1,a.registerno,a.patientname,a.phoneno from patientregister as a,doct_infor as b, ip_pat_admit as d 
//where d.PAT_REGNO='$emp_id' and d.doc_code=b.id andand a.registerno=d.pat_regno";
$x="select a.age,a.gender,b.dname1,a.registerno,a.patientname,a.phoneno from patientregister as a,doct_infor as b, ip_pat_admit as d 
where d.pat_no='$emp_id' and d.doc_code=b.id and a.registerno=d.pat_regno";
$consult=mysqli_query($link,$x);

while($r=mysqli_fetch_array($consult)){
	$patientname=$r['patientname'];
	$age=$r['age'];
$sex=$r['gender'];
$consultantname=$r['dname1'];
$phoneno=$r['phoneno'];
}
?>
<?php
echo $data="|".$patientname."|".$age."|".$sex."|".$consultantname."|".$phoneno."|".$emp_id;
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>