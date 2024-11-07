<?php
ob_start();
include("config.php");

if(isset($_POST['submit'])){



$user =$_POST['user'];
$fdate = date('Y-m-d',strtotime($_POST['fdate']));
$tdate = $_POST['tdate'];
$pname = $_POST['pname'];

	$status = $_POST['status'];

$mrno=$_POST['mrno'];
$r=mysqli_query($link,"insert into drugindent(mrno,pname,fdate,tdate,user,status) values ('$mrno','$pname','$fdate','$tdate','$user','$status')")or die(mysqli_error($link));
$id=mysqli_insert_id();
$rows = $_POST['rows'];
if($rows > 0){

for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
$sql1 = mysqli_query($link,"insert into drugindent1(name, qty, did) values('$tname','$cost','$id')")or die(mysqli_error($link));
}

}

if($sql1)
{

	/*print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_lab_bill.php';";
	print "</script>";*/
	header("Location:drugindent_print.php?id=$id");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	//print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='add_drugindent.php';";
	print "</script>";
	}
}
}	
?>