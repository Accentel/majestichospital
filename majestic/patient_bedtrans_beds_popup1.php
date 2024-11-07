<?php
include("config.php");
$emp_id = $_REQUEST['emp_id'];

$query = mysql_query("select a.BED_NO, a.ROOM_NO,ROOM_FEE from bed_details as a,room_tariff as b where a.ROOM_no= b.room_no and a.BED_NO='$emp_id' ");

while($row = mysql_fetch_array($query))
{
$bedno=$row[0];	
$roomno=$row[1];	
$roomrent=$row[2];		
}
$data =  ":".$bedno.":".$roomno;
echo $data;
?>

