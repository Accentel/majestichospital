<?php
   include("config.php");
	$id=$_GET['lr_id'];
	 $sq=mysqli_query($link,"select * from phr_salent_dtl where lr_no='$id'") or die(mysqli_error($link));
	 while($r=mysqli_fetch_array($sq)){
	 $inv_id=$r['inv_id'];
	$uqty=$r['U_QTY'];
	 $a="update phr_purinv_dtl set balance_qty=balance_qty+'$uqty' where inv_id='$inv_id'";
	 $q7=mysqli_query($link,$a)or die(mysqli_error($link));
	 }
	 //exit;
	  $b="update phr_salent_dtl set PRODUCT_CODE='',U_QTY='',U_RATE='',VALUE=''
,inv_id='',disc='',total='',gst='',gst_amt='' where lr_no='$id'";

$q71=mysqli_query($link,$b)or die(mysqli_error($link));
$q7=mysqli_query($link,"update phr_salent_mast set BILLING_TYPE='',CUST_NAME='',`INV_NO`='',
`SALES_TYPE`='',`SAL_DATE`='',`total`='',`current`='',`auth_by`='',`bill_type`='',`customer_type`='',
`card_no`='',`age`='',`sex`='',`Consultant_Name`='',`discount`='',`concession_type`='',
`mobileno`='',`address1`='',`mrnum`='',`spl_dis`='',`bal`='',`sr_bill_num`='',status='Delete'
 where lr_no='$id'") or die(mysqli_error($link));

	if($q7)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='salesentry_list.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='salesentry_list.php';";
		print "</script>";
	}
	
	
	
	
?>