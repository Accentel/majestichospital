<?php
session_start(); $ses = $_SESSION['name1'];// exit;
ob_start();
include("config.php");

if(isset($_POST['submit'])){
error_reporting(E_ALL);
$pregno =$_POST['rnum'];
$pno=$_POST['patno'];
$adate=date("Y-m-d", strtotime($_POST['admitdate']));
//date("Y-m-d", strtotime($dateToday));
$atime=$_POST['time'];
$ampm = $_POST['time1'];
$atime1 = $atime." ".$ampm; 
 $bedno=$_POST['bedsno'];
$dstatus='ADMITTED';
$bstatus='NOT PAID';
$ctype=$_POST['conce_type'];
$concardno=$_POST['conce_card'];
$insutype=$_POST['insutype'];
$amt=$_POST['adm_fee'];
$conamt=$_POST['conce_fee'];
$allotby = $_POST['emp_name'];
$aname = $_POST['emp_name'];
$doccode =$_POST['docname'];
$cashcredit = $_POST['pat_type'];
$dcost = $_POST['diet_cost'];
$mrcost = $_POST['mr_charge'];

$advdate1 = $_POST['adv_date'];
$advdate = date("Y-m-d", strtotime($advdate1));
$advamt = $_POST['rupees'];
$adt=$_POST['admitdate'];
$pname=$_POST['pname'];
 $roomsno = $_POST['roomsno'];
 $room_type = $_POST['room_type'];
 $pkg_amnt=$_POST['pkg_amnt'];
 $pkg_type=$_POST['pkg'];
 $pay_type=$_POST['pay_type'];
 $pkg="Yes";
 
 $dt=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount where date(date1)='$dt'") or die(mysqli_error($link));
$bcnt=mysqli_num_rows($sq);
//$cnt=$bcnt+1;
 $cnt1=$bcnt+1; 
$cnt=date('dmy')."-".$cnt1;
date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 

 if($advamt>=1){

  $sq="insert into ip_pat_admit(PAT_REGNO,PAT_NO,ADMIT_DATE,ADMIT_TIME,BED_NO,DIS_STATUS,BILL_STATUS,CONCESSION_TYPE,
 CONCESSION_CARDNO,AMOUNT,CONS_AMT,ALLOT_BY,CURRENTDATE,AUTH_BY,doc_code,cash_credit,diet_cost,MR_cost,package,pkg_type,pkg_amount,adv_amnt,bill_num) 
values('$pregno','$pno','$adate',str_to_date('$atime','%r'),'$bedno','ADMITTED','NOT PAID','$ctype','$concardno',
'$amt','$conamt','$allotby',now(),'$aname','$doccode','$cashcredit','$dcost','$mrcost','$pkg','$pkg_type','$pkg_amnt','$advamt','$cnt')"; 
 } else {
	 $sq="insert into ip_pat_admit(PAT_REGNO,PAT_NO,ADMIT_DATE,ADMIT_TIME,BED_NO,DIS_STATUS,BILL_STATUS,CONCESSION_TYPE,
 CONCESSION_CARDNO,AMOUNT,CONS_AMT,ALLOT_BY,CURRENTDATE,AUTH_BY,doc_code,cash_credit,diet_cost,MR_cost,package,pkg_type,pkg_amount,adv_amnt) 
values('$pregno','$pno','$adate',str_to_date('$atime','%r'),'$bedno','ADMITTED','NOT PAID','$ctype','$concardno',
'$amt','$conamt','$allotby',now(),'$aname','$doccode','$cashcredit','$dcost','$mrcost','$pkg','$pkg_type','$pkg_amnt','')"; 

	 
 }
 

mysqli_query($link,$sq) or die(mysqli_error($link)); 

