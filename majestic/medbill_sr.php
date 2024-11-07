<?php
include("config.php");
$lr_id=$_REQUEST['lr_id'];

$rs=mysqli_query("select sales_type from phr_salreturn_mast where lr_no='$lr_id' ");
while($rw = mysqli_fetch_array($rs))
{
	$sales_type=$rw[0];
}


 if($sales_type == "C"){
	
	$ss=mysqli_query($link,"select b.cust_name,sal_date,a.auth_by,sr_bill_num from phr_salreturn_dtl as a,phr_salreturn_mast as b where a.lr_no='$lr_id' and a.auth_by=b.auth_by")or die(mysqli_error($link));
 }
 

while($rss = mysqli_fetch_array($ss))
{
$custname=$rss[0];
$sr_bill_num=$rss['sr_bill_num'];
$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$custname' ")or die(mysqli_error($link));
while($rw1 = mysqli_fetch_array($rs1)){ $custname =$rw1[0];}
				
$saledate=date('d-m-Y',strtotime($rss[1]));
$authby=$rss[2];
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Pharmacy </title>
<style type="text/css">
.label1{
	font-weight:bold;
}
.heading1{
	font-size:32px;
	text-align:center;
}
.heading2{
	font-size:18px;
	text-align:center;
    
}
.heading3{
	font-size:14px;
	text-align:center;
	font-family: arial;

}
</style>
<script type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}
function printp(){
window.print();
window.close();
}
</script>
<style type="text/css" media="all">
table.table1{
	border-collapse:collapse;
}
table.table1, th.table1, td.table1{
border:1px solid #999999;
}
.cell_left{
	border-right:0px solid #999999;
	border-bottom:1px solid #999999;
}

</style>
</head>

<?php

$res=mysqli_query($link,"select * from  pharmacydetaisl")or die(mysqli_error($link));
while($row = mysqli_fetch_array($res)){
$HOSP_NAME=$row[1];
$phrno=$row[2];
$ADDR=$row[6];         
$PHONE1=$row[7];   
$PHONE2=$row[8];         
$dlno =$row[3];          
$tin =$row[4]; 
 }

?>
<body>

