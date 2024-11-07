<?php
include("config.php");
//print_r($_REQUEST);exit;
$admin = $_REQUEST['authby'];
 $custm_type=$_REQUEST['custm_type'];
 $mob=$_REQUEST['mob'];
 $spl_dis=$_REQUEST['o_dis'];
 $grand=$_REQUEST['grand'];
 $amount1=$_REQUEST['amount1'];
echo $stype=$_REQUEST['stype']; 
if($stype=='C'){
$ptype='Cash';	
}else {
	$ptype='Card';
	
}
if($custm_type=='p1'){
	 $custname=$_REQUEST['custname4'];
	 $mrnum=$_REQUEST['custname4'];
 $age=$_REQUEST['agek'];
$sex=$_REQUEST['sexk'];
$consultantname=$_REQUEST['consultant_namek'];
$concessiontype=$_REQUEST['cconcessiontype'];
$cardno=$_REQUEST['ccardno'];
$concessiontype="";
$btype=$_REQUEST['btype'];
  //exit;
$custname3=$_REQUEST['custname3'];
	
}
else if($custm_type == "c"){
 $custname=$_REQUEST['custname1'];
$age=$_REQUEST['cage'];
$sex=$_REQUEST['csex'];
$consultantname=$_REQUEST['cconsultant_name'];
$concessiontype=$_REQUEST['concessiontype'];
$cardno=$_REQUEST['cardno'];
}else if($custm_type == "p"){
  $custname=$_REQUEST['custname3'];
  $a=mysqli_query($link,"SELECT * FROM ip_pat_admit  where PAT_NO='$custname'") or die(mysqli_error($link));
  while($r=mysqli_fetch_array($a)){
	  $mrnum=$r['PAT_REGNO'];
  }
 $age=$_REQUEST['age'];
 $sex=$_REQUEST['sex1'];
$consultantname=$_REQUEST['consultant_name1'];
$concessiontype=$_REQUEST['cconcessiontype'];
$cardno=$_REQUEST['ccardno'];
} 
$saledate=date('Y-m-d',strtotime($_REQUEST['saledate']));
//$total=$_REQUEST['nettotal'];
$total=$_REQUEST['grand'];
 $bal=$_REQUEST['amount1'];
   $amt=$_REQUEST['amount'];
   
   
$disc=$_REQUEST['disc'];
if($disc==null || $disc==""){$disc="0";}
$card=$_REQUEST['card'];
$bill=$_REQUEST['bill'];
if($bill==null)
{
  $bill="N";
}

if($card==null)
{
  $card="0";
}
if($custm_type=='p1'){
	//$custm_type='p';
	}

$sql = mysqli_query($link,"select max(LR_NO+0) from phr_salent_mast ")or die(mysqli_error($link));

if($sql)
{
	$row = mysqli_fetch_array($sql);
	$lrno=$row[0];
}
$lrno=$lrno+1;

$custname1=$_REQUEST['custname1'];
$ckrk1=$_POST['ckrk1'];
$ckrk=$_POST['ckrk'];

if($custname1!=''){
	$pname1=$custname1;
}else if($ckrk1!=''){
	$pname1=$ckrk1;
}  else if($ckrk!=''){
$pname1=$ckrk;}


  $dt=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount1 where date(date_time)='$dt'")or die(mysqli_error($link));
