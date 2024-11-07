<?php
include("config.php");

$tname=$_REQUEST['tname'];
$prdname=$_REQUEST['prdname'];
$prdcode=$_REQUEST['prdcode'];
$unit=$_REQUEST['unit'];
$vtax=$_REQUEST['vtax'];
$packing=$_REQUEST['packing'];
$authby=$_REQUEST['authby'];
$maniby=$_REQUEST['maniby'];
$hsn=$_REQUEST['hsn'];
$sgst=$_REQUEST['sgst'];
$cgst=$_REQUEST['cgst'];

	
	
	$sql = mysqli_query($link,"select * from phr_prddetails_mast where prd_name = '$prdname'")or die(mysqli_error($link));
	if($sql)
	{
		$rows = mysqli_num_rows($sql);
	}	
	if($rows <= 0){
		$vsql=mysqli_query($link,"insert into phr_prddetails_mast(prd_code,type,prd_name,unit_code,currentdate,auth_by,vattax,pack_code,mani_by,hsn,`sgst`,`cgst`)
		 values('$prdcode','$tname','$prdname','$unit',now(),'$authby','$vtax','$packing','$maniby','$hsn','$sgst','$cgst')")or die(mysqli_error($link));
		if($vsql)
		{
			print "<script>";
			print "alert('Successfully added ');";
			print "self.location='product_details_list.php';";
			print "</script>";
		}else{
			print "<script>";
			print "alert('unable to add ');";
			print "self.location='product_details_list.php';";
			print "</script>";
		}	
	}
	else
	{
		print "<script>";
		print "alert('Product name already exists');";
		print "self.location='add_product_details.php';";
		print "</script>";
	}

?>