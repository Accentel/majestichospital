<?php
include("config.php");
$admin = $_REQUEST['authby'];
$btype=$_REQUEST['btype'];
$custname=$_REQUEST['custname'];
$cust_type=$_REQUEST['cust_type'];
$pat_no=$_REQUEST['pat_no'];
if($cust_type == "p"){$custname=$pat_no;}
$stype=$_REQUEST['stype1'];
$invno=$_REQUEST['invno'];
$saledate=$_REQUEST['saledate'];
$total=$_REQUEST['rtotal'];
$fin_flag=$_REQUEST['fin_flag'];

$rtotal=$_REQUEST['rtotal'];
$sq=mysqli_query($link,"select * from  phr_salent_mast where INV_NO='$invno'") or die(mysqli_error($link));
$r1=mysqli_fetch_array($sq);
$CUST_NAME=$r1['CUST_NAME'];
$sr_bill_num=$r1['sr_bill_num'];
$sq1=mysqli_query($link,"select * from patientregister where registerno='$CUST_NAME'") or die(mysqli_error($link));
$r2=mysqli_fetch_array($sq1);
$patientname=$r2['patientname'];
if($patientname!=''){
$cname=$patientname;}
else{
	$cname=$CUST_NAME;
}

$rs=mysqli_query($link,"select max(LR_NO+0) from phr_salreturn_mast ") or die(mysqli_error($link));
while($rw = mysqli_fetch_array($rs))
{
	$lrno=$rw[0];
}
$lrno=$lrno+1;

$dt=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount2 where date(date1)='$dt'") or die(mysqli_error($link));
$bcnt=mysqli_num_rows($sq);
$cnt=$bcnt+1;
 if($rtotal>=1){



$q1=mysqli_query($link,"insert into phr_salreturn_mast values($lrno,'$btype','$custname','$invno','$stype',now(),now(),'$admin','$total',0,'$cnt') ") or die(mysqli_error($link));

$aa=mysqli_query($link,"insert into daily_amount2(amnt_type,amount,bill_num,mrnum,recv_by,name,sal_bil_num)values('$stype','$rtotal','$cnt','$custname','$admin','$cname','$sr_bill_num')") or die(mysqli_error($link));
 } else{
	$q1=mysqli_query($link,"insert into phr_salreturn_mast values($lrno,'$btype','$custname','$invno','$stype',now(),now(),'$admin','$total',0,'') ") or die(mysqli_error($link));
 
 }

if($q1){	
$count=$_REQUEST['rows'];


for($m=1;$m<=$count;$m++)
{

$pcode=$_REQUEST['pcode'.$m];
$pname=$_REQUEST['pname'.$m];
$uom=$_REQUEST['uom'.$m];
$batch=$_REQUEST['batchno'.$m];
$mfg1=$_REQUEST['mfg'.$m];
$exp1=$_REQUEST['exp'.$m];
$mfg = date('Y-m-d',strtotime($mfg1));
$exp = date('Y-m-d',strtotime($exp1));
$uqty=$_REQUEST['uqty'.$m];
$rqty=$_REQUEST['rqty'.$m];
$urate=$_REQUEST['urate'.$m];
$value=$_REQUEST['value'.$m];
$rqty1=$_REQUEST['rqty'.$m];
$inv_id=$_REQUEST['inv_id'.$m];
//echo $inv_id;
//echo $mfg1;
//echo $exp1;
if($rqty1!=0){

$q2=mysqli_query($link,"insert into phr_salreturn_dtl(lr_no,product_code,product_name,packing_type,batch_no,mfg_dt,exp_date,u_qty,u_rate,value,currentdate,auth_by,r_qty,p_qty) values($lrno,'$pcode','$pname','$uom','$batch','$mfg','$exp','$uqty','$urate',($rqty1*$urate),now(),'$admin','$rqty','$uqty')");

if($q2){
$q7=mysqli_query($link,"update phr_purinv_dtl set balance_qty=(balance_qty+$rqty) where inv_id='$inv_id'");
 } 
 
}
}//for

    /*********this code added by swaroopa*********/          



$rs1=mysqli_query($link,"select sum(total) from phr_salent_mast where cust_name='$custname'  group by cust_name");
while($rw1 = mysqli_fetch_array($rs1)){
$tot_due_amt=$rw1[0];
}
$due1 = 0;
$rs2=mysqli_query($link,"select lr_no from due_patients where lr_no='$invno'") or die(mysqli_error($link));
while($rw2 = mysqli_fetch_array($rs2)){
$due1++;
}

if($due1 != 0){
	
	$g=mysqli_query($link,"update due_patients set total_amount=($tot_due_amt-$total) where lr_no='$invno'") or die(mysqli_error($link));
	
}



print "<script>";
print "alert('Successfully added');";
print "self.location='salesreturn.php';";
print "</script>";


}
?>