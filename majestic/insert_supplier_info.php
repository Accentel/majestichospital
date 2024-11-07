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
	//$aggrdate=date('Y-m-d',strtotime($_REQUEST['aggrdate']));
	$cstno=$_REQUEST['cstno'];
	$gstno=$_REQUEST['gstno'];
	$exno=$_REQUEST['exno'];
	$remarks=$_REQUEST['remarks'];
	$phar="Pharmacy";
	$aggrdate=$_POST['aggrdate'];
	$fsno=$_POST['fsno'];
		
    $vsql=mysqli_query($link,"insert into phr_supplier_mast(suppl_code,suppl_name,type,addr1,city,state,country,pincode,area,phone1,fax1,email,contact_person,phone2,catgory,agr_no,agr_date,cst_reg_no,apgst_no,status,ecc_no,remarks,`fsno`) values('$supcode','$supname','$suptype','$addr','$city','$state','$country','$pincode','$area','$pno1','$fax','$email','$conperson','$pno2','$phar','$aggrno','$aggrdate','$cstno','$gstno','Y','$exno','$remarks','$fsno')")or die(mysqli_error($link));
	if($vsql)
	{
		print "<script>";
		print "alert('Successfully added ');";
		print "self.location='supplier_info_list.php';";
		print "</script>";
	}	


?>