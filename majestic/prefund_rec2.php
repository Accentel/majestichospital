<?php //include('config.php');
include('config.php');
session_start();

if($_SESSION['name1'])

{
$emp_id = $_SESSION['name1'];
$r=mysqli_query($link,"select ename from login where username='$emp_id'")or die(mysqli_error($link));
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
    padding-top: 0px;
	padding-left:1.5cm;
	padding-right:1.5cm;
	padding-bottom:1.5cm;
	margin-top:0px;
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
	margin-top:0px;
  
}
.ddd{
	
	padding-bottom:100px;
	
	}
	.ddd1{
	height: 100px;
	padding-top:50px;
	
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
        <div class="subpage">
       
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF" >
<THEAD>
<tr><td colspan="2"><img src="images/durgatop.png" style="width:100%; height:120px;"/>  </td></tr>
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>IP  Refund Bill</u></b></h2></td></tr>
  </THEAD>
	<?php
			include("config.php");

			$bno = $_REQUEST['bno'];
			$sql= mysqli_query($link,"select * from prefund where id='$bno' ")or die(mysqli_error($link));
			//$sql= mysqli_query("select  b.mrno,b.BillDate,b.phoneno,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time,b1.cnt,b1.user from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['BillDate']));
				$patname = $row['pname'];
				$cnt = $row['cnt'];
				$age = $row['age'];
				$mrno = $row['umrno'];
				$gender = $row['sex'];
				$dname = $row['consultname'];
				$pptotal =$row['pptotal'];
				$consamt = $row['Discount'];
				$pkg_amount = $row['pkg_amount'];
				$total = $row['total'];
				$discount = $row['discount'];
				$ctype = $row['conce_type'];
				$ptype = "IP";
				$nettotal = $row['nettotal'];
				$time1 = $row['time'];
				$user = $row['user'];
				$paid = $row['paid'];
				$bal = $row['bal'];
				$refund = $row['refund'];
				$phone = $row['phone'];
	
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
$number = $refund;
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
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td  valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:13px;" cellpadding="0" cellspacing="0" >
          
        
			
             <tr>
          <td style="padding-left:10px;"><div align="left"><b>UMR No</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $mrno ?></td>
            <td style="padding-left:10px;"><div align="left"><b>Bill No</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $cnt ?></td>
           
            </tr>
          <tr>
         <tr>
          <td style="padding-left:10px;"><div align="left"><b>Patient Name</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $patname ?></td>
            
            <td style="padding-left:10px;" width="15%"><div align="left"><b>Date </b></div></td>
			<td style="padding-left:10px;" width="35%"> : <?php echo $bdate ?></td>
            </tr>
          <tr>
         
           
           
            <td style="padding-left:10px;"><div align="left"><b>Age / Sex </b></div></td>
			<td style="padding-left:10px;"> : <?php echo $age ?> / <?php echo $gender ?></td>
			<td style="padding-left:10px;"><div align="left"><b>Patient Type</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $ptype ?> </td>
           </tr>
			
			  <tr>
           
            <td style="padding-left:10px;"><div align="left"><b>Doctor  Name</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $dname ?></td>
			<td style="padding-left:10px;"><div align="left"><b>Phone No</b> </div></td>
			<td style="padding-left:10px;"> : <?php echo $phone ?></td>
          
          </tr>
		  	
		  <tr>
		  <td colspan="4"><hr/></td>
		  </tr>
            
			
			 <tr>
			 <td></td><td></td>
         <td   align="left">Package Amount </td>
		 <td style="padding-left:76px;">  <b><?php echo number_format($pkg_amount,2) ?></b></td>
			 
            </tr>
			<tr>
			 <td></td><td></td>
         <td   align="left">Extra Amount </td>
		 <td style="padding-left:76px;">  <b><?php echo number_format($total,2) ?></b></td>
			 
            </tr>
			
			<tr>
			 <td></td><td></td>
         <td   align="left">Net Amount </td>
		 <td style="padding-left:76px;">  <b><?php echo number_format($nettotal,2) ?></b></td>
			 
            </tr>
			<tr>
			 <td></td><td></td>
         <td   align="left">Paid Amount </td>
		 <td style="padding-left:72px;">  <b><?php echo number_format($paid,2) ?></b></td>
			 
            </tr>
			
			<tr>
			 <td></td><td></td>
         <td   align="left">Balance Amount </td>
		 <td style="padding-left:72px;">  <b><?php echo number_format($bal,2) ?></b></td>
			 
            </tr>
			<tr>
			 <td></td><td></td>
         <td   align="left">Refund Amount </td>
		 <td style="padding-left:72px;">  <b><?php echo number_format($refund,2) ?></b></td>
			 
            </tr>
			       
		 <tr>
            <td class="label1" colspan="2" style="text-align:left;font-size:13px;" ><b>Rupees:</b><?php echo $rupee?></td>
			 
            <td></td>
			<td >  </td>
            </tr>
			 <tr style="height:15px;"></tr>
			
			<tr>
            <td class="label1" colspan="2"  style="text-align:left;font-size:13px;" ><b>Prepared by:</b><?php echo $user; ?></td>
			
			 <td></td>
			<td style="padding-left:20px;font-size:13px;" >  <b>Authorized Signature</b> </td>
            </tr>
			
			
        </table></td>
      </tr>
      <tr><td align="center" >
	  
	 <!-- <table width="70%" style="font-size:10px;" cellpadding="0" cellspacing="0" >
        <tr height="30"></tr>
		<tr><td ><b><?php if($sstatus1=="T"){ echo $s1; }?></b></td><td valign="top"><div align="right"><b><?php if($sstatus=="T"){ echo $s2; } ?></b></div></td>
      </tr>
	  
	  </table>-->
	 
	  </td></tr>
	  
    </table>
	</tr>
	</td>
  </tr>
 
 
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="self.location='prefundamountlist.php'"/></td>
      </tr>
      
      
      
      
      
      
      
        </table>
        </TBODY>
        
       <div id="footer_wrapper">
  <div id="footer_content">
    <!--<p>24x7 Emergency: *Cardiac  *Neuro  *Paediatric  *General Surgery  *Ortho Poly Trauma Services Available</p>
    <hr />
    <p>Super Bazar,HUZURABAD-505 468,Dist.Karimnagar.*Cell:9441773007, 9959954108,8008036663</p>-->
  </div>
</div>
		  
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