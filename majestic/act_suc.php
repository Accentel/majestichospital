<?php 
include("config.php");
		if(isset($_POST['submit'])){
	
			$date1=date('Y-m-d');
	$mrnum=$_POST['mrnum'];
	$txtmsrtime=$_POST['txtmsrtime'];
	$txtmendtime=$_POST['txtmendtime'];
	$txtmsrtime1=$_POST['txtmsrtime1'];
	$txtmendtime1=$_POST['txtmendtime1'];
	$txtmsrtime2=$_POST['txtmsrtime2'];
	$txtmendtime2=$_POST['txtmendtime2'];
	$txtmsrtime3=$_POST['txtmsrtime3'];
	$txtmendtime3=$_POST['txtmendtime3'];
	$txtmsrtime4=$_POST['txtmsrtime4'];
	$txtmendtime4=$_POST['txtmendtime4'];
	$txtmsrtime5=$_POST['txtmsrtime5'];
	$txtmendtime5=$_POST['txtmendtime5'];
	$txtmsrtime6=$_POST['txtmsrtime6'];
	$txtmendtime6=$_POST['txtmendtime6'];
	$txtmsrtime7=$_POST['txtmsrtime7'];
	$txtmendtime7=$_POST['txtmendtime7'];
	$txtadmindt1=$_POST['txtadmindt1'];
	$txtdr1name=$_POST['txtdr1name'];
	$txtdr2name=$_POST['txtdr2name'];
	$txtadmindt2=$_POST['txtadmindt2'];
	$txtdr3name=$_POST['txtdr3name'];
	$txtadmindt3=$_POST['txtadmindt3'];
	$txtcasua=$_POST['txtcasua'];
	$txtadminicu=$_POST['txtadminicu'];
	$txtdiradmin=$_POST['txtdiradmin'];
	$txtmoitrcount=$_POST['txtmoitrcount'];
	$txtventicount=$_POST['txtventicount'];
	$txtpulsecount=$_POST['txtpulsecount'];
	$txtnebulizercount=$_POST['txtnebulizercount'];
	$txtsyringecount=$_POST['txtsyringecount'];
	$txtcpapcount=$_POST['txtcpapcount'];
	$txtoxygencount=$_POST['txtoxygencount'];
	$txtglucocount=$_POST['txtglucocount'];
	$moniter=$_POST['moniter'];
	$ventilator=$_POST['ventilator'];
	$pulse=$_POST['pulse'];
	$nebulizer=$_POST['nebulizer'];
	$syringe=$_POST['syringe'];
	$cpap=$_POST['cpap'];
	$oxygen=$_POST['oxygen'];
	$gluco=$_POST['gluco'];
	$rows = $_POST['rows'];
	$rows1 = $_POST['rows1'];


	
			
		//	$sql2=mysql_query("select * from `casesheet_activity` where mrnum='$mrnum'");
//echo $cnt=mysql_num_rows($sql2); 
//if($cnt<=1){
			
			   //$s="update `casesheet_activity` set `mrnum`='$mrnum', `txtmsrtime`='$txtmsrtime', `txtmendtime`='$txtmendtime',
			  //`txtmsrtime1`='$txtmsrtime1', `txtmendtime1`='$txtmendtime1', `txtmsrtime2`='$txtmsrtime2',
			  // `txtmendtime2`='$txtmendtime2', `txtmsrtime3`='$txtmsrtime3', `txtmendtime3`='$txtmendtime3',
			  // `txtmsrtime4`='$txtmsrtime4', `txtmendtime4`='$txtmendtime4', `txtmsrtime5`='$txtmsrtime5',
			  //  `txtmendtime5`='$txtmendtime5', `txtmsrtime6`='$txtmsrtime6', `txtmendtime6`='$txtmendtime6',
			   // `txtmsrtime7`='$txtmsrtime7', `txtmendtime7`='$txtmendtime7', `txtdr1name`='$txtdr1name',
				// `txtadmindt1`='$txtadmindt1', `txtdr2name`='$txtdr2name', `txtadmindt2`='$txtadmindt2',
				// `txtdr3name`='$txtdr3name', `txtadmindt3`='$txtadmindt3',`txtcasua`='$txtcasua',
				// `txtadminicu`='$txtadminicu',`txtdiradmin`='$txtdiradmin' where  `mrnum`='$mrnum'";
			 
//}
 //else {
	 
	    $s="INSERT INTO `casesheet_activity`( `mrnum`, `txtmsrtime`, `txtmendtime`,
			  `txtmsrtime1`, `txtmendtime1`, `txtmsrtime2`, `txtmendtime2`, `txtmsrtime3`, `txtmendtime3`,
			   `txtmsrtime4`, `txtmendtime4`, `txtmsrtime5`, `txtmendtime5`, `txtmsrtime6`, `txtmendtime6`,
			    `txtmsrtime7`, `txtmendtime7`, `txtdr1name`, `txtadmindt1`, `txtdr2name`, `txtadmindt2`,
				 `txtdr3name`, `txtadmindt3`,`txtcasua`,`txtadminicu`,`txtdiradmin`,`txtmoitrcount`, `txtventicount`, 
				 `txtpulsecount`, `txtnebulizercount`, `txtsyringecount`, `txtcpapcount`, `txtoxygencount`, `txtglucocount`,
				  `moniter`, `ventilator`, `pulse`, `nebulizer`, `syringe`, `cpap`, `oxygen`, `gluco`) 
			   VALUES ('$mrnum', '$txtmsrtime', '$txtmendtime', 
			   '$txtmsrtime1', '$txtmendtime1', '$txtmsrtime2', '$txtmendtime2',
			 '$txtmsrtime3', '$txtmendtime3', '$txtmsrtime4', '$txtmendtime4', '$txtmsrtime5', '$txtmendtime5', '$txtmsrtime6',
			  '$txtmendtime6', '$txtmsrtime7', 
			 '$txtmendtime7', '$txtdr1name','$txtadmindt1', '$txtdr2name', '$txtadmindt2', '$txtdr3name', '$txtadmindt3','$txtcasua',
			 '$txtadminicu','$txtdiradmin',
			 
			 '$txtmoitrcount', '$txtventicount', '$txtpulsecount', '$txtnebulizercount', '$txtsyringecount', 
			 '$txtcpapcount', '$txtoxygencount', '$txtglucocount', '$moniter', '$ventilator', '$pulse', '$nebulizer',
			  '$syringe', '$cpap', '$oxygen', '$gluco')"; 
	 
	 
 //}

		$sq=mysql_query($s); 
		$di=mysql_insert_id();
		if($rows > 0){

for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
	 $f="insert into casesheet_activity1(pat_regno, sugardate, blood_sugar, AUTH_BY,id1)
 values('$mrnum','$tname','$cost','admin','$di')";
$sql1 = mysql_query($f);
}
}
}
		
		
	if($rows1 > 0){

for($j=0;$j<$rows1;$j++)
{

$tname1 = $_POST['tname1'][$j];
$cost1 = $_POST['cost1'][$j];
if($tname1 != ""){
	echo $s="insert into gluco_list1(mr_num, date1, qty,id1)
 values('$mrnum','$tname1','$cost1','$di')";
$sql1 = mysql_query($s);
}
}
}	
		
		
		//update patientregister set arrival_mode='$mode',ref_from='$ref',previous='$Previous' where registerno='$mr_num'");
		
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='add_sug.php?krb=$mrnum';";
	print "</script>";
		}
		
		
		}
		?>