<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];

$query = mysqli_query($link,"select suppl_name,addr1,city from phr_supplier_mast where suppl_code='$emp_id'")or die(mysqli_error($link));
if($query)
{
$row = mysqli_fetch_array($query);
$supname=$row[0];
$addr=$row[1];
$city=$row[2];

}
$data = ":".$emp_id.":".$supname.":".$addr.":".$city;
	echo $data;
?>