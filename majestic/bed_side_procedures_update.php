<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$bsp=$_REQUEST['count11'];

            


$qrye=mysql_query("select count(*) from casesheet_bedsideproc where pat_no='$patno'");

while($row = mysql_fetch_array($qrye))
{
$bsp_y=$row[0];
}
			
$bsp_qry4=mysql_query("delete from casesheet_doctorvists where pat_no='$patno'");
for($bsp_i=1;$bsp_i<=$bsp;$bsp_i++)
{
$name=$_REQUEST['name'.$bsp_i];
$startdatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['startdatetime'.$bsp_i]));
$enddatetime=date('Y-m-d h:i:s',strtotime($_REQUEST['enddatetime'.$bsp_i]));
$qty=$_REQUEST['qty'.$bsp_i];

$bsp_qry=mysql_query("select id from icu_equipment_mast where name='$name'");        
while($row1 = mysql_fetch_array($bsp_qry))
{
$bsp_up=$row1[0];
}

if($bsp_y==0)
{
$bsp_qr1=mysql_query("insert into casesheet_bedsideproc(pat_no, reg_no, equip_id, StartDateTime, EndDateTime, Qty, currentdate, auth_by) values('$patno','$regno','$bsp_up','$startdatetime','$enddatetime','$qty',now(),'$admin')");

}
						
else{

 $bsp_qr1=mysql_query("insert into casesheet_bedsideproc(pat_no, reg_no, equip_id, StartDateTime, EndDateTime, Qty, currentdate, auth_by) values('$patno','$regno','$bsp_up','$startdatetime','$enddatetime','$qty',now(),'$admin')");

}

}




		if($bsp_qr1){
	        header("Location:casesheet.php?a=1");
                 }
		else{out.println("fail");
         header("Location:casesheet.php?a=2");
            }
			
?>