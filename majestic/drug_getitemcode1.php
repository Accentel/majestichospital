<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];

$query =  mysql_query("select prd_code,prd_name,unit_name,vattax,mani_by from phr_prddetails_mast a,phr_unit_mast b where prd_code='$emp_id' and a.unit_code=b.unit_code");
if($query)
{
	$row = mysql_fetch_array($query);
	$supname=$row[0];
	$addr=$row[1];
	$city=$row[2];
	$vat=$row[3];
	$maniby=$row[4];
}	

$data = ":".$addr.":";
	echo $data;

?>