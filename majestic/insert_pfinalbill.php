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
$fname = $_POST['fname'];
//$pname2 = $pref." ".$pname1;
//$suf = $_POST['suf'];
$age =$_POST['age'];
//$age2 = $age1." ".$suf;
$sex = $_POST['sex'];
$admitdate1 = $_POST['admitdate'];
$admitdate = date('Y-m-d',strtotime($admitdate1));

$discharge1 =$_POST['discharge'];
$discharge = date('Y-m-d',strtotime($discharge1));


$packagename = $_POST['packagename'];
$addr = $_POST['addr'];
$doctor =$_POST['doctor'];
$ptotal = $_POST['ptotal'];
$total = $_POST['total'];
$disc = $_POST['disc'];
$ntotal=$_POST['ntotal'];
$paid=$_POST['paid'];
$bal=$_POST['bal'];
$pay=$_POST['pay'];
$rbal=$_POST['rbal'];
$paymenttype=$_POST['paymenttype'];

$pptotal=$_POST['pptotal'];
$pppaid=$_POST['pppaid'];
$ppbal=$_POST['ppbal'];
//$pay=$_POST['pay'];
//$rbal=$_POST['rbal'];





$dt=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount where date(date1)='$dt'");
$bcnt=mysqli_num_rows($sq);
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;



date_default_timezone_set('Asia/Kolkata');
$ndate=date( 'Y-m-d H:i:s', time ());
$qq=mysqli_query($link,"insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time)values('Package FinalBill','$pay','$cnt','$mrno','$user','$paymenttype','$ndate')");


//mysql_query("insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')");
//mysql_query("insert into ulogin(uname,pass) values ('$bno','$mno')");

//echo $q="insert into bill1(BillNO,PatientName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,user) values('$bno','$pname','$total','$disc','$namt','$paid','$bal')";
echo $q="insert into pfinalbill(umrno,patno,pname,fname,age,sex,pkg_name,address,consultname,pkg_amount,total,discount,nettotal,paid,bal,user,cnt,pay,rbal,paymenttype,admitdate,dischargedate,pptotal,pppaid,ppbal) values('$mrno','$patno','$patname','$fname','$age','$sex','$packagename','$addr','$doctor','$ptotal','$total','$disc','$ntotal','$paid','$bal','$user','$cnt','$pay','$rbal','$paymenttype','$admitdate','$discharge','$pptotal','$pppaid','$ppbal')";
$t=mysqli_query($link,$q) or die(mysqli_error($link));
$id1=mysqli_insert_id($link);
$rows=count($_POST['bdate']);
if($rows > 0){
for($i=0;$i<$rows;$i++)
{

$bdate = $_POST['bdate'][$i];
$bno = $_POST['bno'][$i];
$namt = $_POST['namt'][$i];
$pamt = $_POST['pamt'][$i];
$bamt = $_POST['bamt'][$i];

//if($tname != ""){
$sql1 = mysqli_query($link,"insert into pfinalbill1(BillDate,BillNO, netamount, paidamount, balamount, id1) values('$bdate','$bno','$namt','$pamt','$bamt','$id1')");
//}

}
}else{}
//exit;
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
	header("Location:pbill_rec2.php?bno=$id1");
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