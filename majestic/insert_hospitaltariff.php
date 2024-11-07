<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
$rows = $_POST['rows'];
if($rows > 0){
for($i=0;$i<$rows;$i++)
{
$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
$sql1 = mysqli_query($link,"insert into tariff(`name`,`amnt`,`final`) values('$tname','$cost','')")or die(mysqli_error($link));
}
}
if($sql1)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='uom_list1.php';";
	print "</script>";
	//header("Location:opbill_rec2.php?bno=$bno");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	//print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='opbill.php';";
	print "</script>";
	}
}
}	
?>