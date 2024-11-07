<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$history_ds=$_REQUEST['history_ds'];
$cf=$_REQUEST['cf'];
$ch=$_REQUEST['ch'];
$ta=$_REQUEST['ta'];
$ra=$_REQUEST['Review'];
$tc=$_REQUEST['treating'];
$tg=$_REQUEST['tg'];
$img=$_REQUEST['abc'];
if($history_ds==""|| $history_ds==null)
{
$history_ds="--";
}
if($cf==""|| $cf==null)
{
$cf="--";
}
if($ch==""|| $ch==null)
{
$ch="--";
}
if($ta==""|| $ta==null)
{
$ta="--";
}
if($ra==""|| $ra==null)
{
$ra="--";
}
if($tc==""|| $tc==null)
{
$tc="--";
}

$qrye=mysql_query("select count(*) from casesheet_dischargesummay where pat_no='$patno'");


while($row = mysql_fetch_array($qrye))
{
$y=$row[0];
}

if($y==0)
{

$qry1=mysql_query("insert into casesheet_dischargesummay(pat_no, history, clinical_findings, course_hospital, treatment_advice, pat_regno, currentdate, auth_by, review, tc,treat_given) values('$patno','$history_ds','$cf','$ch','$ta','$regno',now(),'$admin','$ra','$tc','$tg')");

}
					
else{
 
$qry1=mysql_query("update casesheet_dischargesummay set pat_no='$patno',history='$history_ds',clinical_findings='$cf',course_hospital='$ch',treatment_advice='$ta',pat_regno='$regno',currentdate=now(),auth_by='$admin',review='$ra',tc ='$tc',treat_given='$tg' where pat_no='$patno'");

}

if($qry1){
if($img==2){
header("Location:casesheet.php?a=3&patno=$patno");
}else{

header("Location:casesheet.php?a=1");
}
	 }
else{
header("Location:casesheet.php?a=2");
}
			
?>