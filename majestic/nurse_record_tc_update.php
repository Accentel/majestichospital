<?php		 
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$nrt=$_REQUEST['count5'];


$nrt_abc=$_REQUEST['nrt_abc'];



$qrye=mysql_query("select count(*) from casesheet_nursesrecord where pat_no='$patno'");

while($row = mysql_fetch_array($qrye))
{
$nrt_y=$row[0];
}

if($nrt_y==0)
{

for($nrt_i=1;$nrt_i<=$nrt;$nrt_i++)
{
$ndatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['ndatetime'.$nrt_i]));
$itemcode=$_REQUEST['itemcode'.$nrt_i];
$dose=$_REQUEST['dose'.$nrt_i];
$route=$_REQUEST['route'.$nrt_i];
$frequency=$_REQUEST['frequency'.$nrt_i];
$specialproc=$_REQUEST['specialproc'.$nrt_i];
$remarks=$_REQUEST['remarks'.$nrt_i];
$invid=$_REQUEST['batch'.$nrt_i];
		
$nrt_qryy7=mysql_query("select product_code from phr_purinv_dtl where product_name='$itemcode'");

while($row1 = mysql_fetch_array($nrt_qryy7))
{
   $nrt_prdcode11=$row1[0];
}
$nrt_qr1=mysql_query("insert into casesheet_nursesrecord(pat_no, Date_Time, INVG_ITEM_CODE, dose, route, Frequency, Special_Proc, Remarks, pat_regno, CURRENTDATE, AUTH_BY, inv_id) values('$patno','$ndatetime','$nrt_prdcode11','$dose','$route','$frequency','$specialproc','$remarks','$regno',now(),'$admin','$invid')");
}

}
else if($nrt_y==$nrt)
{
$nrt_abc=3;

}
else{

for($j=$nrt_y;$j<$nrt;$j++)
{
$ndatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['ndatetime'.$j]));
$itemcode=$_REQUEST['itemcode'.$j];
$dose=$_REQUEST['dose'.$j];
$route=$_REQUEST['route'.$j];
$frequency=$_REQUEST['frequency'.$j];
$specialproc=$_REQUEST['specialproc'.$j];
$remarks=$_REQUEST['remarks'.$j];
$invid=$_REQUEST['batch'.$j];
$nrt_qryy7=mysql_query("select product_code from phr_purinv_dtl where product_name='$itemcode'");

while($row1 = mysql_fetch_array($nrt_qryy7))
{
   $nrt_prdcode11=$row1[0];
}
$nrt_qr1=mysql_query("insert into casesheet_nursesrecord(pat_no, Date_Time, INVG_ITEM_CODE, dose, route, Frequency, Special_Proc, Remarks, pat_regno, CURRENTDATE, AUTH_BY, inv_id) values('$patno','$ndatetime','$nrt_prdcode11','$dose','$route','$frequency','$specialproc','$remarks','$regno',now(),'$admin','$invid')");


}
}
if($nrt_abc==3){
header("Location:casesheet.php?a=11&patno=$patno");
}
else if($nrt_x!=0 ){
if($nrt_abc==2){
header("Location:casesheet.php?a=9&patno=$patno");
}
else{

header("Location:casesheet.php?a=1");
}
}
else{
header("Location:casesheet.php?a=2");
}
			
?>