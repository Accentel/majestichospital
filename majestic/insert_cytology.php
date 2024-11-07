<?php
include("config.php");

if(isset($_POST['submit'])){

$bno =$_POST['bno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname =$_POST['pname'];
$age =$_POST['age'];
$gender =$_POST['gender'];
$dname =$_POST['dname'];
$cyno =$_POST['biono'];
$cdiag =$_POST['cdiag'];
$spec =$_POST['spec'];
$gross =$_POST['gross'];
$micro =$_POST['micro'];
$impre =$_POST['impre'];
$note =$_POST['note'];

$sql = mysql_query("select count(*) from cytology where ID='$bno'");
if($sql){
$row = mysql_fetch_array($sql);
$cnt = $row[0];
if($cnt <= 0){
$sql1 = mysql_query("insert into cytology(ID, PATIENTNAME, DOCTORNAME, SEX,AGE,REPORTDATE,CYTOLOGYNO,CLINICALDIAGNOSIS,spiceman,GROSS,MICRO,IMPRESSION,NOTE) values('$bno','$pname','$dname','$gender','$age','$bdate','$cyno','$cdiag','$spec','$gross','$micro','$impre','$note')");
if($sql1)
{
	print "<script>";
	print "alert('successfully saved, Take Print Out from Duplicate Reports');";
	print "self.location='cytology.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='cytology.php';";
	print "</script>";
	}
}else{
	print "<script>";
	print "alert('report already generated with this bill no');";
	print "self.location='cytology.php';";
	print "</script>";
	}
}
}
?>