<?php
include("config.php");

echo $emp_id = $_REQUEST['emp_id']; 

 echo $x="SELECT * FROM patientregister  WHERE registerno='$emp_id'";
$consult=mysql_query($x);

while($r=mysql_fetch_array($consult)){
	$patientname=$r['patientname'];
	$PAT_REGNO=$r['registerno'];
	$gender=$r['gender'];
	$age=$r['age'];
}
?>
<?php
echo $data="|".$emp_id."|".$patientname."|".$age."|".$gender;
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>