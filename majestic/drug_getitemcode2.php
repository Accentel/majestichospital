<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];
$cc="select PRD_NAME,mani_by,vattax,sgst,cgst,HSN from phr_prddetails_mast  where PRD_NAME='$emp_id' ";
$query =  mysqli_query($link,$cc) or die(mysqli_error($link));
if($query)
{
	$row = mysqli_fetch_array($query);
	$PRD_NAME=$row[0];
	$mani_by=$row[1];
	$vattax=$row[2];
	$sgst=$row['sgst'];
	$cgst=$row[4];
	$HSN=$row[5];
}	

$data = ":".$PRD_NAME.":".$mani_by.":".$vattax.":".$sgst.":".$cgst.":".$HSN.":";
	echo $data;

?>