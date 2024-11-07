<?php
include("config.php");

if(isset($_POST['submit'])){
$billno=$_POST['billno'];
$billdate= date('Y-m-d',strtotime($_POST['billdate']));
$patno=$_REQUEST['patno'];
$patregno=$_REQUEST['patregno'];
$admdt=date('Y-m-d',strtotime($_POST['admdt']));
$DisDate=date('Y-m-d',strtotime($_POST['DisDate']));

$patname=$_POST['patname'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$addr=$_POST['addr'];
$con_doct=$_POST['con_doct'];
$contact=$_POST['contact'];
$rel_type=$_POST['rel_type'];
$rel_name=$_POST['rel_name'];
$constype=$_POST['constype'];
$conscardno=$_POST['conscardno'];
$icu_days=$_POST['icu_days'];
$bed_chrg=$_POST['bed_chrg'];
$int_chrg=$_POST['int_chrg'];
$nur_chrg=$_POST['nur_chrg'];
$txtgen=$_POST['txtgen'];
$genbed=$_POST['genbed'];
$nurcharg=$_POST['nurcharg'];
$dmo=$_POST['dmo'];
$txtcritical=$_POST['txtcritical'];
$carm=$_POST['carm'];
$oper=$_POST['oper'];
$opercons=$_POST['opercons'];
$txtinst=$_POST['txtinst'];
$txtAT=$_POST['txtAT'];
$txtsurg=$_POST['txtsurg'];
$txtsurg_as=$_POST['txtsurg_as'];
$txtanaestist=$_POST['txtanaestist'];
$an_cons=$_POST['an_cons'];
$dress=$_POST['dress'];

$hospTot=$_POST['txtTot'];
$labtot=$_POST['labtot'];
$pharmacytot=$_POST['pharmacytot'];

$totamt=$_POST['txtTot1'];
$totconsession=$_POST['txtconces'];
$netamt=$_POST['netamt'];
$surgery=$_POST['surgery'];
$surgeryamount=$_POST['surgeryamount'];

$hosppaid=$_POST['hosppaid'];
$hospdue=$_POST['hospdue'];
$labpaid=$_POST['labpaid'];
$labdue=$_POST['labdue'];
$pharmacypaid=$_POST['pharmacypaid'];
$pharmacydue=$_POST['pharmacydue'];

$totpaid=$_POST['totpaid'];
$totdue=$_POST['totdue'];
$roomtype=$_POST['roomtype'];
$q="insert into final_bill(BILL_DATE,PatientNo,PatientMRNo,PatientName,Age,Sex,Address,ConsultDoctor,ContactNo,Relation,RelationName,AdmissionDate,DischargeDate,icudays,gendays,icubed,icuintensit,icunursing,genbed,gennursing,gendmo,Criticalcare,CARMcare,otcharge,otconcession,otinstrument,Anaesthesia,Surgeon,AsstSurgeon,Anaesthetist,Anaesthetistconnession,tothosp,totlab,totpharmacy,dresscharg,totamt,totconsession,netamt,hospaid,hospdue,labpaid,labdue,pharmacypaid,pharmacydue,totpaid,totdue,surgery,surgeryamount,roomtype,bno)values('$billdate','$patno','$patregno','$patname','$age','$sex','$addr','$con_doct','$contact','$rel_type','$rel_name','$admdt','$DisDate','$icu_days','$txtgen','$bed_chrg','$int_chrg','$nur_chrg','$genbed','$nurcharg','$dmo','$txtcritical','$carm','$oper','$opercons','$txtinst','$txtAT','$txtsurg','$txtsurg_as','$txtanaestist','$an_cons','$hospTot','$labtot','$pharmacytot','$dress','$totamt','$totconsession','$netamt','$hosppaid','$hospdue','$labpaid','$labdue','$pharmacypaid','$pharmacydue','$totpaid','$totdue','$surgery','$surgeryamount','$roomtype','$billno')";


$rs=mysqli_query($link,$q) or die(mysqli_error($link));
$fid=mysqli_insert_id($link);

$count=count($_POST['docname']);
for($i=0;$i<$count;$i++){
	$docname = $_POST['docname'][$i];
	$days1 = $_POST['days1'][$i];
	$amount1 = $_POST['amount1'][$i];
	$total1 = $_POST['total1'][$i];
	
	
//if($docname != ""){
$sql1 = mysqli_query($link,"insert into final_doctor_visit(fid, docname, visits, amount, total) values('$fid','$docname','$days1','$amount1','$total1')");
//}
	
	
	}


$count1=count($_POST['days']);
for($i=0;$i<$count1;$i++){
	$days = $_POST['days'][$i];
	$tname = $_POST['tname'][$i];
	$cost = $_POST['cost'][$i];
	$amnt = $_POST['amnt'][$i];
	
	

$sql2 = mysqli_query($link,"insert into final_other_desc(fid, description, days, amount, total) values('$fid','$tname','$days','$cost','$amnt')");

	
	
	}
 

$y11=mysqli_query($link,"update ip_pat_admit set DIS_STATUS='Intimated' where pat_no='$patno'");
$z11=mysqli_query($link,"update ip_pat_bed set end_date='$DisDate' where pat_no='$patno' and end_date is null ");

$a="select * from patientregister where registerno='$patregno'";
	$sd=mysqli_query($link,$a);
$r=mysqli_fetch_array($sd);
$patientname=$r['patientname'];
$mobile=$r['mobile'];
$ch = curl_init();	
 //$to2=$r['ref_doc_mob'];
	   $to2=$r['ref_doc_mob'];
	   // $to2=8297650972;

 $b="SELECT * FROM `referal_doctor` where mobile='$to2'";
	$sd1=mysqli_query($link,$b);
$r=mysqli_fetch_array($sd1);
 $iplabshare=$r['iplabshare'];
 $hospitalamount=$r['hospitalamount'];

 $txt=$txtTot;
 $lab=$labtot;
 $t=$txt+$lab;

 $at=$txt*$hospitalamount/100;
 $at1=$lab*$iplabshare/100;
 $aa=$at+$at1;
// $to2=9959583024;

 $msg="FINAL BILL AMOUNT OF REFERAL $patientname: TOTAL BILL OF REFERAL $t
Your Patient bill was settled and  your referral amount is $aa .Thank you.We need your relationship for best results in health care. Our  PRO will contact you soon with amount";

//Dear $patientname .Welcome to durga hospital. Now Paid Advanced Amount is $advamt $dt.";
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

 //$to2=$r['phoneno'];
 //$dc=$r['doctorname'];
//$mobile=8801062501;
	//$msg = "Op We recived your op patient $pname ,$addr .";
$msg1="Dear $patientname .Your Mrnum is $patregno. Total  Amount is $netamt ,Paid amount $totpaid and Balance amount is $totdue.";
//$url ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$to2&from=DHSHUZ&message=".urlencode($msg); 
//$ret = file($url); 
 $user="durgahospital";
$password="admin123";
//$receipientno="9666111717,9959583024";
$senderID="DHSHUZ"; 
curl_setopt($ch,CURLOPT_URL,  "http://sms.scubedigi.com/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$user&password=$password&to=$mobile&from=$senderID&message=$msg1");
//echo //$buffer = curl_exec($ch);



if($z11)
{
	print "<script>";
	print "alert('Successfully added');";
	print "self.location='final_bill_print.php?id=$fid';";
	print "</script>";
}
}
?>