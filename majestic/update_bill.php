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
$status=$_POST['bstatus'];
if($status=="cancel"){
	
	$sdate=date('Y-m-d');
}else{
	$sdate='';
}
//mysqli_query($link,"insert into duebill1(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')")or die(mysqli_error($link));
$e="update bill set PatientName='$pname',phoneno='$mno', Age='$age', Sex='$gender', DoctorName='$dname',conce_type='$ctype',remarks='$remarks',ptype='$ptype' where BillNO='$bno'";
mysqli_query($link,$e)or die(mysqli_error($link)); 


 $e="update bill1 set PatientName='$pname',time='$time', Age='$age', Sex='$gender',status='$status',sdate='$sdate', DoctorName='$dname', Total='$tot', Discount='$conamt', NetAmount='$price', PaidAmount='$paid', BalanceAmount='$bal' where BillNO='$bno'";

$sql1=mysqli_query($link,$e)or die(mysqli_error($link));

if($sql1)
{
//header("Location:send_sms5.php?bno=$bno&p=$paid&pn=$pname&t=$tot&bal=$bal&user=$user");
	print "<script>";
	print "alert('Successfully updated');";
	print "self.location='new_lab_bill.php';";
	print "</script>";
	//header("Location:send_sms1.php?bno=$bno&t=$total&d=$disc&pn=$pname&n=$namt&p=$paid&b=$bal");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='edit_lab_bill.php?bno=$bno';";
	print "</script>";
	}
}
?>