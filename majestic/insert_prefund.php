<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
//$rows = $_POST['rows'];
//if($rows > 0){
$mrno =$_POST['mrno'];
$patno =$_POST['patno'];
$user =$_POST['user'];

$patname = $_POST['patname'];
$patname1=$mrno."-".$patname;
$fname = $_POST['fname'];
//$pname2 = $pref." ".$pname1;
//$suf = $_POST['suf'];
$age =$_POST['age'];
//$age2 = $age1." ".$suf;
$sex = $_POST['sex'];
$admitdate1 = $_POST['admit'];
$admitdate = date('Y-m-d',strtotime($admitdate1));

$discharge1 =$_POST['discharge'];
$discharge = date('Y-m-d',strtotime($discharge1));


$packagename = $_POST['packagename'];
$phone = $_POST['phone'];
$addr = $_POST['addr'];
$doctor =$_POST['doctor'];
$ptotal = $_POST['ptotal'];
$etotal = $_POST['etotal'];
$ntotal = $_POST['ntotal'];
//$ntotal=$_POST['ntotal'];
$paid=$_POST['paid'];
$bal=$_POST['bal'];
$refund=$_POST['refund'];
$remarks=$_POST['remarks'];
$paymenttype=$_POST['paymenttype'];
$dt=date('Y-m-d');
$sq=mysql_query("select * from addexpenses");
$bcnt=mysql_num_rows($sq);
$cnt1=$bcnt+1;
$cnt="Bill-".$cnt1;
echo $y="insert into addexpenses(bill_no,bill_date,paid_to,mobile_no,amount,pay_type,auth_by,currentdate)values('$cnt','$dt','$patname1','$phone','$refund','$paymenttype','$user','$dt')";
$qq=mysql_query($y);
//exit;

//mysql_query("insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')");
//mysql_query("insert into ulogin(uname,pass) values ('$bno','$mno')");

//echo $q="insert into bill1(BillNO,PatientName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,user) values('$bno','$pname','$total','$disc','$namt','$paid','$bal')";
echo $q="insert into prefund(umrno,patno,pname,fname,age,sex,pkg_name,address,consultname,pkg_amount,total,nettotal,paid,bal,user,cnt,refund,paymenttype,admitdate,dischargedate,phone,remarks) values('$mrno','$patno','$patname','$fname','$age','$sex','$packagename','$addr','$doctor','$ptotal','$etotal','$ntotal','$paid','$bal','$user','$cnt','$refund','$paymenttype','$admitdate','$discharge','$phone','$remarks')";
$t=mysql_query($q) or die(mysql_error());
$id1=mysql_insert_id();

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



if($t)
{

	/*print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_lab_bill.php';";
	print "</script>";*/
	header("Location:prefund_rec2.php?bno=$id1");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	//print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='pay_bill.php';";
	print "</script>";
	}
//}
}	
?>