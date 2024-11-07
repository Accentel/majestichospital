<html>
    <head>
<style type="text/css">

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
	  font-size:14px;
    }

    div#footer_content {
      font-weight: bold;
    }
  }



</style>
<script language="JavaScript" type="text/javascript">


function abc(){
	
document.getElementById('prt').style.display='none';
document.getElementById('cls').style.display='none';
window.print();
window.close();

}
</script>
    </head>

<?php
include("config.php");

$sql = mysqli_query($link,"select * from organization")or die(mysqli_error($link));
while($res = mysqli_fetch_array($sql)){
$HOSP_NAME=$res['orgname'];
$ADDR=$res['address'];
$PHONE1=$res['phone'];

 }
?>
<body>
<div class="book">
     <div class="page">
        <div class="subpage">
       
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #999999;background:#FFFFFF">
                   <THEAD>
<tr><td colspan="2"><img src="images/durgatop.png" style="width:100%; height:120px;"/>  </td></tr>

  </THEAD>
                   
                </table>
            </td>
            </tr>
        </table>
    </td>
    </tr>
</table>
<?php 
$id=$_REQUEST['id'];
$a = $_REQUEST['a'];
if($a == "IP"){
$qry=mysqli_query($link,"select * from addexpenses where id='$id'")or die(mysqli_error($link));
}if($a == "DI"){
$qry=mysqli_query($link,"select * from addexpenses where id='$id'")or die(mysqli_error($link));

}
if($qry){
while($res = mysqli_fetch_array($qry)){
    $twards=$res['towards'];
   $k1= mysqli_query($link,"select * from expensetype where id='$twards'");
    $k=mysqli_fetch_array($k1);
$bno = $res['bill_no'];
$bdate = date('d-m-Y',strtotime($res['bill_date']));
if($a == "IP"){
$regno=$res['reg_no'];
$patname=$res['pat_name'];
$age=$res['age'];
$adate=date('d-m-Y',strtotime($res['admit_date']));
}
$amt=$res['amount'];
$paidto=$res['paid_to'];
$mobno=$res['mobile_no'];
$towards=$k['exptype'];
$paytype=$res['pay_type'];
$bname=$res['bname'];
$chqno=$res['chq_no'];
$chqdate = $res['chq_date'];
$acno=$res['account_no'];
$amtwords = $res['amt_words'];
$expense = $res['expense'];
}
}

?>

<table width="100%" cellspacing="0" cellpadding="2" border="0" style="border-bottom:1px solid #000">
<tr>
<td colspan="5" ><div align="center"><font face="Calibri" style="text-decoration:underline" ><b><h4>VOUCHER</h4></b></font></div></td></tr>

<tr>
<td width="5%">&nbsp;</td>
<td width="20%" align="right" ><div align="left"><b>Bill No.</b></div></td>
<td width="30%" align="left"><div align="left"> : <?php echo $bno ?></div></td>
<td width="20%" align="right"><div align="left"><b>Date</b></div></td>
<td width="30%" align="left"><div align="left"> : <?php echo $bdate ?></div></td>
</tr>
<?php if($a == "IP"){ ?>
<tr>
<td width="5%">&nbsp;</td>
<td align="right" ><div align="left"><b>UMR No. / Patient</b></div></td>
<td align="left"><div align="left"> : <?php echo $regno." / ".$patname ?></div></td>
<td align="right"><div align="left"><b>Age</b></div></td>
<td align="left"><div align="left"> : <?php echo $age ?></div></td>
</tr>
<?php } ?>
<tr>
<td width="5%">&nbsp;</td>
<td align="right" ><div align="left"><b>Paid to Mr./Ms </b></div></td>
<td align="left"><div align="left"> : <?php echo $paidto ?></div></td>
<td align="right"><div align="left"><b>Mobile</b></div></td>
<td align="left" colspan="4"><div align="left"> : <?php if($mobno != ""){ echo $mobno; }else{ echo "----"; } ?></div></td></tr>
<tr >
<td width="5%">&nbsp;</td>
<td  align="right"><div align="left"><b>The Sum of Rs. </b></div></td>
<td  align="left"><div align="left"> : <?php echo $amt ?></div></td>
<td  align="right"><div align="left"><b>towards:</b></div></td>
<td  align="left"><div align="left"> : <?php echo $towards ?></div></td>
</tr>
<tr >
<td width="5%">&nbsp;</td>
<td  align="right"><div align="left"><b>Description: </b></div></td>
<td  align="left"><div align="left"> : <?php echo $expense ?></div></td>

</tr>
<tr >
<td width="5%">&nbsp;</td>
<td align="left"><div align="left"><b>Rupees in words</b></div></td>
<td align="left" colspan="3"><div align="left"> : <?php echo $amtwords ?></div></td>
</tr>
<tr >
<td width="5%">&nbsp;</td>
<td  align="right"><div align="left"><b>cash/cheque No</b></div></td>
<td align="left" ><div align="left"> : <?php if($paytype == "Cash"){ echo $paytype;}else{ echo $chqno; } ?> </div></td>
<td  align="right"><div align="left"><b>Bank details</b></div></td>
<td  align="left"><div align="left"> : <?php if($bname != ""){ echo $bname;}else{ echo "----"; } ?></div></td>

</tr>
<tr >
<td width="5%">&nbsp;</td>
<td  align="right"><div align="left"><b>Date</b></div></td>
<td  align="left"><div align="left"> : <?php echo $bdate ?></div></td>
<td  align="right"><div align="left"><b>Debit A/C</b></div></td>
<td align="left" ><div align="left"> : <?php if($acno != ""){ echo $acno; }else{ echo "----"; }  ?></div></td>
</tr>
</table>

<table  width="100%">
<tr height="50"></tr>
<tr >
<td width="16%">&nbsp;</td>
<td width="34%" align="left" ><div align="left"><strong><font face="Calibri">
  Cashier Signature
</font></strong></div></td>
<td width="16%">&nbsp;</td>
<td width="34%" align="left" ><div align="left"><strong><font face="Calibri">
  Receiver Signature
</font></strong></div></td>

</tr>
</table>
<div align="center"><input type="button" value="Print" id="prt" onClick="abc();"/> <input type="button" id="cls" value="Close" onClick="window.close();"/></div>
<div id="footer_wrapper"  style="width:100%;">
  <div id="footer_content" style="width:100%;">
   <!-- <p>24x7 Emergency: *Cardiac  *Neuro  *Paediatric  *General Surgery  *Ortho Poly Trauma Services Available</p>
    <hr />
    <p>Super Bazar,HUZURABAD-505 468,Dist.Karimnagar.*Cell:9441773007, 9959954108,8008036663</p>-->
  </div>
</div>
		  
</div>
</div>
</div>
</body>
</html>