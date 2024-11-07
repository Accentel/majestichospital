<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];
				
				 
				
$vs=$_REQUEST['count4'];	 
$vts_abc=$_REQUEST['vts_abc'];

			
$qrye=mysql_query("select count(*) from casesheet_vitalsigns where pat_no='$patno'");
 
while($row = mysql_fetch_array($qrye))
{
	$y=$row[0];
}
$qry2=mysql_query("delete from casesheet_vitalsigns where pat_no='$patno'");

for($i=1;$i<=$vs;$i++)
  {
	$datetime=date('Y-m-d h:i:s',strtotime($_REQUEST['datetime'.$i]));
	$bp=$_REQUEST['bp'.$i];
	$pluse=$_REQUEST['pluse'.$i];
	$resp=$_REQUEST['resp'.$i];
	$fhs=$_REQUEST['fhs'.$i];

	$sss=$bp;
 
   $splitPattern = "/";
	$result = explode($splitPattern,$sss);

if($y==0)
{
	
              
$qry1=mysql_query("insert into casesheet_vitalsigns(pat_no,vitaldate,bphigh,bplow,pulse,resp,fhs,pat_regno,currentdate,auth_by) values('$patno','$datetime','$result[0]','$result[1]','$pluse','$resp','$fhs','$regno',now(),'$admin')");

}
else{

$qry1=mysql_query("insert into casesheet_vitalsigns(pat_no,vitaldate,bphigh,bplow,pulse,resp,fhs,pat_regno,currentdate,auth_by) values('$patno','$datetime','$result[0]','$result[1]','$pluse','$resp','$fhs','$regno',now(),'$admin')");


}
}
 
	if($qry1){
        
		if($vts_abc==2)
        {
		header("Location:casesheet.php?a=7&patno=$patno");
		}else{
		
		header("Location:casesheet.php?a=1");
		}
       }

		else{
		header("Location:casesheet.php?a=2");
            }
			
?>