<?php
ob_start();
include("config.php");

if(isset($_POST['submit'])){

$rows = $_POST['rows'];
if($rows > 0){
$bno =$_POST['bno'];
$mno =$_POST['mno'];
$user =$_POST['user'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname = $_POST['pname'];
//$pref = $_POST['pref'];
$pname2 = $pref." ".$pname1;
//$suf = $_POST['suf'];
$age =$_POST['age'];
$age2 = $age1." ".$suf;
$gender = $_POST['gender'];
$dname = $_POST['dname'];
$total =$_POST['tot'];
$disc = $_POST['conamt'];
$namt = $_POST['price'];
$paid =$_POST['paid'];
$bal = $_POST['bal'];
//	$ctype = $_POST['ctype'];
$ptype = $_POST['ptype'];
$remarks=$_POST['remarks'];
$time=$_POST['time'];
$mrno=$_POST['mrno'];


$department=$_POST['department'];
$observation=$_POST['observation'];
$bed=$_POST['bed'];
$paymenttype=$_POST['paymenttype'];

$dt=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount where date(date_time)='$dt'");
$bcnt=mysqli_num_rows($sq);
$cnt1=$bcnt+1;
$cnt=date(dmy)."-".$cnt1;

date_default_timezone_set('Asia/Kolkata');
$ndate=date( 'Y-m-d H:i:s', time ());




//mysql_query("insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')");
//mysql_query("insert into ulogin(uname,pass) values ('$bno','$mno')");

//echo $q="insert into bill1(BillNO,PatientName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,user) values('$bno','$pname','$total','$disc','$namt','$paid','$bal')";
echo $q="insert into hbill(BillNO, BillDate, PatientName, Age, Sex, DoctorName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,conce_type,ptype,remarks,user,phoneno,mrno,time,observation,bed,deptart,cnt,paymenttype) values('$bno','$bdate','$pname','$age','$gender','$dname','$total','$disc','$namt','$paid','$bal','$ctype','$ptype','$remarks','$user','$mno','$mrno','$time','$observation','$bed','$department','$cnt','$paymenttype')";
mysqli_query($link,$q) or die(mysqli_error($link));

$qq=mysqli_query("insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time)values('Hospital Service','$paid','$cnt','$mrno','$user','$paymenttype','$ndate')");


for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
$sql1 = mysqli_query($link,"insert into hbill1(BillNO, BillDate,purpose,Amount, mrno) values('$bno','$bdate','$tname','$cost','$mrno')");
}

}

if($sql1)
{

	/*print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_lab_bill.php';";
	print "</script>";*/
	header("Location:hbill_rec2.php?bno=$bno");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	//print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='opbill.php';";
	print "</script>";
	}
}
}	
?>