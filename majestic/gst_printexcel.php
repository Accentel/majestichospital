<?php
include("config.php");



$rs=mysqli_query($link,"select * from  pharmacydetaisl")or die(mysqli_error($link));
while($res = mysqli_fetch_array($rs)){
$HOSP_NAME=$res['pharmacyname'];
$ADDR=$res['address'];     
     
$PHONE1=$res['phoneno'];

 }



?>
  <?php
$sdate=$_REQUEST['d1'];
$edate=$_REQUEST['d2'];


$s_date=date('Y-m-d',strtotime($_REQUEST['d1']));
$e_date=date('Y-m-d',strtotime($_REQUEST['d2']));



?>
<?php
require_once("config.php");
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=marks_report_printexcel".date('d-m-Y').".xls");

header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header("Content-Disposition: attachment; filename=Pharmacy-gst".date('d-m-Y').".xls");

header('Cache-Control: max-age=0');
//$objWriter->save('php://output');

 $val5=$_REQUEST['d1'];
  $val7=$_REQUEST['d2'];
 

//echo"<table border='1'><tr><th></th><th width='2%'>Location:</th><th>$val4</th><th >From Date:</th><th>$val5</th><th>Todate:</th><th>$val7</th></tr></table>";
//echo"<table width='100%'><tr><th >S NO</th><th width='10%' >Emp Id</th><th width='15%'>Employee Name</th>";
 
?>		<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
    <td width="75%" align="center">
<table width="75%" border="0" cellpadding="0" cellspacing="0" >
    <tr><td>&nbsp;</td></tr>
  <tr>
    <td class="heading1"><?php echo $HOSP_NAME ?></td>
  </tr>
  <tr>
    <td class="heading2"> <?php echo $ADDR ?></td>
  </tr>
  <tr>
    <td class="heading2">Ph : <?php echo $PHONE1 ?></td>
  </tr>
</table>
  </td>
    </tr>
</table>
<p>&nbsp;</p>


<div align="center">

  
  <table width="75%" cellpadding="0" cellspacing="0" border="1" style="font-family: arial;font-size: 12px">
    <tr><td colspan=8><div align="center"><strong>GST Purchase  Entry Report</strong></div></td></tr>
  

  <tr><td colspan=3><div align="right"><strong>From  Date</strong>:</div></td><td><strong><?php echo $sdate ?></strong></td>
  <td colspan="3"><div align="right"><strong>To Date</strong>:</div></td><td><strong><?php echo $edate ?></strong></td>
  
     
	   
</tr>


<tr>
  <td align="center"><strong>S.No.</strong></td>
   <td align="center"><strong>Date.</strong></td>
   <td align="center"><strong>GRN No.</strong></td>
  <td align="center"><strong>Total Purchase Amount.</strong></td>
  <td align="center"><strong>CGST(%)</strong></td>
  <td align="center"><strong>CGST Amount.</strong></td>
  <td align="center"><strong>SGST Amount.</strong></td>
  <td align="center"><strong>GST Amount</strong></td>
 <!-- <td align="center"><strong>Total</strong></td>-->
  </tr>
  
   <?php

$counts=0;
  $s="select VALUE as amt, sgst as sgst1,cgst as cgst1,vat,currentdate,LR_NO  from phr_purinv_dtl where  
 currentdate between '$s_date' and '$e_date'  order by currentdate desc";
$qry=mysqli_query($link,$s)or die(mysqli_error($link));
if($qry){
$sno=0;
$tot3=0;
while($res1 = mysqli_fetch_array($qry)){
    $sno++;
//$tot2=$res1['total'];
?>
  
<tr>
  <td align="center"><?php echo $sno ?></td>
  
  <td align="center"><?php $d=$res1['currentdate']; echo date('d-m-Y',strtotime($d)); ?></td>
    <td align="center"><?php echo $res1['LR_NO'] ?></td>
  <td align="center"><?php echo $t=round($res1['amt']) ?></td>
  <td align="center"><?php echo round($res1['vat']) ?></td>
   <td align="center"><?php echo $a=round($res1['cgst1']) ?></td>
  <td align="center"><?php echo $b=round($res1['sgst1']) ?></td>
  <td align="center"><?php echo $a+$b ?></td>
 <?php /*?>  <td align="center"><?php echo $res1['total'] ?></td><?php */?>

  </tr>

<?php 		
	$tt=$t+$tt;
	$sg=$a+$sg;	
}
}
?>
  <tr><td colspan="3" style="text-align:right;"><strong >Total</strong></td><td style="text-align:center;"><strong><?php echo $tt?></strong></td><td></td>
  <td td style="text-align:center;"><strong><?php echo $sg?></strong></td>
  <td td style="text-align:center;"><strong><?php echo $sg?></strong></td><td td style="text-align:center;"><strong><?php echo $sg+$sg?></strong></td></tr>

  </table>
