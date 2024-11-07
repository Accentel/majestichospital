<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

		 
$prdiag=$_REQUEST['prdiag'];
$fidiag=$_REQUEST['fidiag'];
$comp=$_REQUEST['comp'];
$oppro=$_REQUEST['oppro'];
$deptref=$_REQUEST['deptref'];
$death=$_REQUEST['death'];
$check=$_REQUEST['check'];

$ar_dt=date('Y-m-d h:i:s',strtotime($_REQUEST['ar_dt']));
if($prdiag==""|| $prdiag==null)
{
   $prdiag="--";
}
if($fidiag==""|| $fidiag==null)
{
   $fidiag="--";
}
if($comp==""|| $comp==null)
{
   $comp="--";
}
if($oppro==""|| $oppro==null)
{
   $oppro="--";
}
if($deptref==""|| $deptref==null)
{
   $deptref="--";
}
if($death==""|| $death==null)
{
   $death="--";
}
if($check==""|| $check==null)
{
   $check="No";
}

$discharge="--";


$qrye=mysql_query("select count(*) from casesheet_admissionrecord where pat_no='$patno'");
 
while($row = mysql_fetch_array($qrye))
{
	$y=$row[0];
}

if($y==0)
{
			
$qry1=mysql_query("insert into casesheet_admissionrecord(pat_no,ProvisionalDiag,FinalDiag,Complications,Operation_Procedure,DeptsRefTo, DischargeStatus,Death,Autopsy,AutopsyTime,pat_regno,currentdate,auth_by) values('$patno','$prdiag','$fidiag','$comp','$oppro','$deptref','$discharge','$death','$check','$ar_dt','$regno',now(),'$admin')");

}				
else{
$qry1=mysql_query("Update casesheet_admissionrecord set ProvisionalDiag='$prdiag',FinalDiag='$fidiag',Complications='$comp',Operation_Procedure='$oppro',DeptsRefTo='$deptref',DischargeStatus='$discharge',Death='$death',Autopsy='$check',AutopsyTime='$ar_dt' where pat_no='$patno'");

}

if($qry1){
	header("Location:casesheet.php?a=2");
}
else{
	header("Location:casesheet.jsp?a=2");
}
		
?>