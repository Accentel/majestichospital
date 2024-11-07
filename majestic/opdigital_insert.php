<?php
include('config.php');
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$mrno=$_POST['mrno'];
	$date=$_POST['date'];
	$pd=$_POST['pd'];
	$fd=$_POST['fd'];
	$ch=$_POST['ch'];
	$pulse=$_POST['pulse'];
	$repository=$_POST['repository'];
	$heart=$_POST['heart'];
	$lungs=$_POST['lungs'];
	$pa=$_POST['pa'];
	$bp=$_POST['bp'];
	$temperature=$_POST['temperature'];
	$cns=$_POST['cns'];
	$localexamination=$_POST['localexamination'];
	$suggestions=$_POST['suggestions'];
	
	 $iname = $_FILES['image']['name'];
			 
			 if($iname!= ""){
				// echo "hi";
				 
	$code = md5(rand());
	 $iname =$code. $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	 $dir = "upload";
		    echo   $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $iname1 =$code. $_FILES['image']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$iname1 = mysql_real_escape_string($iname1);
	}else{
	 $iname1 = mysql_real_escape_string($image1);
	}
	
	$reviewdate1=$_POST['reviewdate'];
	
	$reviewdate=date('Y-m-d',strtotime($reviewdate1));
	
	
	
	 $query1="update opdigitalform set provisionaldiagnostics='$pd',finaldiagnostics='$fd',clinicalhistory='$ch',pulserate='$pulse',repositoryrate='$repository',heart='$heart',lungs='$lungs',pa='$pa',cns='$cns',localeximination='$localexamination',advices='$suggestions',bp='$bp',temperature='$temperature',image='$iname1',reviewdate='$reviewdate' where id='$id'";
	
	$query=mysql_query($query1) or die(mysql_error());
	//$id2=mysql_insert_id();
	 $rows=count($_POST['tname']);
	for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
//$cost = $_POST['cost'][$i];
if($tname != ""){
$sql1=mysql_query("insert into opdigitallab(mrno, tname, date1,id2) values('$mrno','$tname','$date','$id')");


}

}
//exit;
 $rows1=count($_POST['pname']);
	for($i=0;$i<$rows1;$i++)
{
$pname = $_POST['pname'][$i];
$mtype = $_POST['mtype'][$i];
$dtime = $_POST['dtime'][$i];
$dadmin = $_POST['dadmin'][$i];
$Days = $_POST['Days'][$i];
$generic = $_POST['generic'][$i];
$indication = $_POST['indication'][$i];
$qty = $_POST['qty'][$i];
if($pname != ""){
	 $rs="insert into opdigitalmedical(mrno, mname,mtype,dosagetime,drugadmin,days,qty,date1,indication,generic,id2) values('$mrno','$pname','$mtype','$dtime','$dadmin','$Days','$qty','$date','$indication','$generic','$id')";
$sql2=mysql_query($rs) or die(mysql_error());


}

}


if($sql2)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='opdigital_reg.php';";
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
	print "self.location='add_opdigitalform.php';";
	print "</script>";
	}



}
?>