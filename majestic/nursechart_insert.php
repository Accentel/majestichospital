<?php
include('config.php');
if(isset($_POST['submit'])){
	
	$mrno=$_POST['mrno'];
	
	 $rows=count($_POST['date']);
	for($i=0;$i<$rows;$i++)
{

$date = $_POST['date'][$i];
$dose = $_POST['dose'][$i];
$frequency = $_POST['frequency'][$i];
$morning = $_POST['morning'][$i];
$afternoon = $_POST['afternoon'][$i];
$evening = $_POST['evening'][$i];
$sign = $_POST['sign'][$i];
$id2 = $_POST['id2'][$i];

if($id2 != ""){
$sql1=mysql_query("update  nursechart set mrno='$mrno', date1='$date', dose='$dose',frequency='$frequency',morning='$morning', afternoon='$afternoon', evening='$evening',sign='$sign' where id='$id2' ");


}else{
	if($date!=''){
		$sql1=mysql_query("insert  into nursechart(mrno,date1,dose,frequency,morning,afternoon,evening,sign) values('$mrno','$date','$dose','$frequency','$morning','$afternoon','$evening','$sign')");

		
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