<?php
include("config.php");

	$supname=$_REQUEST['supname'];
	$supcode=$_REQUEST['supcode'];
	$suptype=$_REQUEST['suptype'];
	$pno1=$_REQUEST['pno1'];
	$conperson=$_REQUEST['conperson'];
	$pno2=$_REQUEST['pno2'];
	$area=$_REQUEST['area'];
	$city=$_REQUEST['city'];
	$state=$_REQUEST['state'];
	$country=$_REQUEST['country'];
	$pincode=$_REQUEST['pincode'];
	$fax=$_REQUEST['fax'];
	$addr=$_REQUEST['addr'];
	$email=$_REQUEST['email'];
	$aggrno=$_REQUEST['aggrno'];
	$aggrdate=date('Y-m-d',strtotime($_REQUEST['aggrdate']));
	$cstno=$_REQUEST['cstno'];
	$gstno=$_REQUEST['gstno'];
	$exno=$_REQUEST['exno'];
	$remarks=$_REQUEST['remarks'];
	$fsno=$_REQUEST['fsno'];
	$aggrdate=$_POST['aggrdate'];
	//$phar="Pharmacy";
		
    $vsql=mysqli_query($link,"update phr_supplier_mast  set suppl_name='$supname',type='$suptype',addr1='$addr',city='$city',state='$state',country='$country',pincode='$pincode',area='$area',phone1='$pno1',fax1='$fax',email='$email',contact_person='$conperson',phone2='$pno2',agr_no='$aggrno',agr_date='$aggrdate',cst_reg_no='$cstno',apgst_no='$gstno',ecc_no='$exno',remarks='$remarks',`fsno`='$fsno' where suppl_code='$supcode'")or die(mysqli_error($link));
	if($vsql)
	{
		print "<script>";
		print "alert('Successfully updated ');";
		print "self.location='supplier_info_list.php';";
		print "</script>";
	}	
?>