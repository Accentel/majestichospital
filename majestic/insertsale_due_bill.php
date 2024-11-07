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
$sq=mysqli_query($link,"select * from daily_amount1 where date(date1)='$dt'");
$bcnt=mysqli_num_rows($sq);
$cnt1=$bcnt+1;
$cnt=date(dmy)."-".$cnt1;

$aa="insert into daily_amount1(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc,doct_name,name)
 values('$custm_type','$amt','$cnt','$mrnum','$admin','$ptype','$ndate','Pharmacy','$consultantname','$pname1')";
	
$qq=mysqli_query($link,$aa) or die(mysqli_error($link));
if($sql1)
{
	print "<script>";
	print "alert('Successfully updated');";
	print "self.location='salesentry_list.php';";
	print "</script>";
	//header("Location:send_sms.php?bno=$bno&d=$cdue&rb=$rbal&pn=$pname&bd=$bdate&t=$tot&bal=$bal&user=$user");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='duesale.php';";
	print "</script>";
	}
}
?>