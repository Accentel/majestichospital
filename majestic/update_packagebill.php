<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
$rows = $_POST['rows'];
if($rows > 0){
$bno =$_POST['bno'];
$mno =$_POST['mno'];
$user =$_POST['user'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname = $_POST['pname'];
//$pref = $_POST['pref'];
$pname2 = $pref." ".$pname1;
//$suf = $_POST['suf'];
$age =$_POST['age'];
$age2 = $age1." ".$suf;
$gender = $_POST['gender'];
$dname = $_POST['dname'];
$total =$_POST['tot'];
$disc = $_POST['conamt'];
$namt = $_POST['price'];
$paid =$_POST['paid'];
$bal = $_POST['bal'];
$id2 = $_POST['id2'];
$ptype = $_POST['ptype'];
$remarks=$_POST['remarks'];
$time=$_POST['time'];
$mrno=$_POST['mrno'];
//mysql_query("insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')");
//mysql_query("insert into ulogin(uname,pass) values ('$bno','$mno')");

//echo $q="insert into bill1(BillNO,PatientName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,user) values('$bno','$pname','$total','$disc','$namt','$paid','$bal')";
 $q="update  packagebill set  BillNO='$bno', BillDate='$bdate', PatientName='$pname', Age='$age', Sex='$gender', DoctorName='$dname',Total='$total',Discount='$disc',NetAmount='$namt',PaidAmount='$paid',BalanceAmount='$bal',conce_type='$ctype',ptype='$ptype',remarks='$remarks',user='$user',phoneno='$mno',mrno='$mrno',time='$time'  where id='$id2'";
mysqli_query($link,$q) or die(mysqli_error($link));

for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
$id=$_POST['id'][$i];
if($id != "" and $tname!=''){
$sql1 = mysqli_query($link,"update  packagebill1 set BillNO='$bno', BillDate='$bdate',purpose='$tname',Amount='$cost', mrno='$mrno' where id='$id'");
}else{
	if($tname!=''){
	$sql1 = mysqli_query($link,"insert into packagebill1(BillNO, BillDate,purpose,Amount, mrno) values('$bno','$bdate','$tname','$cost','$mrno')");
	}
	}

}

if($sql1)
{

	/*print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_lab_bill.php';";
	print "</script>";*/
	header("Location:opbill_rec2.php?bno=$bno");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	//print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='packagebill.php';";
	print "</script>";
	}
}
}	
?>