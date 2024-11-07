<?php
include("config.php");
if(isset($_POST['submit'])){
$bno =$_POST['bno'];

$expense = $_POST['expense'];
$paidto = $_POST['paidto'];
$towards = $_POST['towards'];
$mobno = $_POST['mobno'];
$aname = $_POST['authby'];
$paid_date = date('Y-m-d', strtotime($_POST['paid_date']));
$amt = $_POST['rupees'];
$pmode = $_POST['pay_type'];
$bname = $_POST['bname'];
$chqno = $_POST['chqno'];
$acno = $_POST['acno'];
$chqdate = $_POST['chqdate'];
$advwords = $_POST['adv_words'];

$sql1 = mysqli_query($link,"insert into addexpenses(bill_no, bill_date, paid_to, mobile_no, amount, towards,pay_type,bname,chq_no,chq_date,account_no,amt_words,auth_by,currentdate,expense) values('$bno','$paid_date','$paidto','$mobno','$amt','$towards','$pmode','$bname','$chqno','$chqdate','$acno','$advwords','$aname',now(),'$expense')")or die(mysqli_error($link));
if($sql1)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='direct_expenses.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='add_direct.php';";
	print "</script>";
}
}
?>