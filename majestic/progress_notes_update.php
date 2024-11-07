<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$pn=$_REQUEST['count1'];




$pn_abc=$_REQUEST['pn_abc'];

			
$qrye=mysql_query("select count(*) from casesheet_progressnotes where pat_no='$patno'");

while($row = mysql_fetch_array($qrye))
{
$pn_y=$row[0];
}

$pn_qry4=mysql_query("delete from casesheet_progressnotes where pat_no='$patno'");
for($pn_i=1;$pn_i<=$pn;$pn_i++)
{
$prdatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['prdatetime'.$pn_i]));
$processnotes=$_REQUEST['processnotes'.$pn_i];
$treatment=$_REQUEST['treatment'.$pn_i];
if($pn_y==0)
{

 $pn_qr1=mysql_query("insert into casesheet_progressnotes(pat_no, PrgDateTime, Progress_Notes, Treatment, pat_regno, CURRENTDATE, AUTH_BY) values('$patno','$prdatetime','$processnotes','$treatment','$regno',now(),'$admin')");

}
						
else{

 $pn_qr1=mysql_query("insert into casesheet_progressnotes(pat_no, PrgDateTime, Progress_Notes, Treatment, pat_regno, CURRENTDATE, AUTH_BY) values('$patno','$prdatetime','$processnotes','$treatment','$regno',now(),'$admin')");

}
}




		if($pn_qr1){
		if($pn_abc==2){
		header("Location:casesheet.php?a=6&patno=$patno");
		}else{
		
		header("Location:casesheet.php?a=1");
		}
                 }
		else{
	header("Location:casesheet.php?a=2");
            }
			
?>