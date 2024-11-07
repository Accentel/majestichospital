<?php
include("config.php");
if(isset($_POST['submit'])){
	//print_r($_POST);
$dept_code=0;
$provalue=0;

 $supcode=$_REQUEST['supcode'];
$grn=$_REQUEST['grnno'];
$ptype=$_REQUEST['ptype'];
$invno=$_REQUEST['invno'];
$invdt=date('Y-m-d', strtotime($_REQUEST['invdate']));
$recdt=date('Y-m-d', strtotime($_REQUEST['recdate']));
$recby=$_REQUEST['recby'];
$total=round($_REQUEST['gtot']);
$admin = $_REQUEST['authby'];
$bankname=$_REQUEST['bankname'];
$chequeno=$_REQUEST['chequeno'];
$paid=$_REQUEST['paid'];
$bal=$_REQUEST['bal']; 

$date3=date('Y-m-d',strtotime($_REQUEST['date3']));
$x=0;
$j=0;
$z=0;
$l=0;
$sno=0;
$sql = mysqli_query($link,"select max(LR_NO+0) from phr_purinv_mast") or die(mysqli_error($link));
if($sql)
{
	while($row = mysqli_fetch_array($sql))
	{
		$sno=$row[0];
	}
}	
	$sno=$sno+1;


$qry=mysqli_query($link,"insert into phr_purinv_mast values($sno,'$supcode','$ptype','$invno','$invdt',now(),'$admin','$recby','$total','$recdt','$grn','$bankname','$chequeno','$date3','$paid','$bal','0')") or die(mysqli_error($link));
if($qry)
{
	$count = $_REQUEST['nitem'];
	
	for($i=1;$i<=$count;$i++)
		{

		$pcode=$_REQUEST['pcode'.$i];
		$pname=$_REQUEST['pname'.$i];
		$maniby=$_REQUEST['maniby'.$i];
		$HSN=$_REQUEST['PRODUCT_CODE'.$i];
		$noi=$_REQUEST['noi'.$i];
		$packing=$_REQUEST['packing'.$i];
		$batch=$_REQUEST['bno'.$i];
		$mrp=$_REQUEST['mrp'.$i];
		//$mfgdt1=$_REQUEST['mfg'.$i];
		//$expdt1=$_REQUEST['exp'.$i];
		//$mfgdt = date('Y-m-d',strtotime($mfgdt1));
		//$expdt = date('Y-m-d',strtotime($expdt1));
		$HSN=$_REQUEST['HSN'.$i];
		
		//$mfgdt2=$_REQUEST['mfg'.$i];
		 $expdt2=$_REQUEST['exp'.$i]; 
		 $m="30-";
		 //$mfgdt1= $m."".$mfgdt2; 
		  $expdt1= $m."".$expdt2; 

		  $mfgdt = date('Y-m-d');
		 $expdt = date('Y-m-d',strtotime($expdt1));
		
		
		
		$sqty=$_REQUEST['sqty'.$i];
		$sfree=$_REQUEST['sfree'.$i];
		$srate=$_REQUEST['srate'.$i];
		$value=$_REQUEST['value'.$i];
		$amt=$_REQUEST['amt'.$i];
		$dis=$_REQUEST['dis'.$i];
		$vat=$_REQUEST['vat'.$i];
		$vatamt=$_REQUEST['vamt'.$i];
		$sgst=$_REQUEST['sst'.$i];
$cgst=$_REQUEST['cst'.$i];
		$tp=$sqty+$sfree;
		$cst=0;
		$bal_qty=0;
		$bal_qty=($sqty+$sfree);
		//bal_qty=bal_qty+;
		//$dis=$_REQUEST['disc'];
 $ss="select PRODUCT_NAME,PRODUCT_CODE,S_QTY,BATCH_NO from phr_purinv_dtl where PRODUCT_NAME='$pname' and BATCH_NO='$batch'";
$qry=mysqli_query($link,$ss) or die(mysqli_error($link));
$re=mysqli_fetch_array($qry);
  //$PRODUCT_CODE=$re['PRODUCT_CODE'];
 $PRODUCT_NAME=$re['PRODUCT_NAME'];
 $PRODUCT_CODE=$re['PRODUCT_CODE'];
 $S_QTY1=$re['S_QTY'];
 $BATCH_NO=$re['BATCH_NO'];
 $tq=$S_QTY1+$tp;
 if($PRODUCT_NAME=="")

{

mysqli_query($link,"insert into stock(PRODUCT_NAME,HSN,BATCH_NO,T_QTY) values('$pname','$HSN','$batch','$tp')") or die(mysqli_error($link));
		
		 $as="insert into phr_purinv_dtl(lr_no,product_name,product_code,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,currentdate,auth_by,mfg_date,noitems,cost,balance_qty,manu_by,sgst,cgst,amt,HSN)
	values($sno,'$pname','$pcode','$packing','$batch','$mrp','$expdt','$sqty','$sfree','$srate','$dis','$amt','$vat','$vatam',
	now(),'$admin','$mfgdt','$noi','$cst','$bal_qty','$maniby','$sgst','$cgst','$value','$HSN')";
		$sql1=mysqli_query($link,$as) or die(mysqli_error($link));
		
		
		
}else{
mysqli_query($link,"update  stock set T_QTY='$tq' where PRODUCT_NAME='$pname' and BATCH_NO='$batch'") or die(mysqli_error($link));
		$sql1=mysqli_query($link,"insert into phr_purinv_dtl(lr_no,product_name,product_code,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,currentdate,auth_by,mfg_date,noitems,cost,balance_qty,manu_by,amt,HSN) 
values($sno,'$pname','$pcode','$packing','$batch','$mrp','$expdt','$sqty','$sfree','$srate','$dis','$amt','$vat','$vatamt',now(),
'$admin','$mfgdt','$noi','$cst','$bal_qty','$maniby','$value','$HSN')") or die(mysqli_error($link));
}
				
		}//for
}



$ee=mysqli_query($link,"select * from `phr_supplier_mast` where SUPPL_CODE='$supcode'") or die(mysqli_error($link));
while($r=mysqli_fetch_array($ee)){
	
	 $t=$r['tamt'];
	$p=$r['paid'];
	$b=$r['bal'];
	
} $total1=$t+$total;
 $paid1=$p+$paid;
 $bal1=$b+$bal;
 $d=date('Y-m-d');
 $e1=mysqli_query($link,"update `phr_supplier_mast` set tamt='$total1',paid='$paid1',bal='$bal1' where SUPPL_CODE='$supcode'" ) or die(mysqli_error($link));
 $cck=mysqli_query($link,"insert into `sup_amount`(sup_code,tamt,paid,bal,date1,status1,LR_NO)values('$supcode','$total','$paid','$bal','$d','2','$sno')") or die(mysqli_error($link));
			
if($sql1)
{
	print "<script>";
	print "alert('successfully added');";
	print "self.location='purchase_invoice_list.php'";
	print "</script>";
}	

}
?>