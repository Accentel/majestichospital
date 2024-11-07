<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
	//print_r($_POST); exit;
//error_reporting(E_ALL);
$doct=$_POST['rnum'];
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
//$ApplicationDeadline=$_POST['ApplicationDeadline'];
//$ApplicationDeadline=date('Y-m-d', strtotime($_POST['ApplicationDeadline']));
 $ApplicationDeadline=$_POST['ApplicationDeadline'];
$type=$_POST['type'];
$rel=$_POST['rel'];
$date=date('Y-m-d');
$token=$_POST['token'];
 $con_fee=$_POST['con_fee']; 
//$total=$_POST['total'];
$total=$con_fee+$fee;
$new=$_POST['new'];
$pname_type=$_POST['pname_type'];
$payment_type=$_POST['payment_type'];
$dept=$_POST['dept'];
$insutype=$_POST['insutype'];
$policy=$_POST['policy'];
$chq_num=$_POST['chq_num'];
$bank=$_POST['bank'];
$chq_date=$_POST['chq_date'];
 
//$doct5=$_POST['gname'];

//$doct6=$_POST['addr'];
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
$abcd1=mysql_query($xxx1);
 //$cnt=mysql_num_rows($abcd);
	$row2=mysql_fetch_array($abcd1);
	 $valid_days=$row2['valid_days'];
	  $valid=date('Y-m-d', strtotime("+$valid_days days"));

$docid = mysql_query("select dname1 from doct_infor where id = '$did'");
if($docid)
{
	$row1 = mysql_fetch_array($docid);
	 $doct3 = $row1['dname1'];

}
//exit;
if($doct3!=''){ 

$doct3=$doct3;}
 else {
$doct3=$did;	 
 } 
 // $doct3; 
 echo $ff="INSERT INTO `patientregister`( `registerno`,  `doctorname`, `patientname`, `age`, `gaurdianname`,
 `gender`, `address`, `phoneno`, `registerfee`, `remarks`, `pat_type`, `pay_type`, `aadar`, `ref_doc`, `ref_doc_mob`,
  `con_doc_mob`,`rel_type`,`date`,`tokenno`,`cons_fee`,`total`,`pat_type1`,`pname_type`,`validity`,`concession_type`,`dept`,`insutype`
  ,`policy`,`chq_num`,`bank`,`chq_date`) VALUES ('$doct','$doct3','$pname','$age','$fname' ,'$sex',
 '$addr','$mobile','$fee','$rmarks','$type','$concession_type','$aadhar','$ref_doc','$ref_mob','$con_doct_mob','$rel',
 '$date','$token','$con_fee','$total','$new','$pname_type','$valid','$payment_type','$dept','$insutype',
 '$policy','$chq_num','$bank','$chq_date')";  
$sq=mysql_query($ff);
$id=mysql_insert_id();

$msf="insert into opdigitalform(pname,age,sex,mrno,optype,date1,consult_doct) values('$pname','$age','$sex','$doct','$type','$date','$doct3')";
mysql_query($msf) or die(mysql_error());
//$sq=mysql_query("INSERT INTO patientregister(registerno,registerdate,doctorname,patientname,age,gaurdianname,gender,address,phoneno,occupation,appointmentdate,registerfee,remarks,pat_type,con_type,card_no,insu_type)
//VALUES('$doct','$doct1','$doct3','$doct4','$doct13','$doct5','$doct14','$doct6','$doct7','$doct8','$doct11','$doct12','$doct9','$pattype','$ctype','$cardno','$insutype')");
if($sq){
$sq1=mysql_query("INSERT INTO `patientregister1`(`registerno`,  `doctorname`, `patientname`, `age`, `gaurdianname`,
 `gender`, `address`, `phoneno`, `registerfee`, `remarks`, `pat_type`, `pay_type`, `aadar`, `ref_doc`, `ref_doc_mob`,
  `con_doc_mob`,`rel_type`,`date`,`tokenno`,`cons_fee`,`total`,`pat_type1`,`pname_type`,`validity`,`concession_type`,`dept`,`insutype`
  ,`policy`,`chq_num`,`bank`,`chq_date`) VALUES ('$doct','$doct3','$pname','$age','$fname' ,'$sex',
 '$addr','$mobile','$fee','$rmarks','$type','$concession_type','$aadhar','$ref_doc','$ref_mob','$con_doct_mob','$rel',
 '$date','$token','$con_fee','$total','$new','$pname_type','$valid','$payment_type','$dept','$insutype',
 '$policy','$chq_num','$bank','$chq_date')");
}

$s=mysql_query("select * from ulogin where uname='$doct'");
					$count=mysql_num_rows($s);
if($count==0)
{
				$y=mysql_query("insert into ulogin (uname,pass)values('$doct','$mobile')");
						
						
					}

if($sq1){
	$vdate = date("Y-m-d");
	$authby = $_POST['authby'];
	
	$op = mysql_query("insert into op_pat_dlt(PAT_REGNO,OP_NO,VISIT_NO,VISIT_DT,DOC_CODE,CURRENTDATE,AUTH_BY,token_status,reg_fee) 
	values('$doct','$opno','1','$vdate','$did',now(),'$authby','Y','$fee')");
	if($op)
	{
		 $xx="insert into doct_pat_appmnt(DOC_CODE, PAT_REGNO, APPMNT_DATE,  CURRENTDATE, AUTH_BY) 
		values('$did','$doct','$vdate',now(),'$authby')";
		
		$patapt= mysql_query($xx);

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
mysql_error();}
}
?>
<?php
ob_get_flush();
?>