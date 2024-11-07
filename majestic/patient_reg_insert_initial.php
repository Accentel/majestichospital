<?php
session_start(); 

$ses = $_SESSION['name1'];// exit;
ob_start();
date_default_timezone_set('Asia/Kolkata');
include("config.php");
if(isset($_POST['submit'])){
	$ch = curl_init();
	
//	print_r($_POST); exit;
//error_reporting(E_ALL);
 $doct=$_POST['rnum'];
 
 $systemdate=$_POST['ApplicationDeadline'];
  $systemtime=$_POST['ApplicationDeadline1'];
  
$doct1=$_POST['ApplicationDeadline1'];
//$doct2=$_POST['tknum'];
 $did=$_POST['doctorname'];
$pname=$_POST['pname'];
$fname=$_POST['fname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$mobile=$_POST['mobile'];
$aadhar=$_POST['aadhar'];
  $ref_doc=$_POST['ref_doc'];
$ref_mob=$_POST['ref_mob'];
$doctorname=$_POST['doctorname'];
$con_doct_mob=$_POST['con_doct_mob'];
 $concession_type=$_POST['concession_type'];
$fee=$_POST['fee'];
$addr=$_POST['addr'];
$rmarks=$_POST['rmarks'];

 $ApplicationDeadline=$_POST['ApplicationDeadline'];
  $type=$_POST['type']; 
$rel=$_POST['rel'];
$date=date('Y-m-d');
$token=$_POST['token'];
  $con_fee=$_POST['con_fee']; 
  $reg_no=$_POST['reg_no']+1;
//$total=$_POST['total'];

if($type=='OP'){
$sdec="Patient Register";	
 $con_fee=$_POST['con_fee']; 
} else if($type=='IP') {
	$sdec="In Patient";
}else if($type=='Lab') {
	$sdec="Lab";
	$con_fee="0";
}else if($type=='Hospital') {
	$sdec="Hospital";
	 $con_fee=0;
}


$serv_name=$_POST['serv_name'];

$ser_amt=$_POST['ser_amt'];

     $total=$con_fee+$fee+$ser_amt;  
$new=$_POST['new'];
$pname_type=$_POST['pname_type'];
 $payment_type=$_POST['payment_type']; 
$dept=$_POST['dept'];
$insutype=$_POST['insutype'];
$policy=$_POST['policy'];
$chq_num=$_POST['chq_num'];
$bank=$_POST['bank'];
$chq_date=$_POST['chq_date'];
 $time= date("h:i:sa");
 $d=date('d-m-Y');
$currentasiantime=$date.' '.$time;
 $insutype_name=$_POST['insutype_name'];
 $policy_no=$_POST['policy_no'];
 $pkg_amt=$_POST['pkg_amt'];
 $req_amt=$_POST['req_amt'];
 $req_no=$_POST['req_no'];
 $apr_date=$_POST['apr_date'];
  $ins_type=$_POST['ins_type'];
  $token1=$_POST['token1'];
  $ser=$_POST['ser'];
 
 
 

//$doct7=$_POST['mnum'];
//$doct8=$_POST['occ'];
//$doct11=$_POST['ApplicationDeadline2'];
//$doct12=$_POST['fee'];
//$doct9=$_POST['rmarks'];
$pattype="OP";
$opno = $_POST['opno'];
//$cardno = $_POST['conce_card'];
//$ctype = $_POST['concession_type'];
//$insutype = $_POST['insutype'];
 $xxx1="SELECT * FROM `validity_days`";
$abcd1=mysqli_query($link,$xxx1) or die(mysqli_error($link));
 //$cnt=mysqli_num_rows($abcd);
	$row2=mysqli_fetch_array($abcd1);
	 $valid_days=$row2['valid_days'];
	  $valid=date('Y-m-d', strtotime("+$valid_days days"));
//echo $kxx="select dname1 from doct_infor where id = '$did'";
 $kxx="select dname1 from doct_infor where id = '$did'";
$docid = mysqli_query($link,$kxx) or die(mysqli_error($link));
if($docid)
{
	$row1 = mysqli_fetch_array($docid);
	 $doct3 = $row1['dname1'];

}

if($doct3=='ZAINAB'){
$new_doct_type="";	
} else if($doct3=='NISHAT HYDERI'){
$new_doct_type="";	
}else if($doct3=='PARVEEN KULSUM'){
$new_doct_type="";	
} else if($doct3=='MUSTAFA HUSSAIN'){
$new_doct_type="";	
} else if($doct3=='HUSNA'){
$new_doct_type="";	
} else {
	$new_doct_type="VISIT";
}

//exit;
if($doct3!=''){ 

$doct3=$doct3;}
 else {
$doct3=$did;	  
 } 
 $dt=date('Y-m-d');
 $tyy="select * from daily_amount where date(date_time)='$dt'";
$sq=mysqli_query($link,$tyy) or die(mysqli_error($link)) ;
$bcnt=mysqli_num_rows($sq);
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 
 
 // $doct3; 
   /* $ff="INSERT INTO `patientregister`( `registerno`,  `doctorname`, `patientname`, `age`, `gaurdianname`,
 `gender`, `address`, `phoneno`, `registerfee`, `remarks`, `pat_type`, `pay_type`, `aadar`, `ref_doc`, `ref_doc_mob`,
  `con_doc_mob`,`rel_type`,`date`,`tokenno`,`cons_fee`,`total`,`pat_type1`,`pname_type`,`validity`,`concession_type`,`dept`,`insutype`
  ,`policy`,`chq_num`,`bank`,`chq_date`, `insutype_name`, `policy_no`, `pkg_amt`, `req_amt`, `req_no`, `apr_date`, `ins_type`,`token_num`,`auth_by`,bill_num,serv_name,hosp_fee,reg_no) VALUES 
  ('$doct','$doct3','$pname','$age','$fname' ,'$sex',
 '$addr','$mobile','$fee','$rmarks','$type','$concession_type','$aadhar','$ref_doc','$ref_mob','$con_doct_mob','$rel',
 '$date','$token','$con_fee','$total','$new','$pname_type','$valid','$payment_type','$dept','$insutype',
 '$policy','$chq_num','$bank','$chq_datse','$insutype_name','$policy_no','$pkg_amt','$req_amt','$req_no','$apr_date','$ins_type

 ','$token1','$ser','$cnt','$serv_name','$ser_amt','$reg_no')"; */
// echo $ff="INSERT INTO `patientregister`(`registerno`,`registerdate`,`doctorname`, `patientname`, `age`, `gaurdianname`,
//  `gender`, `address`, `phoneno`, `registerfee`, `remarks`, `pat_type`, `pay_type`, `aadar`, `ref_doc`, `ref_doc_mob`,
//   `con_doc_mob`,`rel_type`,`date`,`tokenno`,`cons_fee`,`total`,`pat_type1`,`pname_type`,`validity`,`concession_type`,`dept`,`insutype`
//   ,`policy`,`chq_num`,`bank`,`chq_date`, `insutype_name`, `policy_no`, `pkg_amt`, `req_amt`, `req_no`, `apr_date`, `ins_type`,`token_num`,`auth_by`,bill_num,serv_name,hosp_fee,reg_no) VALUES 
//   ('$doct','$currentasiantime','$doct3','$pname','$age','$fname' ,'$sex',
//  '$addr','$mobile','$fee','$rmarks','$type','$concession_type','$aadhar','$ref_doc','$ref_mob','$con_doct_mob','$rel',
//  '$date','$token','$con_fee','$total','$new','$pname_type','$valid','$payment_type','$dept','$insutype',
//  '$policy','$chq_num','$bank','$chq_datse','$insutype_name','$policy_no','$pkg_amt','$req_amt','$req_no','$apr_date','$ins_type','$token1','$ser','$cnt','$serv_name','$ser_amt','$reg_no')"; 
 $ff="INSERT INTO `patientregister`(`registerno`,`registerdate`,`doctorname`, `patientname`, `age`, `gaurdianname`,
 `gender`, `address`, `phoneno`, `registerfee`, `remarks`, `pat_type`, `pay_type`, `aadar`, `ref_doc`, `ref_doc_mob`,
  `con_doc_mob`,`rel_type`,`date`,`tokenno`,`cons_fee`,`total`,`pat_type1`,`pname_type`,`validity`,`concession_type`,`dept`,`insutype`
  ,`policy`,`chq_num`,`bank`,`chq_date`, `insutype_name`, `policy_no`, `pkg_amt`, `req_amt`, `req_no`, `apr_date`, `ins_type`,`token_num`,`auth_by`,bill_num,serv_name,hosp_fee,reg_no) VALUES 
  ('$doct','$currentasiantime','$doct3','$pname','$age','$fname' ,'$sex',
 '$addr','$mobile','$fee','$rmarks','$type','$concession_type','$aadhar','$ref_doc','$ref_mob','$con_doct_mob','$rel',
 '$date','$token','$con_fee','$total','$new','$pname_type','$valid','$payment_type','$dept','$insutype',
 '$policy','$chq_num','$bank','$chq_datse','$insutype_name','$policy_no','$pkg_amt','$req_amt','$req_no','$apr_date','$ins_type','$token1','$ser','$cnt','$serv_name','$ser_amt','$reg_no')"; 


 $sq=mysqli_query($link,$ff) or die(mysqli_error($link));
$id=mysqli_insert_id($link);
$y=date('y'); 
$doct="MH-".$y."-".$id; 
if($new=="New"){
    $kk3=mysqli_query($link,"select * from patientregister where reg_id='$id'") or die(mysqli_error($link));
    $kk31=mysqli_fetch_array($kk3);
    $regno=$id;
    $y=date('y');
    $umno="MH-".$y."-".$regno;
    $uy=mysqli_query($link,"update patientregister set registerno='$umno' where reg_id='$id'") or die(mysqli_error($link));
}else{
   $uy=mysqli_query($link,"update patientregister set registerno='$doct' where reg_id='$id'") or die(mysqli_error($link));  
}



$msf="insert into opdigitalform(pname,age,sex,mrno,optype,date1,consult_doct) values('$pname','$age','$sex','$doct','$type','$date','$doct3')";
mysqli_query($link,$msf) or die(mysqli_error($link));
//$sq=mysqli_query($link,"INSERT INTO patientregister(registerno,registerdate,doctorname,patientname,age,gaurdianname,gender,address,phoneno,occupation,appointmentdate,registerfee,remarks,pat_type,con_type,card_no,insu_type)
//VALUES('$doct','$doct1','$doct3','$doct4','$doct13','$doct5','$doct14','$doct6','$doct7','$doct8','$doct11','$doct12','$doct9','$pattype','$ctype','$cardno','$insutype')");
if($sq){
	$ss="INSERT INTO `patientregister1`(`registerno`,`registerdate`,  `doctorname`, `patientname`, `age`, `gaurdianname`,
 `gender`, `address`, `phoneno`, `registerfee`, `remarks`, `pat_type`, `pay_type`, `aadar`, `ref_doc`, `ref_doc_mob`,
  `con_doc_mob`,`rel_type`,`date`,`tokenno`,`cons_fee`,`total`,`pat_type1`,`pname_type`,`validity`,`concession_type`,`dept`,`insutype`
  ,`policy`,`chq_num`,`bank`,`chq_date`) VALUES ('$doct','$currentasiantime','$doct3','$pname','$age','$fname' ,'$sex',
 '$addr','$mobile','$fee','$rmarks','$type','$concession_type','$aadhar','$ref_doc','$ref_mob','$con_doct_mob','$rel',
 '$date','$token','$con_fee','$total','$new','$pname_type','$valid','$payment_type','$dept','$insutype',
 '$policy','$chq_num','$bank','$chq_date')";
$sq1=mysqli_query($link,$ss) or die(mysqli_error($link));
}

