<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$adm_date=$_REQUEST['adm_date'];
$adm_time=$_REQUEST['adm_time'];
$room_no=$_REQUEST['room_no'];
$bed_no=$_REQUEST['bed_no'];
$st_date=date('Y-m-d',strtotime($_REQUEST['st_date']));
$st_time=date('h:i:s',strtotime($_REQUEST['st_time']));
$e_date=date('Y-m-d',strtotime($_REQUEST['e_date']));
$e_time=date('h:i:s',strtotime($_REQUEST['e_time']));
$etime1=$_REQUEST['etime1'];
$allotedby=$_REQUEST['allotedby'];
$change=$_REQUEST['change'];

$tr_rooms_no=$_REQUEST['tr_rooms_no'];

$tr_beds_no=$_REQUEST['tr_beds_no'];

$tr_st_date=date('Y-m-d',strtotime($_REQUEST['tr_st_date']));
$tr_st_time=date('h:i:s',strtotime($_REQUEST['tr_st_time']));
$time1=$_REQUEST['time1'];


if($tr_rooms_no==""){
$tr_rooms_no=$room_no;
$tr_beds_no=$bed_no;
$tr_st_date=$st_date;
$tr_st_time=$st_time;
}

$res=mysqli_query($link,"select max(sno) from ip_pat_bed")or die(mysqli_error($link));

	  while($row=mysqli_fetch_array($res)){
		$sno=$row[0];
	  }
	  
$sno=$sno+1;

$e_time=substr($etime,0,5);
$e_time=$e_time.":00";
$etime1=" ".$etime1;
$etime1=$e_time.$etime1;
$etime1 = date('h:i:s',strtotime($etime1));
$times=substr($st_time,5,8);	
$st_time=substr($st_time,0,5);
$st_time=$st_time.":00";
$times=" ".$times;
$times=$st_time.$times;
$times=	date('h:i:s',strtotime($times));
$prt_qr1=mysqli_query($link,"update ip_pat_bed set END_DATE='$e_date',END_TIME='$etime1',CURRENTDATE=now(),AUTH_BY='$admin',pre_BED_CHARGES='$prev_bed_charge', ALLOTED_BY='$allotedby' where START_DATE='$st_date' and START_TIME='$times' and PAT_NO='$patno' ")or die(mysqli_error($link));
	
$prt_qr2=mysqli_query($link,"insert into ip_pat_bed(sno,PAT_NO,BED_NO,START_DATE,START_TIME,PRE_BED_CHARGES,ALLOTED_BY, CURRENTDATE, AUTH_BY) values($sno,'$patno','$tr_beds_no','$tr_st_date','$etime1',$prev_bed_charge,'$allotedby',now(),'$admin')")or die(mysqli_error($link));

$prt_qr3=mysqli_query($link,"update bed_details set BED_STATUS='Unreserved' where BED_NO='$bed_no' ")or die(mysqli_error($link));

$prt_qr4=mysqli_query($link,"update bed_details set BED_STATUS='Reserved' where BED_NO='$tr_beds_no'")or die(mysqli_error($link));
$prt_qr6=mysqli_query($link,"update ip_pat_bed set BED_NO='$tr_beds_no' where pat_no='$patno'")or die(mysqli_error($link));

$prt_qr5=mysqli_query($link,"update ip_pat_admit set BED_NO='$tr_beds_no' where pat_no='$patno'")or die(mysqli_error($link));
	
	
if($prt_qr5){
header("Location:casesheet.php?a=1");
}	
else{
header("Location:casesheet.php?a=2");
}
			
?>