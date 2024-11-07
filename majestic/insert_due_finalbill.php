<?php
include("config.php");

if(isset($_POST['submit'])){
$user=$_POST['user'];
$mrno =$_POST['mrno'];
$pname = $_POST['pname'];
$paid =$_POST['paid'];
$bal = $_POST['bal'];
$cdue = $_POST['cdue'];
$rbal = $_POST['rbal'];
$pno = $_POST['pno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$bdate1 = date('Y-m-d',strtotime($_POST['bdate1']));
$tot = $_POST['price'];
$paid1 = ($paid+$cdue);
mysql_query("insert into adv_collection(PAT_NO,ADV_DATE,ADV_AMT,CURRENTDATE,AUTH_BY)values('$pno','$bdate1','$cdue',now(),'$user')");
$sql1 = mysql_query("update final_bill set totpaid='$paid1',totdue='$rbal' where PatientNo='$pno' and PatientMRNo='$mrno'");
	$y11=mysql_query("update ip_pat_admit set DIS_STATUS='Discharged',BILL_STATUS='PAID' where pat_no='$pno'");
if($sql1)
{
	print "<script>";
	print "alert('Successfully updated');";
	print "self.location='final_bill.php';";
	print "</script>";
	//header("Location:send_sms.php?bno=$bno&d=$cdue&rb=$rbal&pn=$pname&bd=$bdate&t=$tot&bal=$bal&user=$user");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='final_bill.php';";
	print "</script>";
	}
}
?>