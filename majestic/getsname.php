<?php
include("config.php");
$emp_id = $_REQUEST['pname'];
$btype = $_REQUEST['btype1'];
if($btype == "mrp")
{
	$query =  mysqli_query($link,"select balance_qty,mfg_date,exp_date,mrp,s_qty,noitems,vat,HSN from phr_purinv_dtl where inv_id='$emp_id' ");
}
$sqty = 1;
if($query){
while($row = mysqli_fetch_array($query)){
//$vat=$row[];
//$product_code=$row[0];
$balance=$row['balance_qty'];
$mfg_date=date('d-m-Y',strtotime($row['mfg_date']));
$exp_date=date('d-m-Y',strtotime($row['exp_date']));
 $unitcost=$row['mrp'];
$sqty=$row['s_qty'];
$vat=$row['vat'];
$HSN=$row['HSN'];
//$vat1=0;
 $nitem=$row[6];
}
}
$sqty=($sqty*$nitem);
 $eachcost=($unitcost/$nitem);
//$eachcost=round(($eachcost*100.0)/100.0);

$data = ":".$balance.":".$mfg_date.":".$exp_date.":".$unitcost .":".$vat.":".$vat.":".$HSN;
echo $data;
?>