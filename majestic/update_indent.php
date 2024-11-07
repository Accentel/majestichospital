<?php
ob_start();
include("config.php");

if(isset($_POST['submit'])){



$user =$_POST['user'];
$fdate = date('Y-m-d',strtotime($_POST['fdate']));
$tdate = $_POST['tdate'];
$pname = $_POST['pname'];
$id5=$_POST['id5'];
//	$ctype = $_POST['ctype'];

$mrno=$_POST['mrno'];
$r=mysql_query("update drugindent set mrno='$mrno',pname='$pname',fdate='$fdate',tdate='$tdate',user='$user',status='$status'  where  id='$id5'");
$id=mysql_insert_id();
$rows = $_POST['rows'];
if($rows > 0){

for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
$id4 = $_POST['id2'][$i];
if($id4 != "" and $tname!=""){
	echo $r="update drugindent1 set name='$tname', qty='$cost', did='$id5' where id1='$id4'";
$sql1 = mysql_query($r);
}else{
	if($tname!=''){
	$sql1 = mysql_query("insert into drugindent1(name, qty, did) values('$tname','$cost','$id5')");
	}
	}

}

if($sql1)
{

	/*print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_lab_bill.php';";
	print "</script>";*/
	header("Location:drugindent_view.php");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	//print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='edit_drugindent.php?id=$id5';";
	print "</script>";
	}
}
}	
?>