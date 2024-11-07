<?php
ob_start();
include("config.php");

if(isset($_POST['submit'])){
$rnum=$_POST['rnum'];
$rows = $_POST['rows'];
if($rows > 0){

for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
$sql1 = mysql_query("insert into casesheet_sugarchart(pat_regno, sugardate, blood_sugar, AUTH_BY)
 values('$rnum','$tname','$cost','admin')");
}

}

if($sql1)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='int_det6.php';";
	print "</script>";
	//header("Location:bill_rec2.php?bno=$bno");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	//print "
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='add_sug.php';";
	print "</script>";
	}
}
}	
?>