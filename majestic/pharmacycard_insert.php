<?php
include('config.php');
if(isset($_POST['submit'])){
	
	$mrno=$_POST['mrno'];
	
	 $rows=count($_POST['date']);
	for($i=0;$i<$rows;$i++)
{

$date = $_POST['date'][$i];
$time = $_POST['time'][$i];
$type = $_POST['type'][$i];
$name = $_POST['name'][$i];
$qty = $_POST['qty'][$i];
$dose = $_POST['dose'][$i];
$ivim = $_POST['ivim'][$i];
$morning = $_POST['morning'][$i];
$sign = $_POST['sign'][$i];
$afternoon = $_POST['afternoon'][$i];
$sign1 = $_POST['sign1'][$i];
$evening = $_POST['evening'][$i];
$sign2 = $_POST['sign2'][$i];
$signature = $_POST['signature'][$i];
$id2 = $_POST['id2'][$i];

if($id2 != ""){
$sql1=mysql_query("update  pharmacycard set mrno='$mrno', date='$date', time='$time',type='$type',name='$name',qty='$qty', dose='$dose', ivim='$ivim',morning='$morning',sign='$sign',afternoon='afternoon',sign1='$sign1',evening='$evening',sign2='$sign2',signature='$signature' where id='$id2' ");


}else{
	if($date!=''){
		$sql1=mysql_query("insert  into pharmacycard(mrno,date,time,type,name,dose,ivim,morning,sign,afternoon,sign1,evening,sign2,signature,qty) values('$mrno','$date','$time','$type','$name','$dose','$ivim','$morning','$sign','$afternoon','$sign1','$evening','$sign2','$signature','$qty')");

		
		}
	
	}

}
//exit;
 


if($sql1)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='add_iplist.php';";
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
	print "self.location='add_iplist.php';";
	print "</script>";
	}



}
?>