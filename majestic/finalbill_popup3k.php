<?php
include("config.php");

echo $emp_id = $_REQUEST['emp_id']; 

 echo $x="SELECT * FROM customer  WHERE cname='$emp_id'";
$consult=mysqli_query($link,$x);

while($r=mysqli_fetch_array($consult)){
	$patientname=$r['cname'];
	$PAT_REGNO=$r['cmobile'];
	$gender=$r['sex'];
	$age=$r['age'];
}
?>
<?php
echo $data="|".$patientname."|".$PAT_REGNO."|".$age."|".$gender;
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>