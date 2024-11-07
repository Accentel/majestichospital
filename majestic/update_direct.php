<?php
include("config.php");
if(isset($_POST['submit'])){
$id = $_REQUEST['id'];
//$bno =$_POST['bno'];
//$regno =$_POST['regno'];
//$pname =$_POST['patname'];
//$age = mysql_real_escape_string($_POST['age']);
//$adate=date('Y-m-d', strtotime($_POST['admitdate']));
$paidto = $_POST['paidto'];
$expenses = $_POST['expenses'];
$towards = $_POST['towards'];
$mobno = $_POST['mobno'];
//$aname = $_POST['authby'];
$paid_date = date('Y-m-d', strtotime($_POST['paid_date']));
$amt = $_POST['rupees'];
$pmode = $_POST['pay_type'];
$bname = $_POST['bname'];
$chqno = $_POST['chqno'];
$acno = $_POST['acno'];
$chqdate = $_POST['chqdate'];
$advwords = $_POST['adv_words'];

$sql1 = mysqli_query($link,"update addexpenses set bill_date='$paid_date',expense='$expenses', paid_to='$paidto', mobile_no='$mobno', amount='$amt', towards='$towards',pay_type='$pmode',bname='$bname',chq_no='$chqno',chq_date='$chqdate',account_no='$acno',amt_words='$advwords' where id=$id") or die(mysqli_error($link));
if($sql1)
{

	print "<script>";
	print "alert('Successfully updated');";
	print "self.location='direct_expenses.php';";
	print "</script>";
	}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='edit_direct.php?id=$id';";
	print "</script>";
}
}
?>