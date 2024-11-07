<?php
ob_start();
include('config.php');
$bilno=$_REQUEST['q'];
//$query="delete from bill where BillNO='$bilno'";
$query="update bill set PatientName='canceled',DoctorName='DoctorName', TestName='0',Amount='0', Total='0', Discount='0', NetAmount='0', PaidAmount='0',  BalanceAmount='0',remarks='this is updated by admin' where BillNO='$bilno' ";
mysqli_query($link,$query)or die(mysqli_error($link));
//$query1="delete from bill1 where BillNO='$bilno'";
$query1="update bill1 set  Total='0', Discount='0', NetAmount='0', PaidAmount='0',  BalanceAmount='0' where BillNO='$bilno' ";
mysqli_query($link,$query1)or die(mysqli_error($link));

$query2="update bill1 set PatientName='canceled',DoctorName='DoctorName',  paidamount='0' where billno='$bilno' ";
$res=mysqli_query($link,$query2)or die(mysqli_error($link));

//$query5="update duebill set  paidamount	='0'  where billno='$bilno' ";
//$res=mysqli_query($link,$query5)or die(mysqli_error($link));
if($res){
header('Location:new_lab_bill.php');
}
 ?>