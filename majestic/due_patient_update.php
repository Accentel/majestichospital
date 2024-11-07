<?php
session_start();

if($_SESSION['name1'])
{
$authby = $_SESSION['name1'];

include("config.php");

$pat_no=$_REQUEST['pat_no'];
$bill=$_REQUEST['bill'];
 

$qry=mysqli_query($link,"update due_patients set paid_amount=(paid_amount+$bill),currentdate=now(),auth_by='$authby' where id='$pat_no'")or die(mysqli_error($link));
if($qry){
$i1=mysqli_query($link,"insert into due_patients_dtl(mast_id, pay_amt, pay_date, auth_by) values($pat_no,$bill,now(),'$authby')")or die(mysqli_error($link));
if($i1){
		print "<script>";
		print "alert('Successfully paid');";
		print "self.location='duecustomer.php';";
		print "</script>";
}
}
}
else
{

session_destroy();

session_unset();

header('Location:login.php');

}

?>
?>