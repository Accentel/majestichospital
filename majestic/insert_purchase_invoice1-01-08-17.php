<?php
include("config.php");
session_start();

$ses=$_SESSION['name1'];
if(isset($_POST['update'])){
	echo "hi";
$dept_code=0;
$provalue=0;
$admin=$_POST['authby'];
 $lrno=$_POST['lrno'];
echo $p1=$_POST['nitem'];
$rows=$_POST['rows'];
echo $stotal=$_POST['total'];
$disc=$_POST['disc'];
echo $vatadd=$_POST['vatadd'];
echo $nettot=$_POST['nettot'];
$total=round($_POST['gtot']);
$recby=$_POST['recby'];


echo $a="update phr_purinv_mast set total='$nettot',rec_by='$ses' where lr_no='$lrno'";
$qry=mysql_query($a);
if($qry)
{
	$count = $_POST['rows'];
	$cnt = count($_POST['pname']);
$cnt2 = count($_POST['vatamt']);
if ($cnt > 0 && $cnt == $cnt2) {
    $insertArr = array();
    for ($i=0; $i<$cnt; $i++) {

		//$pcode=$_POST['pcode'][$i];
		$pname=$_POST['pname'][$i];
		$maniby=$_POST['maniby'][$i];
		$noi=$_POST['noi'][$i];
		//$packing=$_POST['packing'][$i];
		$batch=$_POST['batch'][$i];
		$mrp=$_POST['mrp'][$i];
		$mfgdt1=$_POST['mfgdate'][$i];
		$expdt1=$_POST['expdate'][$i];
		$mfgdt = date('Y-m-d',strtotime($mfgdt1));
		$expdt = date('Y-m-d',strtotime($expdt1));
		$sqty=$_POST['sqty'][$i];
		$sfree=$_POST['sfree'][$i];
		$srate=$_POST['srate'][$i];
		$value=$_POST['value'][$i];
		$vat=$_POST['vat'][$i];
		$vatamt=$_POST['vatamt'][$i];
$invid=$_POST['invid'][$i];

//$dsc=$_POST['dsc'][$i];
//$dscamt=$_POST['dscamt'][$i];
		$cst=0;
		$bal_qty=0;
		$bal_qty=$sqty+$sfree;
		//bal_qty=bal_qty+;
		$dis=$_POST['disc'];
$q=mysql_query("select * from phr_purinv_dtl where lr_no='$lrno'");
$p=mysql_fetch_array($q);
$inv_id=$p['inv_id'];
$lrno1=$p['lr_no'];
if($_POST['pname'][$i]!=""){
if(($inv_id=$invid)){
echo $pp="update  phr_purinv_dtl set   product_name='$pname',batch_no='$batch',mrp='$mrp',exp_date='$expdt',s_qty='$sqty',s_free='$sfree',s_rate='$srate',value='$value',vat='$vat',vat_amt='$vatamt',currentdate=now(),auth_by='$admin',mfg_date='$mfgdt',noitems='$noi',balance_qty='$bal_qty',manu_by='$maniby' where lr_no='$lrno' and inv_id='$invid' ";
$sql1=mysql_query($pp);

}else{
echo $mk="insert into phr_purinv_dtl(lr_no,product_name,batch_no,mrp,exp_date,s_qty,s_free,s_rate,value,vat,vat_amt,currentdate,auth_by,mfg_date,noitems,balance_qty,manu_by) values($lrno,'$pname','$batch','$mrp','$expdt','$sqty','$sfree','$srate','$value','$vat','$vatamt',now(),'$admin','$mfgdt','$noi','$bal_qty','$maniby')";
 $sql1=mysql_query($mk) or die(mysql_error());
}

}

		
	

				
		}//for
}exit;	
if($sql1)
{
	print "<script>";
	print "alert('successfully added');";
	print "self.location='purchase_invoice_list.php'";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to add');";
	print "self.location='purchase_invoice_list.php'";
	print "</script>";
	
}
}
}
?>