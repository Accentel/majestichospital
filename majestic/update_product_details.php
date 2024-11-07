<?php
include("config.php");

$id=$_REQUEST['id'];
$prdname=$_REQUEST['prdname'];
$typename=$_REQUEST['typename'];
//$unit=$_REQUEST['unit'];
$vtax=$_REQUEST['vtax'];
//$packing=$_REQUEST['packing'];
$authby=$_REQUEST['authby'];
$maniby=$_REQUEST['maniby'];
$hsn=$_REQUEST['hsn'];
$sgst=$_REQUEST['sgst'];
$cgst=$_REQUEST['cgst'];	
	

		$vsql=mysqli_query($link,"update phr_prddetails_mast set prd_name='$prdname',type='$typename',vattax='$vtax',mani_by='$maniby',hsn='$hsn',
		`sgst`='$sgst',`cgst`='$cgst' where id='$id' ")or die(mysqli_error($link));
		if($vsql)
		{
			print "<script>";
			print "alert('Successfully updated ');";
			print "self.location='product_details_list.php';";
			print "</script>";
		}else{
			print "<script>";
			print "alert('unable to update ');";
			print "self.location='product_details_list.php';";
			print "</script>";
		}	
	

?>