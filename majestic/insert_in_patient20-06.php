<?php
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
//$pmode = $_POST['pay_type'];
//$cadrno = $_POST['card'];

$sq="insert into ip_pat_admit(PAT_REGNO,PAT_NO,ADMIT_DATE,ADMIT_TIME,BED_NO,DIS_STATUS,BILL_STATUS,CONCESSION_TYPE,CONCESSION_CARDNO,AMOUNT,CONS_AMT,ALLOT_BY,CURRENTDATE,AUTH_BY,doc_code,cash_credit,diet_cost,MR_cost) 
values('$pregno','$pno','$adate',str_to_date('$atime','%r'),'$bedno','ADMITTED','NOT PAID','$ctype','$concardno','$amt','$conamt','$allotby',now(),'$aname','$doccode','$cashcredit','$dcost','$mrcost')";
mysql_query($sq) or die(mysql_error()); 
if($sq){
	$qry1=mysql_query("insert into ip_pat_bed(PAT_NO,BED_NO,START_DATE,START_TIME,ALLOTED_BY,CURRENTDATE,AUTH_BY) values('$pno','$bedno','$adate',str_to_date('$atime','%r'),'$allotby',now(),'$aname')");

	if($qry1){
	$qry = mysql_query("update bed_details set BED_STATUS='Reserved' where BED_NO='$bedno'");	
	if($qry)
	{
		$qry3=mysql_query("update patientregister set pat_type='IP',status='Used' where registerno='$pregno'");	
		if($qry3)
		{
		if($cashcredit == "cash"){	
			$sql1 = mysql_query("insert into adv_collection(PAT_NO, ADV_DATE, ADV_AMT, PAYMENT_MODE, CURRENTDATE, AUTH_BY,card_no) values('$pno','$advdate','$advamt','Cash',now(),'$aname','$concardno')");
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
mysql_error();}
}
?>
<?php
ob_get_flush();
?>