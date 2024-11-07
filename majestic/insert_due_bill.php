<?php
include("config.php");
if(isset($_POST['submit'])){
$user=$_POST['user'];
$bno =$_POST['bno'];
$pname = $_POST['pname'];
$paid =$_POST['paid'];
$bal = $_POST['bal'];
$cdue = $_POST['cdue'];
$rbal = $_POST['rbal'];
//$bdate = $_POST['bdate'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$tot = $_POST['price'];
$paid1 = ($paid+$cdue);
$mrno=$_POST['mrno'];
$ndate=$_POST['bdate'];
$dt=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount where date(date1)='$dt'")or die(mysqli_error($link));
$bcnt=mysqli_num_rows($sq);
$cnt1=$bcnt+1;
$cnt=date(dmy)."-".$cnt1;

$qq=mysqli_query($link,"insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)values('Lab Due','$cdue','$cnt','$mrno','$user','Cash','$ndate','Lab Due')")or die(mysqlii_error($link));

//mysqli_query("insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$cdue','$user')");
$sql1 = mysqli_query($link,"update bill1 set  PaidAmount='$paid1',BalanceAmount='$rbal',BillDate='$bdate' where BillNO='$bno'");
$sd=mysqli_query($link,"select * from patientregister where registerno='$mrno'")or die(mysqli_error($link));
$r=mysqli_fetch_array($sd);
$mobile=$r['mobile'];
$ch = curl_init();
	//echo $mob=8801062501;
	
 $msg="Dear  $pname your total amount is $bal now paid amount is $cdue balance is $rbal. FURTHER DETAILS WE WILL UPDATE. WE WILL HAPPY FOR UR SUPPORT";
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

	
if($sql1)
{
	print "<script>";
	print "alert('Successfully updated');";
	print "self.location='new_lab_bill.php';";
	print "</script>";
	//header("Location:send_sms.php?bno=$bno&d=$cdue&rb=$rbal&pn=$pname&bd=$bdate&t=$tot&bal=$bal&user=$user");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='pay_due_bill.php?q=$bno';";
	print "</script>";
	}
}
?>