<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];
$br=$_REQUEST['count7'];
$vr=$_REQUEST['count8'];





$pn_qry41=mysql_query("delete from casesheet_vaccinationdetails where pat_no='$patno' ");

$pn_qry4=mysql_query("delete from casesheet_babybirthrecord where pat_no='$patno'");


$qrye=mysql_query("select count(*) from casesheet_babybirthrecord where pat_no='$patno'");
while($row = mysql_fetch_array($qrye))
{
$pn_y=$row[0];
}
			
$qrye1=mysql_query("select count(*) from casesheet_vaccinationdetails where pat_no='$patno'");

while($row1=mysql_fetch_array($qrye1))
{
$pn_y1=$row1[0];
}
for($l=1;$l<=$br;$l++)
{

$bdatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['bdatetime'.$l]));
$sex=$_REQUEST['sex'.$l];
$weight=$_REQUEST['weight'.$l];
$dobdt=$_REQUEST['dobdt'.$l];
if($pn_y==0)
{
$pn_qr1=mysql_query("insert into casesheet_babybirthrecord(PAT_No, Birth_Date, Sex, Weight, pat_regno, CURRENTDATE, AUTH_BY) values('$patno','$bdatetime','$sex','$weight','$regno',now(),'$admin')");
}		
}
	
for($m=1;$m<=$vr;$m++)
{
$vDate=date('Y-m-d',strtotime($_REQUEST['vDate'.$m]));
$Vaccination=$_REQUEST['Vaccination'.$m];
if($pn_y1==0)	
{
			
$vqry=mysql_query("select id from casesheet_babybirthrecord where PAT_No='$patno'");

while($row3 = mysql_fetch_array($vqry))
{
    $baby_id=$row3[0];
}
$pn_qr2=mysql_query("insert into casesheet_vaccinationdetails(baby_id,pat_no, Vac_Name, Vac_Date, pat_regno, CURRENTDATE, AUTH_BY) values('$baby_id','$patno','$Vaccination','$vDate','$regno',now(),'$admin')");


  	 }		
   }

		if($pn_qr1 && $pn_qr2){
		header("Location:casesheet.php?a=1");
                 }
		else{out.println("fail");
      header("Location:casesheet.php?a=2");
            }
			
?>