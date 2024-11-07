<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$cv=$_REQUEST['count'];


					
$qrye=mysql_query("select count(*) from casesheet_doctorvists where pat_no='$patno'");
           	
while($row = mysql_fetch_array($qrye))
{
$cv_y=$row[0];
}

$cv_qry4=mysql_query("delete from casesheet_doctorvists where pat_no='$patno'");
          
for($cv_i=1;$cv_i<=$cv;$cv_i++)
{
$visitdatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['visitdatetime'.$cv_i]));
$docname=$_REQUEST['docname'.$cv_i];
$visittype=$_REQUEST['visittype'.$cv_i];

if($cv_y==0)
{
$cv_qr2=mysql_query("select OUT_CONSNO from outside_consultants where ANAE_DOCNAME='$docname'"); 

while($row2 = mysql_fetch_array($cv_qr2))
{
$docname1=$row2[0];

$cv_qr1=mysql_query("insert into casesheet_doctorvists(pat_no, Doc_CODE, VisitDatetime, pat_regno, CURRENTDATE, AUTH_BY, visit_type) values('$patno','$docname1','$visitdatetime','$regno',now(),'$admin','$visittype')");

}
}
					
else{

$cv_qr2=mysql_query("select OUT_CONSNO from outside_consultants where ANAE_DOCNAME='$docname'"); 

while($row2 = mysql_fetch_array($cv_qr2))
{
$docname1=$row2[0];

$cv_qr1=mysql_query("insert into casesheet_doctorvists(pat_no, Doc_CODE, VisitDatetime, pat_regno, CURRENTDATE, AUTH_BY, visit_type) values('$patno','$docname1','$visitdatetime','$regno',now(),'$admin','$visittype')");

}

}
}

if($cv_qr1){
header("Location:casesheet.php?a=1");
}
else{
header("Location:casesheet.php?a=2");
}
			
?>