<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$intake=$_REQUEST['count9'];
$output1=$_REQUEST['count10'];


$img=$_REQUEST['inabc'];


$qrye1=mysql_query("select count(*) from casesheet_intakedetails where pat_no='$patno'");
$qrye2=mysql_query("select count(*) from casesheet_outputdetails where pat_no='$patno'");

while($row1 = mysql_fetch_array($qrye1))
{
$iot_y=$row1[0];
}

while($row2 = mysql_fetch_array($qrye2))
{
$iot_y1=$row2[0];
}
$iot_qry4=mysql_query("delete from casesheet_intakedetails where pat_no='$patno'");

for($iot_i=1;$iot_i<=$intake;$iot_i++)
{
$intakedatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['intakedatetime'.$iot_i]));
$particulars=$_REQUEST['particulars'.$iot_i];
$idfluds=$_REQUEST['idfluds'.$iot_i];
$oral=$_REQUEST['oral'.$iot_i];

if($iot_y==0)
{
$iot_qr1_1=mysql_query("insert into casesheet_intakedetails(pat_no, date_time, Particulars, IVFluids, Oral, pat_regno, CURRENTDATE, AUTH_BY) values('$patno','$intakedatetime','$particulars','$idfluds','$oral','$regno',now(),'$admin')");

}					
else{

 $iot_qr1_1=mysql_query("insert into casesheet_intakedetails(pat_no, date_time, Particulars, IVFluids, Oral, pat_regno, CURRENTDATE, AUTH_BY) values('$patno','$intakedatetime','$particulars','$idfluds','$oral','$regno',now(),'$admin')");

}

}
$iot_qry41=mysql_query("delete from casesheet_outputdetails where pat_no='$patno'");
          

for($iot_i1=1;$iot_i1<=$output1 ;$iot_i1++)
{
$outpurdatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['outpurdatetime'.$iot_i1]));
$urine=$_REQUEST['urine'.$iot_i1];
$faces=$_REQUEST['faces'.$iot_i1];
$respitation=$_REQUEST['respitation'.$iot_i1];
$skin=$_REQUEST['skin'.$iot_i1];
if($iot_y1==0)
{

$iot_qr11_1=mysql_query("insert into casesheet_outputdetails(pat_no, Date_Time, URINE, FACES, RESPIRATION, SKIN, pat_regno, currentdate, AUTH_BY) values('$patno','$outpurdatetime','$urine','$faces','$respitation','$skin','$regno',now(),'$admin')");
 
}
						
else{

 $iot_qr11_1=mysql_query("insert into casesheet_outputdetails(pat_no, Date_Time, URINE, FACES, RESPIRATION, SKIN, pat_regno, currentdate, AUTH_BY) values('$patno','$outpurdatetime','$urine','$faces','$respitation','$skin','$regno',now(),'$admin')");
}

}




		if($iot_qr11_1 && $iot_qr1_1){
	  if($img==2){
		header("Location:casesheet.php?a=10&patno=$patno");
		}else{
		
		header("Location:casesheet.php?a=1");
		}
            }
		else{
      header("Location:casesheet.php?a=2");
          }
			
?>