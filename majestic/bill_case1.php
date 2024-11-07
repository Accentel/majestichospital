<?php //include('config.php');
include('config.php');
session_start();

if($_SESSION['name1'])

{
$emp_id = $_SESSION['name1'];
$r=mysql_query("select ename from login where username='$emp_id'");
$row=mysql_fetch_array($r);
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
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Diagnostics</u></b></h2></td></tr>
  </THEAD>
	<?php
			include("config.php");

			//$bno = $_REQUEST['bno'];
			$mr=$_REQUEST['patno'];
			//$sq=mysql_query("SELECT * FROM `ip_pat_admit` where PAT_NO='$pid'");
			//$r=mysql_fetch_array($sq);
			// $mr=$r['PAT_REGNO'];
			
			$sql= mysql_query("select  b.BillNO,b.mrno,b.BillDate,b.phoneno,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,
			b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time from bill b,bill1 b1
			 where b.BillNO=b1.BillNO and b.mrno='$mr'");
			if($sql)
			{
				$row = mysql_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['BillDate']));
				$patname = $row['PatientName'];
				
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
				$BillNO=$row['BillNO'];
	
			}		
				
		?>
    <TBODY>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td  valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:10px;" cellpadding="0" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
			 <tr height="50"> </tr>
             <tr>
          <td style="padding-left:20px;"><div align="left">UMR No </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $mrno ?></b></td>
            
           
            </tr>
          <tr>
         <tr>
          <td style="padding-left:20px;"><div align="left">Patient Name </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $patname ?></b></td>
            
           <td style="padding-left:20px;"><div align="left">Phone No </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $phoneno ?></b></td>
            </tr>
          <tr>
         
           <td style="padding-left:20px;" width="15%"><div align="left">Bill No. </div></td>
			<td style="padding-left:20px;" width="35%"> : <b><?php echo $BillNO ?></b></td>
           
            <td style="padding-left:20px;"><div align="left">Age / Sex </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
			
			  <tr>
           
            <td style="padding-left:20px;"><div align="left">Doctor  Name </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $dname ?></b></td>
			<td style="padding-left:20px;"><div align="left">Patient Type </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $ptype ?> </b></td>
          
          </tr>
		  	 <!--<tr>
           
            
			<td style="padding-left:20px;"><div align="left">Time </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $time1 ?></b></td>
			
          
          </tr>-->
		  <tr>
			<td colspan="4">
			<table align="center" width="100%" style="border-top:1px solid #000000;border-bottom:1px solid #000000;" cellpadding="0" cellspacing="0">
				<tr >
					<td width="70%" style="padding-left:50px;font-size:16px;" align="left" ><b><u>Test Date</u></b></td>
					<td align="left" ><b><u>Test Name</u></b></td>
					
				</tr>
				
			<?php	
				$sql1=mysql_query("SELECT TestName,BillDate FROM bill WHERE mrno = '$mr'");
				if($sql1){
				while($row1 = mysql_fetch_array($sql1)){
				
				?>	
				<tr>
				
				<td style="padding-left:50px;" align="left"><?php echo $patdate=date('d-m-Y',strtotime($row1['BillDate'])); ?></td>
				<td  align="left"><?php echo $row1['TestName'] ?></td>
				</tr>
				<tr><td><br /></td></tr>
				<?php } } ?>
				</table>
			</td>
		  </tr>
           <?php /*?> <?php if($consamt > 0){ ?><tr>
         
			 <td style="padding-left:20px;" width="20%" align="left">Discount</td>
			 <td width="30%" style="padding-left:20px;"> : <b><?php echo number_format($consamt,2) ?></b></td>
              <td width="20%" style="padding-left:20px;">Total </td><td style="padding-left:20px;" width="30%"> : <b><?php echo number_format($total,2) ?></b></td>
            </tr><?php } ?>
			 <tr>
         
			 <td style="padding-left:20px;" align="left">Net Total </td>
			 <td style="padding-left:20px;"> : <b><?php echo number_format($namt,2) ?></b></td>
              <td style="padding-left:20px;" align="left">Paid Amount</td><td style="padding-left:20px;"> : <b><?php echo number_format($paid,2) ?></b> </td>
            </tr>
          <tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td><div style="padding-left:20px;" align="left">Balance </div></td>
			<td style="padding-left:20px;"> : <b><?php echo number_format($bal,2) ?></b> </td>
            </tr><?php */?>
			
         <tr>
            <td class="label1"  colspan="4"><br/><br/><br/>
			  </td>
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
	  
	  <table width="70%" style="font-size:10px;" cellpadding="0" cellspacing="0" >
        <tr height="30"></tr>
		<tr><td ><b><?php if($sstatus1=="T"){ echo $s1; }?></b></td><td valign="top"><div align="right"><b><?php if($sstatus=="T"){ echo $s2; } ?></b></div></td>
      </tr>
	  
	  </table>
	 
	  </td></tr>
	  
    </table>
	</tr>
	</td>
  </tr>
 
 
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="self.location='new_lab_bill.php'"/></td>
      </tr>
      
      
      
      
      
      
      
        </table>
        </TBODY>
        
       <div id="footer_wrapper">
  <div id="footer_content">
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

<?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>