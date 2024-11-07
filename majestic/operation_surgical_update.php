<?php
session_start();
include("config.php");

$patno=$_SESSION['patno'];
$regno=$_SESSION['regno'];
$admin = $_SESSION['name1'];

$pod=$_REQUEST['pod'];
$post_od=$_REQUEST['post_od'];
$pd=$_REQUEST['pd'];
$ot=$_REQUEST['ot'];
$sur_na=$_REQUEST['sur_na'];
$ncs=$_REQUEST['ncs'];
$na=$_REQUEST['na'];	
$na1=$_REQUEST['na1'];
$na2=$_REQUEST['na2'];
$na3=$_REQUEST['na3'];
$na4=$_REQUEST['na4'];
$op_dt=date('Y-m-d H:i:s',strtotime($_REQUEST['op_dt']));
$sttime=$_REQUEST['sttime'];
$sttime1=$_REQUEST['stime1'];
$endtime=$_REQUEST['endtime'];
$endtime1=$_REQUEST['etime1'];

$sur_notes=$_REQUEST['sur_notes'];
$op_find=$_REQUEST['op_find'];
$an_notes=$_REQUEST['an_notes'];	
$ot_cost=$_REQUEST['ot_cost'];
$img=$_REQUEST['abc1'];

if($sttime == "24"){$sttime="00";}
 if($endtime == "24"){$endtime="00";}
$sttime=$sttime.":";

$sttime1=$sttime.$sttime1;
$endtime=$endtime.":";

$endtime1=$endtime.$endtime1;
			 
				
$vs=$_REQUEST['count12'];
			 


			
$sss=mysql_query("select * from casesheet_surgerydetails where pat_no='$patno'");
	
while($row = mysql_fetch_array($sss))
{
$cc=$row[0];
}
				
					
if($cc==0)
{	

$qqq=mysql_query("insert into casesheet_surgerydetails(pat_no, pre_operative, post_operative, procedure_done, THEATER_Id, SURGERY_Name, SURGeon_Name, Anesthesit_Name, Assistant_name1, Assistant_name2, Assistant_name3, Assistant_name4, Date, ST_TIME, ENd_TIME, Surgical_notes, operative_finding, anaesthesia_notes, REG_NO, AUTH_BY, CURRENTDATE,ot_cost) values('$patno','$pod','$post_od','$pd','$ot','$sur_na','$ncs','$na','$na1','$na2','$na3','$na4','$op_dt','$sttime1','$endtime1','$sur_notes','$op_find','$an_notes','$regno','$admin',now(),'$ot_cost')");

}
else
{

$qqq=mysql_query("update casesheet_surgerydetails set pre_operative='$pod',post_operative='$post_od',procedure_done='$pd',theater_id=$ot,surgery_name='$sur_na',surgeon_name='$ncs',anesthesit_name='$na',Assistant_name1='$na1',Assistant_name2='$na2',Assistant_name3='$na3',Assistant_name4='$na4',date='$op_dt',st_time='$sttime1',end_time='$endtime1',surgical_notes='$sur_notes',operative_finding='$op_find',anaesthesia_notes='$an_notes',ot_cost='$ot_cost'  where pat_no='$patno'");

}
					
$lll=mysql_query("select id from casesheet_surgerydetails where pat_no='$patno'");

while($row1 = mysql_fetch_array($lll)){
 $mast_id=$row1[0];
 }
$qrye=mysql_query("select count(*) from casesheet_surgerydetails_dtl where mast_id='$mast_id'");
 
while($row2 = mysql_fetch_array($qrye))
{
$y=$row2[0];

}
						

if($y==0)
{
for($i=1;$i<=$vs;$i++)
{
$datetime=date('Y-m-d H:i:s',strtotime($_REQUEST['datetime'.$i]));
$mediname=$_REQUEST['mediname'.$i];
$avqty=$_REQUEST['avqty'.$i];
$usedqty=$_REQUEST['usedqty'.$i];
$invid=$_REQUEST['invid'.$i];
$prdcode=$_REQUEST['prdcode'.$i];				 
			                             
$qry1=mysql_query("insert into casesheet_surgerydetails_dtl(mast_id,prd_code,qty,auth_by,currentdate,inv_id) values('$mast_id','$prdcode','$usedqty','$admin',now(),'$invid')");

$q7=mysql_query("update phr_purinv_dtl set balance_qty=(balance_qty-$usedqty) where inv_id='$invid'");
 
}
}
else{

for($j=$y;$j<$vs;$j++)
{
$datetime=date('Y-m-d H:i:s',strtotime($_REQUEST['datetime'.$j]));
$mediname=$_REQUEST['mediname'.$j];
$avqty=$_REQUEST['avqty'.$j];
$usedqty=$_REQUEST['usedqty'.$j];
$invid=$_REQUEST['invid'.$j];
$prdcode=$_REQUEST['prdcode'.$j];	
$qry1=mysql_query("insert into casesheet_surgerydetails_dtl(mast_id,prd_code,qty,auth_by,currentdate,inv_id) values('$mast_id','$prdcode','$usedqty','$admin',now(),'$invid')");

$q7=mysql_query("update phr_purinv_dtl set balance_qty=(balance_qty-$usedqty) where inv_id='$invid'");
   
 }
}
 
		if($q7){
		if($img==2){
		header("Location:casesheet.php?a=4&patno=$patno");
		}else{
		
		header("Location:casesheet.php?a=1");
		}
                 }
		else{
			header("Location:casesheet.php?a=2");
            }
			
?>