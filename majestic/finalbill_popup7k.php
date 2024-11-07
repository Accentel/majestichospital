<?php
include("config.php");

echo $emp_id = $_REQUEST['emp_id']; 

 //echo $x="SELECT * FROM patientregister  WHERE registerno='$emp_id'";
 $x= $x="select  a.PAT_NO,b.patientname,b.registerno,b.age,b.gender,b.doctorname from ip_pat_admit as a,patientregister as b
				   WHERE a.pat_regno=b.registerno AND a.dis_status='ADMITTED' and pat_regno='$emp_id'";
$consult=mysql_query($x);

while($r=mysql_fetch_array($consult)){
	$patientname=$r['patientname'];
	$PAT_REGNO=$r['registerno'];
	$gender=$r['gender'];
	$age=$r['age'];
	$a = $r['PAT_NO'];
	$doctorname=$r['doctorname'];
}
?>
<?php
echo $data="|".$emp_id."|".$patientname."|".$age."|".$gender."|".$a."|".$emp_id."|".$doctorname;
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>