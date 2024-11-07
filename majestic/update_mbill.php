<?php
include("config.php");

if(isset($_POST['submit'])){

$bno =$_POST['bno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname = $_POST['pname'];
$user = $_POST['user'];

$age =$_POST['age'];
$gender = $_POST['gender'];
$dname = $_POST['dname'];
$ctype = $_POST['ctype'];
$ptype = $_POST['ptype'];
$remarks=$_POST['remarks'];
$rows = count($_POST['tname']);
$tot=$_POST['tot'];
$conamt=$_POST['conamt'];
$price=$_POST['price'];
$paid=$_POST['paid'];
$bal=$_POST['bal'];
$mno=$_POST['mno'];
$time=$_POST['time'];
mysql_query("insert into duebill1(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')");
$e="update mbill set PatientName='$pname',phoneno='$mno', Age='$age', Sex='$gender', DoctorName='$dname',conce_type='$ctype',ptype='$ptype' where BillNO='$bno'";
mysql_query($e); 


 $e="update mbill1 set PatientName='$pname',time='$time', Age='$age', Sex='$gender', DoctorName='$dname', Total='$tot', Discount='$conamt', NetAmount='$price', PaidAmount='$paid', BalanceAmount='$bal' where BillNO='$bno'";
$sql1=mysql_query($e);

if($sql1)
{
//header("Location:send_sms5.php?bno=$bno&p=$paid&pn=$pname&t=$tot&bal=$bal&user=$user");
	print "<script>";
	print "alert('Successfully updated');";
	print "self.location='manual_lab_bill.php';";
	print "</script>";
	//header("Location:send_sms1.php?bno=$bno&t=$total&d=$disc&pn=$pname&n=$namt&p=$paid&b=$bal");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='medit_lab_bill.php?bno=$bno';";
	print "</script>";
	}
}
?>