<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];


$query = mysql_query("select a.PatientName,a.PatientNo,a.Age,a.Sex,a.AdmissionDate,a.DischargeDate,a.RelationName,a.ConsultDoctor,a.ContactNo,b.address   from final_bill a, patientregister b 	 WHERE b.registerno=a.PatientMRNo and  a.PatientMRNo='$emp_id'  ");
if($query){
	$row1 = mysql_fetch_array($query);
	$patname = $row1['PatientName'];
	$regno = $row1['PatientNo'];
	$age = $row1['Age'];
	$gender = $row1['Sex'];
	
	$admitdate = date('d-m-Y',strtotime($row1['AdmissionDate']));
	$DischargeDate = date('d-m-Y',strtotime($row1['DischargeDate']));
	
	$RelationName=$row1['RelationName'];
	$doctorname=$row1['ConsultDoctor'];
	
	$ContactNo=$row1['ContactNo'];
	$address=$row1['address'];
  }
 	

 
?>
<?php
echo $data="|".$emp_id."|".$regno."|".$patname."|".$age."|".$gender."|".$admitdate."|".$DischargeDate."|".$RelationName."|".$doctorname."|".$ContactNo."|".$address;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>