$qq=mysqli_query($link,"insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc,doct_name)
values('Patient Register','$total','$cnt','$doct','$ses','$payment_type','$ndate','$sdec','$new_doct_type')") or die(mysqli_error($link));

 $user="durgahospital";
$password="admin123";
//$receipientno="9666111717,9959583024";
$senderID="DHSHUZ"; 
 
if($type!='IP'){
	$to1=$ref_mob;
	
	  //$to1=9959583024;
	$msg = "Op We recived your op patient $pname ,$addr .";
//$msg="YOUR PATIENT $pname GOT ADMITTED. $time AND $d.  UNDER $doctorname. FURTHER DETAILS WE WILL UPDATE. WE WILL HAPPY FOR UR SUPPORT";
 //$url="http://sms.scubedigi.com/api.php?username=DURGAHOSPITAL&password=admin123&to=$to1&from=DHSHUZ&message=$msg"; 

//echo $url ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$to1&from=DHSHUZ&message=".urlencode($msg); 
 //$ret = file($url); 
//echo $ret;

 curl_setopt($ch,CURLOPT_URL,  "http://sms.scubedigi.com/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$user&password=$password&to=$to1&from=$senderID&message=$msg");

//echo //$buffer = curl_exec($ch);
} 
//$to2=$ref_mob;
$ch1 = curl_init();
	$msg1 = "Dear $pname .Welcome to durga hospital. We are happy to choose our hospital to serve better. Your 	Login id $doct and password  $mobile .Please Login to www.durgahospital.com/users";
//$msg="YOUR PATIENT $pname GOT ADMITTED. $time AND $d.  UNDER $doctorname. FURTHER DETAILS WE WILL UPDATE. WE WILL HAPPY FOR UR SUPPORT";
//echo $url1 ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$mobile&from=DHSHUZ&message=".urlencode($msg1); 
//$ret1 = file($url1);
//echo $ret1;

 curl_setopt($ch1,CURLOPT_URL,  "http://sms.scubedigi.com/api.php");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS, "username=$user&password=$password&to=$mobile&from=$senderID&message=$msg1");
