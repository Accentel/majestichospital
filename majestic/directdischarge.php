<?php 
include('config.php');
$ipno=$_REQUEST['ipno'];
echo $d=$_REQUEST['bed'];
$date=date('Y-m-d');
$time=date('h:i:sa');
mysql_query("update bed_details set BED_STATUS='Unreserved' where BED_NO='$d'") or die(mysql_error());
$q="update ip_pat_admit set DIS_STATUS='Discharged' ,BILL_STATUS='PAID',Discharge_date='$date',Discharge_Time='$time' where PAT_NO='$ipno'";

$qry=mysql_query($q) or die(mysql_error());
if($qry){
	print "<script>";
	print "alert('Successfully Discharged');";
	print "self.location='in_patient_enquiry.php';";
	print "</script>";
}
?>