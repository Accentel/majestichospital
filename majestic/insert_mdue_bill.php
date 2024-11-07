<?php
include("config.php");

if(isset($_POST['submit'])){
$user=$_POST['user'];
$mrno=$_POST['mrno'];
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
mysql_query("insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$cdue','$user')");
$sql1 = mysql_query("update mbill1 set PaidAmount='$paid1',BalanceAmount='$rbal',BillDate='$bdate' where BillNO='$bno'");
	
	$sd=mysql_query("select * from patientregister where registerno='$mrno'");
$r=mysql_fetch_array($sd);
	

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
	print "self.location='manual_lab_bill.php';";
	print "</script>";
	//header("Location:send_sms.php?bno=$bno&d=$cdue&rb=$rbal&pn=$pname&bd=$bdate&t=$tot&bal=$bal&user=$user");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='pay_due_bill.php';";
	print "</script>";
	}
}
?>