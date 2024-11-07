<?php
ob_start();
include("config.php");

if(isset($_POST['submit'])){
error_reporting(E_ALL);
$pregno =$_POST['rnum'];
$pno=$_POST['patno'];
$sno = $_POST['sno'];
$adate=date("Y-m-d", strtotime($_POST['admitdate']));
//date("Y-m-d", strtotime($dateToday));
$atime=$_POST['time'];
//$ampm = $_POST['time1'];
//$atime1 = $atime." ".$ampm; 
$bedno=$_POST['bedsno'];
$dstatus='ADMITTED';
$bstatus='NOT PAID';
$cashcredit = $_POST['pat_type'];
if($cashcredit == "credit"){
	$ctype=$_POST['concession_type'];
	$concardno=$_POST['conce_card'];
	$insutype=$_POST['insutype'];
}else{
	$ctype="";
	$concardno="";
	$insutype="";
}
$amt=$_POST['adm_fee'];
$conamt=$_POST['conce_fee'];
$allotby = $_POST['emp_name'];
$aname = $_POST['emp_name'];
$doccode =$_POST['docname'];
$cashcredit = $_POST['pat_type'];
$dcost = $_POST['diet_cost'];
$mrcost = $_POST['mr_charge'];



$status=$_POST['bstatus'];
if($status=="cancel"){
	
	$sdate=date('Y-m-d');
}else{
	$sdate='';
}

$qry9= mysql_query("select PAT_REGNO,BED_NO from ip_pat_admit where pat_no='$pno'");
if($qry9)
{
	$row9 = mysql_fetch_array($qry9);
	$oldbedno = $row9['BED_NO'];
	$oldregno = $row9['PAT_REGNO'];
}
	if($bedno != $oldbedno && $oldregno!=$pregno){
	$qry4= mysql_query("update bed_details set BED_STATUS='Not Reserved' where BED_NO='$oldbedno'");
	
	$qry5=mysql_query("update patientregister set pat_type='OP' where registerno='$oldregno'");
	}else{
	
	$qry= mysql_query("update ip_pat_admit set pat_regno='$pregno', ADMIT_DATE='$adate',ADMIT_TIME='$atime',BED_NO='$bedno',DIS_STATUS='ADMITTED',BILL_STATUS='NOT PAID',
	CONCESSION_TYPE='$ctype',CONCESSION_CARDNO='$concardno',AMOUNT='$amt',CONS_AMT='$conamt',ALLOT_BY='$allotby',CURRENTDATE=now(),AUTH_BY='$aname',doc_code='$doccode',cash_credit='$cashcredit',diet_cost='$dcost',MR_COST='$mrcost',status='$status',sdate='$sdate' where pat_no='$pno' ");
	if($qry){
	$qry1=mysql_query("update ip_pat_bed set BED_NO='$bedno',START_DATE='$adate',START_TIME='$atime',ALLOTED_BY='$allotby',CURRENTDATE=now(),AUTH_BY='$aname' where pat_no='$pno' and sno=$sno");
	if($qry1){
		
		$qry2=mysql_query("update bed_details set BED_STATUS='Reserved' where BED_NO='$bedno'");		
		if($qry2){
			print "<script>";
			print "alert('Successfully updated');";
			print "self.location='in_patient_admit.php';";
			print "</script>";
		}else{
			print "<script>";
			print "alert('unable to update');";
			print "self.location='in_patient_admit.php';";
			print "</script>";
		}	
	}		
	}
	}
}
else{
mysql_error();}

?>
<?php
ob_get_flush();
?>