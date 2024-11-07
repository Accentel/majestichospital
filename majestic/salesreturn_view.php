<?php 

session_start();
include("config.php");
if($_SESSION['name1'])
{
	$aname = $_SESSION['name1'];
	$lr_id=$_REQUEST['lr_id'];
	
	$res=mysqli_query($link,"select billing_type,cust_name,inv_no,sales_type,sal_date,total,lr_no from phr_salreturn_mast where lr_no='$lr_id' ")or die(mysqli_error($link));
	if($res){
		$row = mysqli_fetch_array($res);
		$btype=$row[0];
		$custname=$row[1];
		$invno=$row[2];
		$stype=$row[3];
		$saledate=$row[4];
		$total=$row[5];
		$lr_no=$row[6];
		if($stype == "C")
		{
			$stype="Credit/Debit Card";
		}
		if($stype == "B")
		{
			$stype="Bank";
		}
		if($stype == "Q")
		{
			$stype="Cheque";
		}
	}
$res1=mysqli_query($link,"select  a.product_code,b.product_name,b.batch_no,b.mfg_date,b.exp_date,a.r_qty,a.u_rate,a.value,balance_qty from phr_salreturn_dtl as a,phr_purinv_dtl as b where a.batch_no=b.batch_no and a.product_code=b.product_code and a.mfg_dt=b.mfg_date and a.exp_date=b.exp_date and a.lr_no='$lr_id'")or die(mysqli_error($link));
 
$res2=mysqli_query($link,"Select patientname from patientregister where registerno='$custname' ")or die(mysqli_error($link));
while($row2 = mysqli_fetch_array($res2)){$custname=$row2[0];} 
 ?>
<?php include('config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
			include("header.php");
		?>
</head>

	<body>

	<div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?>
		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">SALES RETURN</h1>
           <form name="form" method="post" autocomplete="off"  >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   
  <tr>
    <td colspan="2" class="mainbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            
      
      <tr>
        <td height="400" valign="top" class="box_midlebg" align="center"><br>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="5" cellpadding="2">
			  
                  <tr>
                    <td width="18%" class="label1"><div align="right">Customer Name:</div></td>
                   <td width="31%" align="left"><?php echo $custname ?></td>
				 
			</tr>
			
                
                <tr>
				  <td class="label1"><div align="right">Billing Type:</div></td>
				  <td align="left"><?php echo $btype ?></td>
				  </tr>
				<tr>
				<td class="label1"><div align="right">Sale Date:</div></td>
                <td width="31%" align="left"><?php echo $saledate ?></td>
				</tr>
				
              </table></td>
          </tr>
			<tr><td><table id="t1" width="100%">
           <tr><td align="center"><div id="invgtable" valign="top">
            <table width="100%" id="TABLE1">
              <thead>
              	 <tr>
				   <th class="TH1">P.Code</th>
				   <th class="TH1">P.Name </th>
					 <th class="TH1">Batch No</th>
				   <th class="TH1">MFG.Dt</th>
				   <th class="TH1">EXP.Dt</th>
				   
				   <th class="TH1">RQty</th>
				  <th class="TH1">URate</th>
					<th class="TH1">Value</th>
				   </tr>
				   </thead>
					<tbody>
						<?php
						if($res1){
						while($row1 = mysqli_fetch_array($res1)){
							$pcode=$row1[0];
							$pname=$row1[1];
							$batch=$row1[2];
							$mfg=$row1[3];
							$exp=$row1[4];
							$uqty=$row1[5];
							$urate=$row1[6];
							$value=($uqty*$urate);
							$noitems=$row1[8];
						?>
                               <tr> 
							   
						<td class="TD1"><?php echo $pcode ?></td>
						<td class="TD1"><?php echo $pname ?></td>
							<td class="TD1"><?php echo $batch ?></td>
						<td class="TD1"><?php echo $mfg ?></td>
						<td class="TD1"><?php echo $exp ?></td>
       
						<td class="TD1"><?php echo $uqty ?></td>
						<td class="TD1"><?php echo $urate ?></td>
						<td class="TD1"><?php echo $value ?></td>
						<?php $total=round(($total+$value)*100)/100; ?>
						
                             </tr>
						<?php } } ?>
                           </tbody>
 

 </table>
 
 </div>
 </td>
  
  </tr>

             <tr>
            <td height="4" colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
              
              
              <tr>
                <td width="45%">&nbsp;</td>
                <td width="33%"><div align="right"><span class="label1">Return Total:</span></div></td>
                <td width="22%"><?php echo $total ?></td>
              </tr>
               <tr>
			    <td width="45%" class="label1" ><div align="right">
      
  </div>
                    <td width="47%" class="label1" ><div align="left">
					 <input type="button" class="butt" value="Close" onclick="window.location.href='salesreturn.php'"/></div></td></tr>
              </table></td>
            </tr>
          </table>
          <p><br>
          </p>
          </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="../images/box_botmleft.gif" alt="1" width="10" height="10" /></td>
            <td background="../images/box_botmbg.gif"><img src="../images/box_botmbg.gif" alt="1" width="1" height="10" /></td>
            <td width="10" height="10"><img src="../images/box_botmright.gif" alt="1" width="10" height="10" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
 </form>
			</div>

		<?php include('footer.php'); ?>

	</div>

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