<!--<div align="center" class="heading" style="font-size:22px;" ><?php  $HOSP_NAME ?></div>
                        <div align="center" class="heading"  style="font-size:18px;"><?php  $orgname ?></div>
                     <div align="center"  class="heading2" >Licence No. : TG/20/04/2015-8388,TG/20/04/2015-8389</div>
                     
                        <div align="center" class="heading" ><?php  $ADDR ?>. Ph : <?php  $PHONE1 ?></div>-->
                    
                    <div align="center">  <img src="images/logo print.png"  width="50%" height="" /></div>  
                    
        
	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" style="font-size:12px;border-top:1px solid #999999;" cellspacing="4" cellpadding="0">
		<!--<tr height="5px"></tr>
		
		 <tr height="5px"></tr>-->
         
         
         <tr>
            <td style="padding-left:10px;" width="25%" align="left"><span class="label1"><!--Receipt No-->Reciept no</span> : <?php echo $sr_bill_num ?></td>
            <td width="20%" align="left"> </td>
            <td width="15%" ><div align="left"><span class="label1"></span>   </div></td>
            <td width="10%" align="left"> </td>
             <td width="35%" ><div align="left"><span class="label1"></span> <?php // $lr_id ?><?php //echo $saledate ?> </div></td>
            <td width="20%" align="left"> </td>
          </tr>
          
          	<?php /*?><tr>
            <td style="padding-left:10px;" width="15%" align="left"><span class="label1">Receipt No</span></td>
            <td align="left"><?php echo $lr_id ?></td>
            <td width="15%" ><div align="left"><span class="label1"></span> </div></td>
            <td align="left"></td>
          </tr><?php */?>
          <tr>
             <td ><div align="left"><span class="label1">Patient Name</span></div></td>
            <td ><?php echo $custname ?></td>
            <td align="left"><span class="label1">Sale Date</span></td>
            <td align="left"><?php echo $saledate ?></td>
           
          </tr>
          <tr>
            <td colspan="8"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" style="border:1px solid #999999;background:#FFFFFF">
              <tr class="label1">
                <td width="26" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">S No. </td>
                <td width="125" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">Drug Name</td>
                <td width="55" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">Batch No</td>
                <td width="65" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">EXP dt.</td>
				<td width="23" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">R.QTY</td>
				<td width="45" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">U.Price</td>
                <td width="72" align="center" style="border-bottom:1px solid #999999;background:#FFFFFF">Tot.Price</td>
                </tr>
                    
			  <?php
			  $nn=0;
			  $tot=0;
			  $discount=0;
			  $price=0;
			  $res1=mysqli_query($link,"select a.product_name,a.batch_no,a.exp_date,a.r_qty,a.u_rate,a.value from phr_salreturn_dtl as a,phr_salreturn_mast as c where a.lr_no=c.lr_no and  a.lr_no='$lr_id'")or die(mysqli_error($link));
				while($row1 = mysqli_fetch_array($res1))
				{
				
				$sp=($row1[3]*$row1[4]);
				$price=($price+$sp);

				
					$nn++;	  
				
			?>
              <tr >
                 <tr >
                <td align="center"><?php echo $nn ?>)</td>
                <td align="center"><?php echo $row1[0] ?></td>
                <td align="center"><?php echo $row1[1] ?></td>
		<td align="center"><?php echo date('d-m-Y',strtotime($row1[2])) ?></td>
		<td align="center"><?php echo $row1[3] ?></td>
                <td align="center"><?php echo $row1[4] ?></td>
		<td align="center"><?php echo $sp ?></td>
                      </tr>
                <?php } ?>
            </table></td>
          </tr>
		   <tr>
            <td  colspan="5">
			<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" >
			
			<tr>
			  <td width="545" align="center">&nbsp;</td>
			  <td width="211" class="label1"><div align="right">Total Amount : </div></td>
			  <td align="center"><?php echo $price.".00" ?></td>
			  </tr>
			  <?php $tot=round($tot+$price); ?>
			  <tr>
			  <td align="center">&nbsp;</td>
			  <td class="label1"><div align="right">Return Amount : </div></td>
			  <td align="center"><?php echo $tot.".00" ?></td>
			  </tr>
			
              
            </table></td>
          </tr>
        </table>
        
        <tr>
         <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $tot;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $rupee= $result . "Rupees  " ;
 ?> 
             
               <td  colspan="6" align="left">
                 <hr />
               <strong>Rupees: </strong><?php echo $rupee?> Only.</td> </tr><tr>
                   
          <td  colspan="6" align="left">
                 <hr />
               <strong>Note: </strong>1) Items connot be taken back after 72 Hrs.  (Bill is Mandatatory). <br />
               
               
               2) Damaged / Fridze items will not be taken back, 3) Free Home delivery above Rs.500/- .</td> 
		   <tr>
            <td  colspan="6">
            
            
            
            
            
            
            
            
            
            
			<!--<table width="100%" border="0" align="left" cellpadding="4" cellspacing="0" >
			
			<tr>
			  <td width="545" align="left">&nbsp;</td>
			  <td width="211" class="label1"><div align="right">Total Amount : </div></td>
			  <td align="left"><?php echo number_format($price,2) ?></td>
			  </tr>
			  <tr>
			  <td align="left">&nbsp;</td>
			  <td class="label1"><div align="right">Average Discount(%) : </div></td>
			  <td align="left"><?php echo number_format($discount,2) ?></td>
			  </tr>
			
              <tr>
                <td align="left">&nbsp;</td>
                <td class="label1"><div align="right">Amount To Pay: </div></td>
                <td width="69" align="left"><?php echo $tot ?></td>
              </tr>
            </table></td>
          </tr>
        </table>-->
		<table width="100%" align="left" style="font-size:10px;outline:1px solid black;">
		<tr >
            <td style="padding-left:10px;" width="10%" align="right"><span class="label1">User</span></td>
            <td width="25%" align="left"> : <?php echo $authby ?></td>
             <td width="15%" ><div align="left"><span class="label1">24 HRS . Services</span> </div></td>
            <td width="15%" ></td>
            <td width="15%" ><div align="right"><span class="label1">Order Date</span> </div></td>
            <td width="25%" align="left"> : <?php echo date('d-m-Y h:i:s'); ?></td>
          </tr>
	  </table>
	<!--<table width="100%" align="left" style="font-size:12px;outline:1px solid black;">
		<tr >
		<td style=""><b>Terms & Conditions : </b></td>
		
		</tr>
		<tr >
		<td>01. This Bill / Order once processed cannot be cancelled or modified. Amount will not be refunded under any circumstances.</td>
		
		</tr>
		<tr >
		<td>02. Please bring this bill when collecting your Spectacles. Spectacles can collect during store working hours.</td>
		
		</tr>
		<tr >
		<td>03. Customers own frames and lenses given to the store  for adjustments can only be handled at customer's risk.</td>
		
		</tr>
	</table>-->
	
	<div align="center" style="margin-top:2px;margin-bottom:2px; font-size:9px">We will pray for your good health and a speedy recovery.</div> 
	<div align="center"  style=" font-size:9px"> **** Thank You. Visit Again. **** </div> 
		<!--<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#FFFFFF">
                    <tr height="30"></tr>
				<tr><td align="left"><b>GRN No. :</b><?php echo $phrno ?></td></tr>
                    <tr><td align="left"><b>D.L No.  :</b> <?php echo $dlno ?></td></tr>
                    <tr><td align="left"><?php if($tin == ""){ echo "";}else{ echo "<b>TIN No. : </b>".$tin;} ?></td></tr>
                    <tr><td>&nbsp;</td></tr>
		<tr align="right" style="font-size:18px;"><td>For <?php echo $HOSP_NAME ?></td></tr>
		</table>-->
		</td>
      </tr>
    </table>
	
        
        
		<?php /*?><table width="100%" align="center" style="font-size:12px;outline:1px solid black;">
		<tr >
            <td style="padding-left:10px;" width="15%" align="left"><span class="label1">Attended By</span></td>
            <td width="40%" align="left"> : <?php echo $authby ?></td>
            <td width="15%" ><div align="left"><span class="label1">Order Date</span> </div></td>
            <td width="30%" align="left"> : <?php echo date('d-m-Y h:i:s'); ?></td>
          </tr>
	  </table><?php */?>
	<!--<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:1px solid #999999;background:#FFFFFF">
                    <tr height="10"></tr>
					<tr><td align="left"><b>GRN No. :</b><?php echo $phrno ?></td></tr>
                    <tr><td align="left"><b>D.L No.  :</b> <?php echo $dlno ?></td></tr>
                    <tr><td align="left"><?php if($tin == ""){ echo "";}else{ echo "<b>TIN No. : </b>".$tin;} ?></td></tr>
                    <tr><td>&nbsp;</td></tr>
		<tr align="right" style="font-size:18px;"><td>For <?php echo $HOSP_NAME ?></td></tr>
		</table>-->
		</td>
      </tr>
    </table>
	

<div align="center"><input type="button" value="Print" class="butt" id="prnt" onclick="prnt();"/><input type="button" value="Close" class="butt" id="cls" onclick="closew();"/> </div>
</body>
</html>