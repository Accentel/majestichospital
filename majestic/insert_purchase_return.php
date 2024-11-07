i<?php
include("config.php");

$supcode=$_REQUEST['supcode'];
$ret=$_REQUEST['retno'];
$ptype=$_REQUEST['ptype'];
$invno=$_REQUEST['invno'];
$invdt=date('Y-m-d',strtotime($_REQUEST['invdate']));
$recdt=date('Y-m-d',strtotime($_REQUEST['recdate']));
$admin = $_REQUEST['authby'];
$total=round($_REQUEST['disctot']);
$paid=round($_REQUEST['return']);
$bal=$total-$paid;
$x=0;
$j=0;
$z=0;
$l=0;
$sno=0;
$sql = mysqli_query($link,"select max(LR_NO+0) from phr_pur_returns_mast")or die(mysqli_error($link));
if($sql)
{
	while($row = mysqli_fetch_array($sql))
	{
		$sno=$row[0];
	}
}	
	$sno=$sno+1;
$result = mysqli_query($link,"select LR_NO from phr_purinv_mast where suppl_inv_no='$invno'")or die(mysqli_error($link));
if($result)
{
	$res = mysqli_fetch_array($result);
	$lrno=$res[0];
}

$qry=mysqli_query($link,"insert into phr_pur_returns_mast values($sno,'$ret','$supcode','$ptype','$invno','$invdt','$recdt','$total',now(),'$admin')")or die(mysqli_error($link));
if($qry)
{
	 $count = $_REQUEST['rows'];
	
	for($i=1;$i<=$count;$i++)
		{

		$pcode=$_REQUEST['pname'.$i];
		$batch=$_REQUEST['bno'.$i];
		$manfby=$_REQUEST['manfby'.$i];
		$rqty=$_REQUEST['rqty'.$i];
		$rrate=$_REQUEST['rrate'.$i];
		$amt=$_REQUEST['amt'.$i];
		$inv=$_REQUEST['inv_id'.$i];
		$vatamt=$_REQUEST['vatamt'.$i];
		$m="select * from phr_purinv_dtl where LR_NO='$lrno' and PRODUCT_NAME='$pcode' and BATCH_NO='$batch'";
		$sql8=mysqli_query($link,$m) or die(mysqli_error($link));
		$rs=mysqli_fetch_array($sql8);
		$bal=$rs['balance_qty'];
		$tb=$bal-$rqty;
		 $ph="update phr_purinv_dtl set balance_qty='$tb' where LR_NO='$lrno' and PRODUCT_NAME='$pcode' and BATCH_NO='$batch'";
		mysqli_query($link,$ph) or die(mysqli_error($link));
		
	 $p="insert into phr_pur_returns_dtl(LR_NO, PRODUCT_CODE, BATCH_NO, R_QTY, R_RATE, Total, CURRENTDATE, AUTH_BY, inv_id ,manf_by) values($sno,'$pcode','$batch','$rqty','$rrate','$amt',now(),'$admin','$inv','$manfby')";
		$sql1=mysqli_query($link,$p) or die(mysqli_error($link));


				
		}//for
}
if($sql1)
{
	print "<script>";
	print "alert('successfully added');";
	print "self.location='purchase_return_list.php'";
	print "</script>";
}	


?>