<?php
//this code is taken from the previous file which we had, u can check it's original file with insert_bill_initialone.php name
ob_start();
 include("config.php");

if(isset($_POST['submit'])){

$rows = $_POST['rows'];
if($rows > 0){
//$bno =$_POST['bno'];
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
$sampleno=$_POST['sampleno'];
$paymenttype=$_POST['paymenttype'];



$dt=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount where date(date_time)='$dt'");
$bcnt=mysqli_num_rows($sq);
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;

date_default_timezone_set('Asia/Kolkata');
$ndate=date('Y-m-d H:i:s', time ());






 //mysqli_query($link,"insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')");
 //mysqli_query($link,"insert into ulogin(uname,pass) values ('$bno','$mno')");

//echo $q="insert into bill1(BillNO,PatientName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,user) values('$bno','$pname','$total','$disc','$namt','$paid','$bal')";
 $q="insert into bill1( PatientName, Age, Sex, DoctorName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,BillDate,user,time,mrno,ptype,sample,paymenttype,cnt) values('$pname','$age','$gender','$dname','$total','$disc','$namt','$paid','$bal','$bdate','$user','$time','$mrno','$ptype','$sampleno','$paymenttype','$cnt')";
mysqli_query($link,$q) or die(mysqli_error($link));
$id=mysqli_insert_id($link);
$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str = "BL-".$dt3."-";
			$sam = "SN-".$dt3."-";
			$sql = mysqli_query($link,"select count(distinct BillNO) from bill where BillNO like '$str%'")or die(mysqli_error($link));
			if($sql){
				$res = mysqli_fetch_array($sql);
				$c = $res[0];
				$bno = $str.($c+1);
				$sno = $sam.($c+1);
			}
		 $uy="update bill1 set BillNo='$bno',sample='$sno' where bid='$id'";
			mysqli_query($link,$uy) or die(mysqli_error($link));

//exit;
for($i=0;$i<$rows;$i++)
{
$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
$sql1 = mysqli_query($link,"insert into bill(BillNO, BillDate, PatientName, Age, Sex, DoctorName,TestName,Amount,Total,Discount,NetAmount,PaidAmount,BalanceAmount,conce_type,ptype,remarks,user,phoneno,mrno) values('$bno','$bdate','$pname','$age','$gender','$dname','$tname','$cost','$total','$disc','$namt','$paid','$bal','$ctype','$ptype','$remarks','$user','$mno','$mrno')");
}

}


// $qq=mysqli_query($link,"insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)values('Lab','$paid','$cnt','$mrno','$user','$paymenttype','$ndate','Lab')");



/*
$sd=mysql_query("select * from patientregister where registerno='$mrno'");
$r=mysql_fetch_array($sd);
	

 $mobile=$r['mobile'];
	
	$ch = curl_init();
	//echo $mob=8801062501;
	
 $msg="Dear  $pname your total amount is $namt now paid amount is $paid balance is $bal. FURTHER DETAILS WE WILL UPDATE. WE WILL HAPPY FOR UR SUPPORT";
//$url ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$to2&from=DHSHUZ&message=".urlencode($msg); 
//$ret = file($url); 

$user="durgahospital";
$password="admin123";
//$receipientno="9666111717,9959583024";
$senderID="DHSHUZ"; 
curl_setopt($ch,CURLOPT_URL,  "http://sms.scubedigi.com/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$user&password=$password&to=$mob&from=$senderID&message=$msg");
  //$buffer = curl_exec($ch);

*/


if($sql1)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_lab_bill.php';";
	print "</script>";
	header("Location:bill_rec2.php?bno=$bno");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='pay_bill.php';";
	print "</script>";
	}
}
}	
?>