<?php
include('config.php');
if(isset($_POST['submit'])){
	
	$mrno=$_POST['mrno'];
	
	 $rows=count($_POST['date']);
	for($i=0;$i<$rows;$i++)
{

$date = $_POST['date'][$i];
$nursenote = $_POST['nursenote'][$i];
$signature = $_POST['signature'][$i];
$id2 = $_POST['id2'][$i];

if($id2 != ""){
$sql1=mysql_query("update  nursenote set mrno='$mrno', date1='$date', norsenote='$nursenote',signature='$signature' where id='$id2' ");


}else{
	if($date!=''){
		$sql1=mysql_query("insert  into nursenote(mrno,date1,norsenote,signature) values('$mrno','$date','$nursenote','$signature')");

		
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