$bcnt=mysqli_num_rows($sq);
//$cnt=$bcnt+1;
$cnt1=$bcnt+1;
  $cnt=date('dmy')."-".$cnt1; 

 if($amt>=1){
 
 
   $x="insert into phr_salent_mast
 values($lrno,'$btype','$custname','$lrno','$stype','$saledate','$total',now(),'$admin' ,'$bill','$custm_type',$card,'$age','$sex','$consultantname','$disc','$concessiontype','','','$mrnum','$spl_dis','$amount1','$cnt','') ";

$q1=mysqli_query($link,$x)or die(mysqli_error($link));


 } else {
	 
  $x="insert into phr_salent_mast
 values($lrno,'$btype','$custname','$lrno','$stype','$saledate','$total',now(),'$admin' ,'$bill','$custm_type',$card,'$age','$sex','$consultantname','$disc','$concessiontype','','','$mrnum','$spl_dis','$amount1','','') ";

$q1=mysqli_query($link,$x)or die(mysqli_error($link));	 
 }
 
  date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ());
 $aa="insert into daily_amount1(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc,doct_name,name)
 values('$custm_type','$amt','$cnt','$mrnum','$admin','$ptype','$ndate','Pharmacy','$consultantname','$pname1')";
	
$qq=mysqli_query($link,$aa)or die(mysqli_error($link));

if($q1){
 $count = $_REQUEST['rows'];
//echo $count;
for($m=1;$m <= $count;$m++)
{
//echo $count;
//echo $m;
$pcode=$_REQUEST['pcode'.$m];
$pname=$_REQUEST['pname'.$m];

$bachno=$_REQUEST['bachno'.$m];

//$exp=$_REQUEST['exp'+$m];
$uqty=$_REQUEST['sqty'.$m];
$invno=$_REQUEST['bachno'.$m];
$urate=$_REQUEST['ucost'.$m];
$value=$_REQUEST['value'.$m];
$dis=$_REQUEST['dis'.$m];
 $amt=$_REQUEST['amt'.$m];  
 
 $gst=$_REQUEST['gst'.$m]; 
$gst_amt=$_REQUEST['vat'.$m];
$HSN=$_REQUEST['HSN'.$m];
//echo $pcode;
//echo $mfg;
//echo $exp;
//echo $uqty;
//echo $invno;
//echo $urate;
//echo $value;
//echo $dis;
//echo $amt;


 $xx="insert into phr_salent_dtl(LR_NO, PRODUCT_CODE, U_QTY, U_RATE, VALUE, CURRENT, AUTH_BY, inv_id,disc,total,`gst`,gst_amt,HSN) 
values($lrno,'$pcode','$uqty','$urate','$value',now(),'$admin','$invno','$dis','$amt','$gst','$gst_amt','$HSN')" or die(mysqli_error($link)) ;


$q2=mysqli_query($link,$xx)or die(mysqli_error($link));


//$ss=mysqli_query($link,"insert into sales_print(lr_no,prd_name,batch_no,qty,price,Amount,sgst,cgst,HSN)values('$lrno','$pname','$bachno','$uqty','$urate','$value','$amt','$gst_amt','$gst_amt,'$HSN')");


if($q2){
$q7=mysqli_query($link,"update phr_purinv_dtl set balance_qty=balance_qty-'$uqty' where inv_id='$invno'")or die(mysqli_error($link));
}
}
if($q7){
if((!(stype == "E") && ($bill == "N"))){

$tot_amt=$total;
$amount=$_REQUEST['amount'];

$due=mysqli_query($link,"insert into due_patients (lr_no, total_amount, paid_amount, currentdate, auth_by) values($lrno,$tot_amt,$amount,now(),'$admin')")or die(mysqli_error($link));
if($due){
	$mast = mysqli_query($link,"select id from due_patients where lr_no = $lrno")or die(mysqli_error($link));
	if($mast){
		$res = mysqli_fetch_array($mast);
		$mast_id = $res[0];
	}	
	$i1=mysqli_query($link,"insert into due_patients_dtl(mast_id, pay_amt, pay_date, auth_by) values($mast_id,$amount,now(),'$admin')")or die(mysqli_error($link));
	


	
	if($i1){
		print "<script>";
		print "alert('Successfully added');";
		print "self.location='salesentry_list.php';";
		print "</script>";
	}
}

}else{
	print "<script>";
	print "alert('Successfully added');";
	print "self.location='salesentry_list.php';";
	print "</script>";
}

}

}
?>



