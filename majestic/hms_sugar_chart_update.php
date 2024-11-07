<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$pn=$_REQUEST['count6'];
$sc_abc=$_REQUEST['sc_abc'];

			
$qrye=mysql_query("select count(*) from casesheet_sugarchart where pat_no='$patno'");
while($row=mysql_fetch_array($qrye))
{
$pn_y=$row[0];
}

$pn_qry4=mysql_query("delete from casesheet_sugarchart where pat_no='$patno'");

for($pn_i=1;$pn_i<=$pn;$pn_i++)
{
$sugardate=date('Y-m-d h:i:s',strtotime($_REQUEST['sugardate'.$pn_i]));
$bsugar=$_REQUEST['bsugar'.$pn_i];
$usugar=$_REQUEST['usugar'.$pn_i];
if($pn_y==0)
{
$pn_qr1=mysql_query("insert into casesheet_sugarchart(pat_no, sugardate, blood_sugar, urin_sugar, pat_regno, CURRENTDATE, AUTH_BY) values('$patno','$sugardate','$bsugar','$usugar','$regno',now(),'$admin')");
}					
else{
 $pn_qr1=mysql_query("insert into casesheet_sugarchart(pat_no, sugardate, blood_sugar, urin_sugar, pat_regno, CURRENTDATE, AUTH_BY) values('$patno','$sugardate','$bsugar','$usugar','$regno',now(),'$admin')");

}
}
if($pn_qr1){
		if($sc_abc==2){
		header("Location:casesheet.php?a=8&patno=$patno");
		}else{
		
		header("Location:casesheet.php?a=1");
		}
                 }
		else{
         header("Location:casesheet.php?a=2");
            }
			
?>