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
	body{
	padding-top:0px;
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

	
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td style="width:10px;">
	  <table style="height:60px;"></table></td>
        </tr>
	<?php
			include("config.php");

			$bno = $_REQUEST['bno'];
			
			$sql= mysql_query("select b.BillDate,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount from mbill2 b,mbill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			if($sql)
			{
				$row = mysql_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['BillDate']));
				$patname = $row['PatientName'];
				
				$age = $row['Age'];
				$gender = $row['Sex'];
				$dname = $row['DoctorName'];
				$total =$row['Total'];
				$consamt = $row['Discount'];
				$namt = $row['NetAmount'];
				$paid = $row['PaidAmount'];
				$bal = $row['BalanceAmount'];
				$ctype = $row['conce_type'];
				$ptype = $row['ptype'];
	
			}		
				
		?>
    <tr colspan="2"><td height="22">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:10px;" cellpadding="0" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
			 <tr height="25"> </tr>
         <tr>
          <td style="padding-left:20px;"><div align="left">Patient Name </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $patname ?></b></td>
            
            <td style="padding-left:20px;" width="15%"><div align="left">Date </div></td>
			<td style="padding-left:20px;" width="35%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
         
           <td style="padding-left:20px;" width="15%"><div align="left">Bill No. </div></td>
			<td style="padding-left:20px;" width="35%"> : <b><?php echo $bno ?></b></td>
           
            <td style="padding-left:20px;"><div align="left">Age / Sex </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
			
			  <tr>
           
            <td style="padding-left:20px;"><div align="left">Doctor  Name </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $dname ?></b></td>
			<td style="padding-left:20px;"><div align="left">Patient Type </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $ptype ?> / <?php echo $ctype ?></b></td>
          
          </tr>
		  	
		  <tr>
			<td colspan="4">
			<table align="center" width="100%" style="border-top:1px solid #000000;border-bottom:1px solid #000000;" cellpadding="0" cellspacing="0">
				<tr >
					<td width="70%" style="padding-left:50px;color:red;" align="left" ><b><u>Test Name</u></b></td>
					<td align="left" style="color:red;"><b><u>Amount</u></b></td>
					
				</tr>
				
			<?php	
				$sql1=mysql_query("SELECT TestName,Amount FROM mbill2 WHERE BillNO = '$bno'");
				if($sql1){
				while($row1 = mysql_fetch_array($sql1)){
				
				?>	
				<tr>
				
				<td style="padding-left:50px;" align="left"><?php echo $row1['TestName'] ?></td>
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
         
			 <td style="padding-left:20px;" align="left">Net Total </td>
			 <td style="padding-left:20px;"> : <b><?php echo number_format($namt,2) ?></b></td>
              <td style="padding-left:20px;" align="left">Paid Amount</td><td style="padding-left:20px;"> : <b><?php echo number_format($paid,2) ?></b> </td>
            </tr>
          <tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td><div style="padding-left:20px;" align="left">Balance </div></td>
			<td style="padding-left:20px;"> : <b><?php echo number_format($bal,2) ?></b> </td>
            </tr>
			
         <tr>
            <td class="label1"  colspan="4"><br/><br/><br/>
			  </td>
            </tr>
			<tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td class="label1" >&nbsp;</td>
			<td style="padding-left:20px;font-size:14px;" >  <b>Incharge</b> </td>
            </tr>
			
			<tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td class="label1" >&nbsp;</td>
			<td style="padding-left:20px;font-size:14px;">  <b><?php echo $empname; ?></b> </td>
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
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="self.location='manual_lab_bill.php'"/></td>
      </tr>
        </table>
		  

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