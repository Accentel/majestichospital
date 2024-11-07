<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$BIRTH_CER=$_REQUEST['BIRTH_CER'];

$wife=$_REQUEST['wife'];
$motaddress=$_REQUEST['motaddress'];
$po=$_REQUEST['po'];
$ps=$_REQUEST['ps'];
$Dist=$_REQUEST['Dist'];
$weight=$_REQUEST['weight'];
$delby=$_REQUEST['delby'];
$sex=$_REQUEST['sex'];
$BirthDate=date('Y-m-d h:i:s',strtotime($_REQUEST['BirthDate']));
$rs=mysql_query("select id from casesheet_birth_certificate where pat_no='$patno'");
		
if($rs){
$row = mysql_fetch_array($rs);
$count = $row[0];
}
		
$rs1=mysql_query("select max(id) from casesheet_birth_certificate");
$id=0;
while($row1 = mysql_fetch_array($rs1))
{
$id=$row1[0];
}
$id=$id+1;
		if($count==0)
		{
		$qry=mysql_query("insert into casesheet_birth_certificate(id,wife_of,po,ps,dist,del_by,sex,birth_date,pat_no,pat_regno,cur_date,auth_by,weight) values('$id','$wife','$po','$ps','$Dist','$delby','$sex','$BirthDate','$patno','$regno',now(),'$admin','$weight')");
		}
		else
		{
		$qry=mysql_query("update casesheet_birth_certificate set wife_of='$wife',po='$po',ps='$ps',dist='$Dist',del_by='$delby',sex='$sex',birth_date=str_to_date('$BirthDate','%d-%m-%Y %H:%i:%S'),pat_no='$patno',pat_regno='$regno',cur_date=now(),auth_by='$admin',weight='$weight' where id=$count");
		}
		
		if($qry){
		if($BIRTH_CER==2){
		header("Location:casesheet.php?a=12&patno=$patno");
		}else{
		
		header("Location:casesheet.php?a=1");
		}
		
		}
		else
		{
		
			header("Location:casesheet.php?a=2");

		}
			
?>