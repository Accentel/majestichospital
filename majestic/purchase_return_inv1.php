<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];

$query = mysqli_query($link,"select inv_date,rec_date,pur_type from phr_purinv_mast where suppl_inv_no='$emp_id'")or die(mysqli_error($link));
if($query)
{
$row = mysqli_fetch_array($query);

$idate=date('d-m-Y',strtotime($row['inv_date']));
$rdate=date('d-m-Y',strtotime($row['rec_date']));
$pur=$row['pur_type'];

}
if($pur == "C")
	{ $pur="Cash"; }
if($pur == "B")
	{ $pur="Bank"; }
if($pur == "CR")
	{ $pur="Credit Card"; }

$data = $idate."@".$rdate."@".$pur;	
echo $data;
?>