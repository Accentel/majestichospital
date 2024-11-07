<?php //include('config.php');
include('config.php');
session_start();
if($_SESSION['name1'])
{
$emp_id = $_SESSION['name1'];
$r=mysqli_query($link,"select ename from login where name1='$emp_id'");
$row=mysqli_fetch_array($r);
 $empname=$row['ename'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

	<head>
	<?php
		include("header.php");
	?>
	<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:0px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}
@media screen {
    div#footer_wrapper {
      display: none;
    }
  }

  @media print {
    tfoot { visibility: hidden; }

    div#footer_wrapper {
      margin: 0px 2px 12px 7px;
      position: fixed;
      bottom: 0;
    }

    div#footer_content {
      font-weight: bold;
    }
  }

</style>
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

	<body style="margin-top:0px;">

	<div class="book">
     <div class="page">
        <div class="subpage" style="margin-top:-50px;">
       
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF" >
<THEAD>
<tr><td colspan="2"><img src="images/majestic_reghead.png"/>  </td></tr>
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Hospital Cash Bill<!--Observation Patient Discharge Cash Bill--></u></b></h2></td></tr>
  </THEAD>
	<?php
			//include("config.php");

			$bno = $_REQUEST['bno'];
			$qr="select a.BillDate,a.PatientName,a.Age,a.mrno,a.Sex,a.DoctorName,a.Total,a.Discount,a.NetAmount,a.PaidAmount,a.cnt,a.BalanceAmount,a.conce_type,a.ptype,a.phoneno,a.time,a.deptart,a.observation,a.bed,b.registerdate,b.registerno,b.auth_by from hbill a,patientregister b where b.registerno=a.mrno and a. BillNO='$bno'";
			$sql= mysqli_query($link,$qr) or die(mysqli_error($link));
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['BillDate']));
				$patname = $row['PatientName'];
					$cnt = $row['cnt'];
				$age = $row['Age'];
				$mrno = $row['mrno'];
				$gender = $row['Sex'];
				$dname = $row['DoctorName'];
				$total =$row['Total'];
				$consamt = $row['Discount'];
				$namt = $row['NetAmount'];
				$paid = $row['PaidAmount'];
				$bal = $row['BalanceAmount'];
				$ctype = $row['conce_type'];
				$ptype = $row['ptype'];
				$phoneno = $row['phoneno'];
				$time1 = $row['time'];
				$deptart = $row['deptart'];
				$observation = $row['observation'];
				$bed = $row['bed'];
				$registerdate = $row['registerdate'];
				$auth_by =$row['auth_by']; 
	
			}		
				$tot=$paid;
		?>
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
  $rupee= $result . "Only  " ;
 ?> 
    <TBODY>
  <tr>
    <td colspan="5" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="5"  valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:13px;" cellpadding="0" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
			 
             <tr>
          <td style="padding-left:10px;"><div align="left"><b>UMR No</b> </div></td>
			<td style="padding-left:10px;"> :<?php echo $mrno ?></td>
            <td style="padding-left:10px;"><div><b>Bill No</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $cnt ?></td>
            
           
            </tr>
          <tr>
         <tr>
          <td style="padding-left:10px;"><div align="left"><b>Patient Name</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $patname ?></td>
            <td style="padding-left:10px;"><div align="left"><b>Patient Type</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $ptype ?> </td>
           
            </tr>
          <tr>
         
           <td style="padding-left:20px;" width="15%"><div align="left"><b>Bill No.</b> </div></td>
			<td style="padding-left:20px;" width="35%"> : <?php echo $bno ?></td>
           
            <td style="padding-left:10px;"><div align="left"><b>Age / Sex</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $age ?> / <?php echo $gender ?></td>
           </tr>
			
			  <tr>
           
            <td style="padding-left:10px;"><div align="left"><b>Doctor  Name</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $dname ?></td>
            
             <td style="padding-left:10px;" width="15%"><div align="left"><b>Department</b> </div></td>
			<td style="padding-left:10px;" width="35%"> : <?php echo $deptart ?></td>
			
          
          </tr>
		  	 <tr>
           
            <td style="padding-left:10px;"><div align="left"><b>Phone No </b></div></td>
			<td style="padding-left:10px;"> : <?php echo $phoneno ?></td>
			<td style="padding-left:10px;"><div align="left"> <b>Time </b></div></td>
			<td style="padding-left:10px;"> :<?php echo $time1 ?></td>
			
          
          </tr>
          <tr>
           
            <td style="padding-left:10px;"><div align="left"><b>Observation</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $observation ?></td>
			<td style="padding-left:10px;"><div align="left"><b>Bed</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $bed ?></td>
			
          
          </tr>
           <tr>
           
            <td style="padding-left:10px;"><div align="left"><b>Entry Date </b></div></td>
			<td style="padding-left:10px;"> : <?php echo $registerdate	 ?></td>
			<td style="padding-left:10px;"><div align="left"><b>Discharge Date</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $bdate." ".$time1 ?></td>
			
          
          </tr>
		  <tr>
			<td colspan="4">
			<table align="center" width="100%" style="border-top:1px solid #000000;border-bottom:1px solid #000000;" cellpadding="0" cellspacing="0">
				<tr >
					<td width="70%" style="padding-left:50px;font-size:16px;" align="left" ><b><u>Description</u></b></td>
					<td align="left" ><b><u>Amount</u></b></td>
					
				</tr>
				
			<?php	
				$sql1=mysqli_query($link,"SELECT purpose,Amount FROM hbill1 WHERE BillNO = '$bno'");
				if($sql1){
				while($row1 = mysqli_fetch_array($sql1)){
				
				?>	
				<tr>
				
				<td style="padding-left:50px;" align="left"><?php echo $row1['purpose'] ?></td>
				<td  align="left"><?php echo number_format($row1['Amount'],2) ?></td>
				</tr>
				
				<?php } } ?>
				</table>
			</td>
		  </tr>
            <?php if($consamt > 0){ ?><tr>
         
			 <td style="padding-left:20px;" width="20%" align="left">Discount</td>
			 <td width="30%" style="padding-left:20px;"> : <b><?php echo number_format($consamt,2) ?></b></td>
              <td width="20%" style="padding-left:20px;">Total </td><td style="padding-left:20px;" width="30%"> : <b><?php echo number_format($total,2) ?></b></td>
            </tr><?php } ?>
			 <tr>
         
			 <td style="padding-left:10px;" align="left"><b>Net Total</b> </td>
			 <td style="padding-left:10px;"> : <?php echo number_format($namt,2) ?></td>
              <td style="padding-left:10px;" align="left"><b>Paid Amount</b></td><td style="padding-left:20px;"> : <?php echo number_format($paid,2) ?> </td>
            </tr>
          <tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td><div style="padding-left:20px;" align="left"><b>Balance</b> </div></td>
			<td style="padding-left:20px;"> : <?php echo number_format($bal,2) ?></td>
            </tr>
			
         <!--<tr>
            <td class="label1"  colspan="4"><br/><br/><br/>
			  </td>
            </tr>-->
             <tr>
            <td colspan="4" height="30"><div id="inwords"><b>Rupees  : <?php echo $rupee?><!--Validity for Registration Card Up to <?php echo $validity ?>--> </b></div> </td>
            </tr>
          
          <tr>
            <td colspan="4" height="30"><div id="inwords"><b>Prepared by : <?php echo $auth_by?><!--Validity for Registration Card Up to <?php echo $validity ?>--> </b></div> </td>
            </tr>
          
            
			<tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td class="label1" >&nbsp;</td>
			<td style="padding-left:20px;font-size:14px;" >  <b>Authorized Signature</b> </td>
            </tr>
			
			
        </table></td>
      </tr>
      <tr><td align="center" >
	  
	  
	 
	  </td></tr>
	  
    </table>
	</tr>
	</td>
  </tr>
 
 
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <a href="view_hbill.php"><input type="button" value="Close" id="cls" class="butt" onclick="window.close()"/></a></td>
      </tr>
      
      
      
      
      
      
      
        </table>
        </TBODY>
        
      <!-- <div id="footer_wrapper">
  <div id="footer_content">
    <p>24x7 Emergency: *Cardiac  *Neuro  *Paediatric  *General Surgery  *Ortho Poly Trauma Services Available</p>
    <hr />
    <p>Super Bazar,HUZURABAD-505 468,Dist.Karimnagar.*Cell:9441773007, 9959954108,8008036663</p>
  </div>
</div>-->
		  
</div>
</div>
</div>
	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>