if($advamt>=1){
$qq=mysqli_query($link,"insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)
values('In Patient','$advamt','$cnt','$pregno','$ses','$pay_type','$ndate','In Patient')") or die(mysqli_error($link));
 }
$sd=mysqli_query($link,"select * from patientregister where registerno='$pregno'") or die(mysqli_error($link));
$r=mysqli_fetch_array($sd);
	
 $to2=$r['ref_doc_mob'];
 $dc=$r['doctorname'];
 $age=$r['age'];
 $gender=$r['gender'];
 $mobile=$r['mobile'];
//$to2=9959583024;
	//$msg = "Op We recived your op patient $pname ,$addr .";
	$ch = curl_init();
$msg="YOUR PATIENT $pname GOT ADMITTED. $atime $ampm AND $adt.  UNDER $dc. FURTHER DETAILS WE WILL UPDATE. WE WILL HAPPY FOR UR SUPPORT";
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
 //$buffer = curl_exec($ch);




$ch = curl_init();
//$dc=9849659487;
$sd=mysqli_query($link,"select * from doct_infor where dname1='$doccode'") or die(mysqli_error($link));
$r=mysqli_fetch_array($sd);
	
 $dc=$r['mnum1'];
$msg1="$pname, $age, $gender is got admitted under you";
//$url1 ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$dc&from=DHSHUZ&message=".urlencode($msg1); 
//$ret1 = file($url1); 
$user="durgahospital";
$password="admin123";
//$receipientno="9666111717,9959583024";
$senderID="DHSHUZ"; 
curl_setopt($ch,CURLOPT_URL,  "http://sms.scubedigi.com/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$user&password=$password&to=$dc&from=$senderID&message=$msg1");
 //$buffer = curl_exec($ch);



$ch = curl_init();
//$mobile=8801062501;
$msg2="Dear $pname .Welcome to durga hospital. We are happy to choose our hospital to serve better. Your 	Login id $pregno and password  $mobile .Please Login to www.durgahospital.com/users";
//$url1 ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$dc&from=DHSHUZ&message=".urlencode($msg1); 
//$ret1 = file($url1); 
$user="durgahospital";
$password="admin123";
//$receipientno="9666111717,9959583024";
$senderID="DHSHUZ"; 
curl_setopt($ch,CURLOPT_URL,  "http://sms.scubedigi.com/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$user&password=$password&to=$mobile&from=$senderID&message=$msg2");
 //$buffer = curl_exec($ch);


//$mobile=8801062501;
	//$msg2 = "Dear $pname .Welcome to durga hospital. We are happy to choose our hospital to serve better. Your 	Login id $pregno and password  $mobile .Please Login to www.durgahospital.com/users";
//$msg="YOUR PATIENT $pname GOT ADMITTED. $time AND $d.  UNDER $doctorname. FURTHER DETAILS WE WILL UPDATE. WE WILL HAPPY FOR UR SUPPORT";
//$url2 ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$mobile&from=DHSHUZ&message=".urlencode($msg2); 
//$ret = file($url2);
if($sq){
	$qry1=mysqli_query($link,"insert into ip_pat_bed(PAT_NO,BED_NO,START_DATE,START_TIME,ALLOTED_BY,CURRENTDATE,AUTH_BY,room_no,room_type) values('$pno','$bedno','$adate',str_to_date('$atime','%r'),'$allotby',now(),'$aname','$roomsno','$room_type')") or die(mysqli_error($link));

	if($qry1){
	$qry = mysqli_query($link,"update bed_details set BED_STATUS='Reserved' where BED_NO='$bedno' and ROOM_NO='$roomsno'") or die(mysqli_error($link)); 	
	if($qry)
	{
		$qry3=mysqli_query($link,"update patientregister set pat_type='IP',status='Used' where registerno='$pregno'") or die(mysqli_error($link));	
		if($qry3)
		{
		if($cashcredit == "cash"){	
		//	$sql1 = mysql_query();
		}
		
			print "<script>";
			print "alert('Successfully added');";
			print "self.location='in_patient_admit.php';";
			print "</script>";
		
		}
	}		
	}
}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>