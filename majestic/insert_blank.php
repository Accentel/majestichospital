<?php
include("config.php");

if(isset($_POST['submit'])){

$bno =$_POST['bno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname =$_POST['pname'];
$age =$_POST['age'];
$gender =$_POST['gender'];
$dname =$_POST['dname'];
$tdetails =mysql_real_escape_string($_POST['breport']);

$sql = mysql_query("select count(*) from blankreport where BILLNO='$bno'");
if($sql){
$row = mysql_fetch_array($sql);
$cnt = $row[0];
if($cnt <= 0){
$sql1 = mysql_query("insert into blankreport(BILLNO, PATIENTNAME, DOCTORNAME, SEX,AGE,REPORTDATE,TESTDETAILS) values('$bno','$pname','$dname','$gender','$age','$bdate','$tdetails')");
if($sql1)
{
	print "<script>";
	print "alert('successfully saved. Take Print Out from Duplicate Reports.');";
	print "self.location='blank_report.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='blank_report.php';";
	print "</script>";
	}
}else{
	print "<script>";
	print "alert('report already generated with this bill no');";
	print "self.location='blank_report.php';";
	print "</script>";
	}
}
}
?>