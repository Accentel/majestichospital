<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
	$aname = $_SESSION['name1'];
 ?>
<?php
include("config.php");

$lr_id=$_REQUEST['id'];
$sql = mysqli_query($link,"select a.suppl_code,b.suppl_name,b.addr1,b.city,PUR_RETURNNO,pur_type,RETURN_INV_NO,inv_date,rec_date,total from phr_pur_returns_mast as a,phr_supplier_mast as b where a.lr_no='$lr_id' and a.suppl_code=b.suppl_code")or die(mysqli_error($link));
if($sql){
$row = mysqli_fetch_array($sql);

$scode=$row[0];
$sname=$row[1];
$sadd=$row[2];
$scity=$row[3];
$pret=$row[4];
$ptype=$row[5];
$invno=$row[6];
$invdt=date('d-m-Y',strtotime($row[7]));
$recdt=date('d-m-Y',strtotime($row[8]));
$total=$row[9];
}

$sql1 = mysqli_query($link,"select a.product_code,product_name,a.batch_no,vat,s_qty,r_rate,r_qty,total,manf_by from phr_pur_returns_dtl as a,phr_purinv_dtl as b where a.inv_id=b.inv_id and a.lr_no='$lr_id'")or die(mysqli_error($link));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>

<style>
.style2{
	color:red;
}
</style>
</head>
<body >

	<div id="conteneur">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
		
			include("main_menu.php");
			?>
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">PURCHASE RETURN</h1>
		  <form name="form"  autocomplete="off" method="post">
		  <input type="hidden" name="authby" value="<?php echo $aname ?>" />
          <table width="100%" border="0" cellspacing="5" cellpadding="2">
              <tr>
                <td width="23%" class="label"><div align="right">Supplier Code<span class="style2">*</span>:</div></td>
                <td  align="left"><?php echo $scode ?></td>
              
                <td width="23%" class="label"><div align="right">Supplier Name<span class="style2">*</span>:</div></td>
                <td  align="left"><?php echo $sname ?></td>
              </tr>
			    <tr>
			      <td class="label"><div align="right">Address:</div></td>
			      <td align="left"><?php echo $sadd ?></td>
			      <td class="label"><div align="right">City:</div></td>
			      <td align="left"><?php echo $city ?></td>
			    </tr>
			    <tr>
			      
                  <td class="label"><div align="right">Invoice No<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $invno ?></td>
				  <td class="label"><div align="right">Purchase Return No<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $pret ?></td>
			    </tr>
				<tr>
				  <td class="label"><div align="right">Purchase Type<span class="style2">*</span>:</div></td>
				  <td align="left"><?php echo $ptype ?></td>
                  <td class="label"><div align="right">Invoice Date<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $invdt ?>
                    
					</td>
				</tr>
				<tr>
				  <td class="label">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td class="label"><div align="right">Received Date<span class="style2">*</span>:</div></td>
				  <td><div align="left">
                      <?php echo $recdt ?>
                  </div>
				  </td>
				</tr>
				
        
            </table>
			<table id="t1" width="100%">
			<tr><td></td>
            	   
           <tr><td width="100%" align="center"><br />

<div id="purtable" valign="top">

            <table width="100%" id="TABLE1">
              <thead>
                 <tr>
                  <!-- <th width="7%" class="TH1">P.Code</th>-->
                   <th width="15%" class="TH1">P.Name </th>
				    <th width="15%" class="TH1">Mnf.By </th>
                   <th width="10%" class="TH1">Batch.NO</th>
				    <th width="5%" class="TH1">Vat</th>
                   <th width="7%" class="TH1">Tot.Qty</th>
                    <th width="9%" class="TH1">Rate</th>
				  <th width="9%" class="TH1">Rtrn.Qty</th>
 				  <th width="9%" class="TH1">Amount</th>
                 
                 </tr>
               </thead>
   <tbody>
    <?php
		if($sql1){
		
		while($row1 = mysqli_fetch_array($sql1))
		 {	
			
			 ?>
        <tr> 
 		
	<!--	<td width="7%" class="TD1"><?php// echo $row1[0] ?></td>-->
		<td width="15%" class="TD1"><?php echo $row1[1] ?></td>
		<td width="15%" class="TD1"><?php echo $row1[8] ?> </td>
		<td width="10%" class="TD1"><?php echo $row1[2] ?></td>
		<td width="5%" class="TD1"><?php echo $row1[3] ?></td>
		<td width="7%" class="TD1"><?php echo $row1[4] ?></td>
		<td width="9%" class="TD1"><?php echo $row1[5] ?></td>
		<td width="9%" class="TD1"><?php echo $row1[6] ?></td>
		<td width="9%" class="TD1"><?php echo $row1[7] ?></td>
				  
       
        </tr> <?php
		
		
		} 
		}?>
   </tbody>
 </table>

 </div>
 </td>
 
  
  </tr>


</table>
<input type="hidden" name="rows" id="rows" value="0" >
<table width="100%" >
              	   <tr height="40">
              	     <td colspan="6" class="label">&nbsp;</td>
              	     </tr>
              	   
 

              	 <tr>
                   <td width="80%" class="label1">Total (Include discount) : </td>
                <td width="20%" align="left"><?php echo $total ?></td>
            	   </tr>
				   <tr height="10"></tr>
              	 </table>
				 <div align="center">
              <input type="button" value="Close" class="butt" onclick = "window.location.href='purchase_return_list.php'" > 
            </div>
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