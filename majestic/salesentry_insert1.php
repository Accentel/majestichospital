<?php
include("config.php");
$admin = $_REQUEST['authby'];
$lrno = $_REQUEST['lrno'];
$total = $_REQUEST['grand'];
$disc = $_REQUEST['disc'];
$amount1=$_REQUEST['amount1'];
 $sr_bill_num=$_REQUEST['sr_bill_num'];
 

$sql2=mysqli_query($link,"select u_qty,inv_id FROM phr_salent_dtl WHERE lr_no='$lrno'") or die(mysqli_error($link));
while($row2 = mysqli_fetch_array($sql2)){
	$uqty = $row2[0];
	$invid = $row2[1];
	$sql3=mysqli_query($link,"update phr_purinv_dtl set balance_qty=balance_qty+$uqty WHERE inv_id='$invid'") or die(mysqli_error($link));
}
$sql1=mysqli_query($link,"DELETE FROM phr_salent_dtl WHERE lr_no='$lrno'") or die(mysqli_error($link));
if($sql1){						
	$q1=mysqli_query($link,"update phr_salent_mast set total='$total',discount='$disc',bal='$amount1' where lr_no=$lrno ")or die(mysqli_error($link));
	$a="update daily_amount1 set amount='$total' where bill_num='$sr_bill_num'";

$sq11=mysqli_query($link,$a)or die(mysqli_error($link));
}



if($q1){
$i = $_REQUEST['i'];
$count = $_REQUEST['rows'];
//echo $count;
for($m=1;$m <= $count;$m++)
{
//echo $count;
//echo $m;
$pcode=$_REQUEST['pcode'.$m];
//$mfg=$_REQUEST['mfg'+$m];
//$exp=$_REQUEST['exp'+$m];
$uqty=$_REQUEST['sqty'.$m];
$invno=$_REQUEST['bachno'.$m];
$urate=$_REQUEST['ucost'.$m];
$value=$_REQUEST['value'.$m];
$dis=$_REQUEST['dis'.$m];
$amt=$_REQUEST['amt'.$m];
$HSN=$_REQUEST['HSN'.$m];

	$q2=mysqli_query($link,"insert into phr_salent_dtl(LR_NO, PRODUCT_CODE, U_QTY, U_RATE, VALUE, CURRENT, AUTH_BY, inv_id,disc,total,HSN) values($lrno,'$pcode','$uqty','$urate','$value',now(),'$admin','$invno','$dis','$amt','$HSN')") or die(mysqli_error($link));

if($q2){
	$q7=mysqli_query($link,"update phr_purinv_dtl set balance_qty=balance_qty-'$uqty' where inv_id='$invno'") or die(mysqli_error($link));

}
}
if($q7){

		print "<script>";
		print "alert('Successfully updated');";
		print "self.location='salesentry_list.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to update');";
		print "self.location='salesentry_view.php';";
		print "</script>";
}	

}
?>