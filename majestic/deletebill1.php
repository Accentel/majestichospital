<?php
ob_start();
include('config.php');
$bilno=$_REQUEST['q'];
//$query="delete from bill where BillNO='$bilno'";
$query="update mbill set PatientName='canceled',DoctorName='DoctorName', TestName='0',Amount='0', Total='0', Discount='0', NetAmount='0', PaidAmount='0',  BalanceAmount='0',remarks='this is updated by admin' where BillNO='$bilno' ";
mysql_query($query);
//$query1="delete from bill1 where BillNO='$bilno'";
$query1="update mbill1 set  Total='0', Discount='0', NetAmount='0', PaidAmount='0',  BalanceAmount='0' where BillNO='$bilno' ";
mysql_query($query1);

$query2="update mbill1 set PatientName='canceled',DoctorName='DoctorName',  paidamount='0' where billno='$bilno' ";
$res=mysql_query($query2);

//$query5="update duebill set  paidamount	='0'  where billno='$bilno' ";
//$res=mysql_query($query5);
if($res){
header('Location:manual_lab_bill.php');
}
 ?>