<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header.php");
	?>
<script language="JavaScript" type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>


	</head>

	<body>

	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td colspan="2" style="border-bottom:1px solid #999999;padding-left: 20px;">
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
		   <?php
				include("config.php");
				
				$sql = mysqli_query($link,"select * from organization")or die(mysqli_error($link));
				if($sql)
				{
					$row = mysqli_fetch_array($sql);
					
					$orgname = $row['orgname'];
					$orgaddr = $row['address'];
					$orgphone = $row['phone'];
					$orgmobile = $row['mobile'];
					
				}
		   ?>
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#FFFFFF">
                   <?php /*?> <tr>
                        <td align="center" style="font-size:24px;" colspan="6"><?php echo $orgname ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php echo $orgaddr ?>,</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6">Ph : <?php echo $orgphone ?>,<?php echo $orgmobile ?></td>
                    </tr><?php */?>
                    
                    <tr><tr><td colspan="6"  align="center"><img src="images/majestic_reghead.png"  ></td></tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </td>
            </tr>
        </table>
            </td>
        </tr>
	<?php
			include("config.php");

			$pno = $_REQUEST['id'];
			
			$sql= mysqli_query($link,"select b.ADMIT_DATE,a.patientname,b.BED_NO,a.age,a.gender,a.address,b.AMOUNT,b.CONS_AMT,b.doc_code,
			b.Allot_BY,d.dname1,b.CONCESSION_TYPE ,b.CONCESSION_CARDNO,b.Auth_BY,b.mr_cost,a.pay_type,b.bill_num,b.package,b.adv_amnt,b.pkg_amount from patientregister as a,ip_pat_admit as b,doct_infor as d where a.registerno=b.pat_regno and b.doc_code=d.id and b.pat_no='$pno'")or die(mysqli_error($link));
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				
				$adate = date('d-m-Y',strtotime($row['ADMIT_DATE']));
				$patname = $row['patientname'];
				$bedno = $row['BED_NO'];
				$age = $row['age'];
				$gender = $row['gender'];
				$addr = $row['address'];
				$amt =$row['AMOUNT'];
				$consamt = $row['CONS_AMT'];
				$allotby = $row['Allot_BY'];
				$docname = $row['dname1'];
				$contype = $row['CONCESSION_TYPE'];
				$cardno = $row['CONCESSION_CARDNO'];
				$bill_num = $row['bill_num'];
				$authby = $row['Auth_BY'];
				$mrcost = $row['mr_cost'];
			   $package = $row['package'];
				$ptype = $row['pay_type'];
				$mrcost = $row['mr_cost'];
				$adv_amnt=$row['adv_amnt'];
				$pkg_amount=$row['pkg_amount'];
				 $doc_code=$row['doc_code']; 
				
				//$sql1 = mysqli_query("select CONCE_NAME from concession_type where CONCE_CODE='$contype'");
				//if($sql1)
				//{
					//$row1=mysqli_fetch_array($sql1);
					//$conname = $row1['CONCE_NAME'];
				//}
			}		
				
		?>
        
         <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $adv_amnt;
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
  $rupee= $result . "Rupees  Only." ;
 ?> 
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="4"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
         
          <tr>
         
            <td width="20%"><div align="left"><b>Bill No : </b> </div></td>
			<td ><?php echo $bill_num ?></td>
            <td width="20%"><div align="left"><b> </b></div></td>
			<td ></td>
            </tr>
         
          <tr>
         
            <td width="20%"><div align="left"><b>Patient Name : </b> </div></td>
			<td ><?php echo $patname ?></td>
            <td width="20%"><div align="left"><b>Admit Date : </b></div></td>
			<td ><?php echo $adate ?></td>
            </tr>
          <tr>
           
            <td ><div align="left"><b>Age/Sex :</b> </div></td>
			<td><?php echo $age ?> / <?php echo $gender ?></td>
           <td  ><div align="left"><b>Bed No : </b></div></td>
          <td><?php echo $bedno ?></td>
            </tr>
			<?php if($contype != ""){ ?>
			  <tr>
           
            <td><div align="left"><b>Payment Type: </b></div></td>
			<td><?php echo $conname ?></td>
           <td><div align="left"><b>Card No. : </b></div></td>
		   <td><?php echo $cardno; ?></td>
          </tr>
		  <?php if($conname == "TPA Insurances"){ ?>
		  <tr>
           
            <td><div align="left"><b>Insurance Type: </b></div></td>
			<td><?php echo $insutype ?></td>
           </tr>
		   <?php }} ?>
           
           <?php if($package!='Yes'){?>
			  <tr>
           
            <td><div align="left"><b>Doctor  Name : </b></div></td>
			<td><?php  
$sq11=mysqli_query($link,"select * from doct_infor where id='$doc_code'")or die(mysqli_error($link));
$r1=mysqli_fetch_array($sq11);
echo $dname=$r1['dname1'];?>
			</td>
           <?php /*?><td><div align="left"><b>Admit Fee : </b></div></td>
		   <td><?php echo $amt; ?></td><?php */?>
            <td  ><div align="left"><b>Total Amount : </b></div></td>
			<td><?php echo (($amt+$mrcost)-$consamt); ?>.00</td>
          </tr>
          
          <tr>
         
			 <td valign="middle" ><div align="left"><b>  </b></div></td>
			 <td></td>
             
              <td  ><div align="left"><b>Paid Amount : </b></div></td>
			<td><?php echo $adv_amnt; ?></td>
             
            <?php /*?>  <td><div align="left"><b>M.R.Fee : </b> </div></td><td><?php echo $mrcost; ?></td><?php */?>
            </tr>
            <tr>
         
			 <td valign="middle" ><div align="left"><b>Alloted By : </b></div></td>
			 <td><?php echo $allotby ?></td>
             
              <td  ><div align="left"><b>Balance Amount : </b></div></td>
			<td><?php echo (($bal=$amt+$mrcost)-$consamt-$adv_amnt); ?>.00</td>
             
            <?php /*?>  <td><div align="left"><b>M.R.Fee : </b> </div></td><td><?php echo $mrcost; ?></td><?php */?>
            </tr>
            <?php } else {?>
             <tr>
           
            <td><div align="left"><b>Doctor  Name : </b></div></td>
			<td><?php echo $docname ?></td>
           <?php /*?><td><div align="left"><b>Admit Fee : </b></div></td>
		   <td><?php echo $amt; ?></td><?php */?>
            <td  ><div align="left"><b>Package Amount : </b></div></td>
			<td><?php echo ($pkg_amount); ?>.00</td>
          </tr>
          
          <tr>
         
			 <td valign="middle" ><div align="left"><b>  </b></div></td>
			 <td></td>
             
              <td  ><div align="left"><b>Paid Amount : </b></div></td>
			<td><?php echo $adv_amnt; ?></td>
             
            <?php /*?>  <td><div align="left"><b>M.R.Fee : </b> </div></td><td><?php echo $mrcost; ?></td><?php */?>
            </tr>
            <tr>
         
			 <td valign="middle" ><div align="left"><b>Alloted By : </b></div></td>
			 <td><?php echo $allotby ?></td>
             
              <td  ><div align="left"><b>Balance Amount : </b></div></td>
			<td><?php echo ($bal=$pkg_amount-$adv_amnt); ?>.00</td>
             
            <?php /*?>  <td><div align="left"><b>M.R.Fee : </b> </div></td><td><?php echo $mrcost; ?></td><?php */?>
            </tr>
            
            
            
            <?php }?>
            
            
		<?php /*?>	
          <tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td><div align="left"><b>Conce.Fee : </b> </div></td>
			<td><?php echo $consamt; ?></td>
            </tr>
          <tr>
            <td class="label1" >&nbsp;</td>
			<td class="label1" ><u><span style="color:#FF9999"></span></u></td>
            <td  ><div align="left"><b>Total Fee : </b></div></td>
			<td><?php echo (($amt+$mrcost)-$consamt); ?>.00</td>
            </tr><?php */?>
			<tr height="20"></tr>
            <tr>
            <td colspan="4" height="30"><div id="inwords"><b>Rupees  : <?php echo $rupee?><!--Validity for Registration Card Up to <?php echo $validity ?>--> </b></div> </td>
            </tr>
            
        </table></td>
      </tr>
      <tr><td align="center" style=" border-top: #000000 1px solid"><table width="70%" cellpadding="0" cellspacing="0" >
        <tr height="20"></tr>
		<tr><td height="18"><b>Prepared By:</b><?php echo $authby ?></td><td valign="top"><div align="right"><b>Printed Date:</b><?php echo date('d-m-Y',strtotime("now"));?></div></td>
      </tr></table></td></tr>
    </table>
	</tr>
	</td>
  </tr>
      <tr>
          <td  colspan="3" align="right"><b>SIGNATURE &nbsp;&nbsp;</b></td>
      </tr>
  <tr><td >&nbsp;</td></tr>
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/></td>
      </tr>
        </table>
		  

	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>