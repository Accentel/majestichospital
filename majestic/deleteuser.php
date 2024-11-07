<?php
include("config.php");

$id=$_GET['q'];
if($id!=''){
$pq=" DELETE   FROM hr_user WHERE emp_id='$id' ";
mysqli_query($link,$pq) or die(mysqli_error($link));
echo $pq1=" DELETE   FROM login  WHERE ename='$id' ";
$sq=mysqli_query($link,$pq1) or die(mysqli_error($link));

if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='userview.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='userview.php';";
	print "</script>";
}      


}else{

print "<script>";
	print "alert('unable to delete');";
	print "self.location='userview.php';";
	print "</script>";

}                   
?>