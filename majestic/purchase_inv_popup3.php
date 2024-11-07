<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];

$query = mysql_query($link,"select SUPPL_NAME,ADDR1,CITY,tamt,paid,bal from phr_supplier_mast  where suppl_code='$emp_id' ")or die(mysqli_error($link));
if($query)
{
$row = mysql_fetch_array($query);
$supname=$row[0];
$addr=$row[1];
$city=$row[2];
$tot=$row['tamt'];
$paid=$row['paid'];
$bal=$row['bal'];

}
$data = ":".$emp_id.":".$supname.":".$addr.":".$city.":".$tot.":".$paid.":".$bal;
	echo $data;
?>