<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
$ch = curl_init();
error_reporting(E_ALL);
$pregno =$_POST['rnum'];
$adate=date("Y-m-d", strtotime($_POST['admitdate']));
//date("Y-m-d", strtotime($dateToday));

$aname = $_POST['authby'];
$advdate = date("Y-m-d", strtotime($_POST['adv_date']));
 $advamt = $_POST['rupees'];
 $pmode = $_POST['pay_type']; 
$cadrno = $_POST['card'];
$dt=date('d-m-Y');

 $dtn=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount where date(date1)='$dtn'");
$bcnt=mysqli_num_rows($sq);
//$cnt=$bcnt+1;
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 

if($advamt>=1){
$sql1 = mysqli_query($link,"insert into adv_collection(PAT_NO, ADV_DATE, ADV_AMT, PAYMENT_MODE, CURRENTDATE, AUTH_BY,card_no,bill_num)
 values('$pregno','$advdate','$advamt','$pmode',now(),'$aname','$cadrno','$cnt')");
} else {
	$sql1 = mysqli_query($link,"insert into adv_collection(PAT_NO, ADV_DATE, ADV_AMT, PAYMENT_MODE, CURRENTDATE, AUTH_BY,card_no)
 values('$pregno','$advdate','$advamt','$pmode',now(),'$aname','$cadrno')");
}
 
 

// $sql1 = mysqli_query($link,"insert into adv_collection(PAT_NO, ADV_DATE, ADV_AMT, PAYMENT_MODE, CURRENTDATE, AUTH_BY,card_no)
 //values('$pregno','$advdate','$advamt','$pmode',now(),'$aname','$cadrno')");
		
	$sd1=mysqli_query($link,"select * from ip_pat_admit where PAT_NO='$pregno'");
$r=mysqli_fetch_array($sd1);
	$mrnum=$r['PAT_REGNO'];
	 $a="select * from patientregister where registerno='$mrnum'";
	$sd=mysqli_query($link,$a);
$r=mysqli_fetch_array($sd);
$patientname=$r['patientname'];
	
 //$to2=$r['ref_doc_mob'];
	   $to2=$r['phoneno'];
 //$dc=$r['doctorname'];
//$to2=8801062501;
	//$msg = "Op We recived your op patient $pname ,$addr .";
	
	 $aa="insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)
	 values('Advance Collection','$advamt','$cnt','$mrnum','$aname','$pmode','$ndate','Advance Collection')";
	
$qq=mysqli_query($link,$aa);

	
$msg="Dear $patientname .Welcome to durga hospital. Now Paid Advanced Amount is $advamt $dt.";
//$url ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$to2&from=DHSHUZ&message=".urlencode($msg); 
//$ret = file($url); 
 $user="durgahospital";
$password="admin123";
//$receipientno="9666111717,9959583024";
$senderID="DHSHUZ"; 
curl_setopt($ch,CURLOPT_URL,  "http://sms.scubedigi.com/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$user&password=$password&to=$to2&from=$senderID&message=$msg");
 //echo $buffer = curl_exec($ch);

		if($sql1)
		{
	
			print "<script>";
			print "alert('Successfully added');";
			print "self.location='advance_collections.php';";
			print "</script>";
		}
	
	
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>