//echo $buffer = curl_exec($ch1);



$s=mysqli_query($link,"select * from ulogin where uname='$doct'") or die(mysqli_error($link));
					$count=mysqli_num_rows($s);
if($count==0)
{
				$y=mysqli_query($link,"insert into ulogin (uname,pass)values('$doct','$mobile')") or die(mysqli_error($link));
						
						
					}

if($sq1){
	$vdate = date("Y-m-d");
	$authby = $_POST['authby'];
	
	$op = mysqli_query($link,"insert into op_pat_dlt(PAT_REGNO,OP_NO,VISIT_NO,VISIT_DT,DOC_CODE,CURRENTDATE,AUTH_BY,token_status,reg_fee) 
	values('$doct','$opno','1','$vdate','$did',now(),'$authby','Y','$fee')") or die(mysqli_error($link));
	if($op)
	{
		 $xx="insert into doct_pat_appmnt(DOC_CODE, PAT_REGNO, APPMNT_DATE,  CURRENTDATE, AUTH_BY) 
		values('$did','$doct','$vdate',now(),'$authby')";
		
		$patapt= mysqli_query($link,$xx) or die(mysqli_error($link));

		if($patapt)
		{
			if($type=='IP'){
				
					header("location:add_in_patient_admit2.php?id=$id");
				
				}else if($type=='Lab'){
					header("location:pay_bill2.php?id=$id");
					
				}else{
					
					header("location:print.php?id=$id");
					}
					
					

?>

<?php
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