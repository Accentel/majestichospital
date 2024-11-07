<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];
$ad_notes=$_REQUEST['ad_notes'];
if($ad_notes==""|| $ad_notes==null){$ad_notes="--";}

$dt=$_REQUEST['dt'];
if($dt==""|| $dt==null){$dt="--";}else{$dt=date('Y-m-d',strtotime($dt));}

$img=$_REQUEST['abc2'];
$qrye=mysql_query("select count(*) from casesheet_admissionnotes where pat_no='$patno'");
 
while($row = mysql_fetch_array($qrye))
{
$y=$row[0];
}
if($y==0)
{

$qry1=mysql_query("insert into casesheet_admissionnotes(pat_no,admnotesdatetime,admnotes,pat_regno,currentdate,auth_by) values('$patno','$dt','$ad_notes','$regno',now(),'$admin')");

}
					
else{
$qry1=mysql_query("Update  casesheet_admissionnotes set  admnotesdatetime='$dt',admnotes='$ad_notes' where pat_no='$patno'");

}



		if($qry1){
		if($img==2){
			header("Location:casesheet.php?a=5&patno=$patno");
		}else{
		
			header("Location:casesheet.php?a=1");
		}
        }
				
		else{

		header("Location:casesheet.jsp?a=2");
           }
		
?>