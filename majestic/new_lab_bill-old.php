<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
$name=$_SESSION['name1'];
	$remainig_records = -1;//this is used from where the records should display
    $rowscounts = 0;        // if there is any records in next page it became >0 else rowscounts is 0 
    $tot=0;
    $m=0;
    $pagecount = 0;// it is used for page number
    $nd =10;//no of records per page
		/*view records*/
		//String no2=null;
    $no2=$_REQUEST['no'];
	if(!($no2==null) && !("0"==$no2)){$nd=$no2;}
		/*view records*/
    $pagecounter = "";
    $pagecounter = $_REQUEST['next'];
        if ($pagecounter != "") {
            $pagecount = $pagecounter;
        }
   
    $rowstart = ($pagecount * $nd);
    $rowend = ($rowstart + ($nd - 1));
    $records = 0;

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
 <script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#prd").autocomplete("set6.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>	
<script>
$().ready(function() {
	$("#pname").autocomplete("set06.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>	
	</head>

	<body>

	<div id="conteneur">

		 <?php
				include("logo.php");
			  ?>
			
			  <?php
				include("main_menu.php");
			  ?>
			   <?php 
			   
			    if($_SESSION['name1'] != "admin"){
				?>
		<div id="centre" style="height:420px;">
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Lab Bill Payment</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="pay_bill.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Add"/></a></div>
					<!--<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="pay_due_bill.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Pay Due Bill"/></a></div>
					-->
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
		          <table border="0" cellpadding="0" cellspacing="0" class="expense_table" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
                          <th width="20%">UMR No.</th>
							  <th width="20%">Bill No.</th>
                              <th width="30%">Patient Name</th>
							   
								  <th width="30%">P Tpe</th>
							  <th width="10%">Total</th>
							  <th width="10%">Paid</th>
							  <th width="10%">Due</th>
							  <!--<th>Edit</th>-->
							  <th width="10%">Print</th>
                                                    
							  <th width="10%">Edit</th>
							   <!-- <th width="10%">Add</th>-->
							   <th width="10%">Due</th>
							  <!-- <th width="10%">Delete</th>-->
                          </tr>
						  <?php
							include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = trim($_REQUEST['pname']);
								
								if($prdname != "" & $pname != ""){
									$sql = mysql_query("select distinct mrno,BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1 where BillNO='$prdname' and PatientName='$pname' order by bid desc");
								}elseif($prdname != ""){
								 $s="select distinct mrno,BillNO,PatientName,NetAmount,ptype,PaidAmount,BalanceAmount from bill1 where BillNO='$prdname' order by bid desc";
									$sql = mysql_query($s);
								
								}
								elseif($pname != ""){
								echo $s1="select distinct mrno,BillNO,PatientName,NetAmount,ptype,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' ";
								//echo $p="select distinct BillNO,PatientName,Total,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' order by bid desc";
									$sql = mysql_query($s1);
								
								}
							}else{
								$sql = mysql_query("select  a.mrno,a.BillNO,a.PatientName,a.NetAmount ,a.PaidAmount,a.BalanceAmount,b.ptype,b.conce_type,b.BillNO  from bill1 a,bill b where a.BillNO=b.BillNO   GROUP BY  a.BillNO  order by a.bid desc limit 150");
							}
							if($sql){
								$rows=mysql_num_rows($sql);
								if($rows > 0){
								while($row = mysql_fetch_array($sql)){
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
							  <td><?php echo $row['mrno'] ?></td>
                              <td><?php echo $row['BillNO'] ?></td>
							  <td><?php echo $row['PatientName'] ?></td>
							
							   
							   
							   
							  
							    <td><?php echo $row['ptype'] ?></td>
							  <td><?php echo $row['NetAmount'] ?></td>
							  <td><?php echo $row['PaidAmount'] ?></td>
							   <td><?php echo $row['BalanceAmount'] ?></td>
							   
							  <td><a href="#" onclick="window.open('bill_rec2.php?bno=<?php echo $row['BillNO'] ?>','mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')" target="new"><img src="images/green.png" height="22"/></a></td>
                                                       
                                                          <td><a href="edit_lab_bill.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/edit1.jpg" height="21"/></a></td>
														 <!-- <td><a href="add_lab_bill.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/add.png" height="21"/></a></td>-->
														  <td><a href="pay_due_bill.php?q=<?php echo $row['BillNO'] ?>"><img src="images/pay.png" height="21"/></a></td>
														   <!--<td><a href="deletebill.php?q=<?php// echo $row['BillNO'] ?>"><img src="images/Icon_Delete.png" height="21"/></a></td>-->
                          
						  </tr>
						 <?php } } } } ?>
						 </tbody> 
						 
				</table>
				
				<?php }else{?>
				
				<div id="centre" style="height:420px;">
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Lab Bill Payment</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="pay_bill.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Add"/></a></div>
					<!--<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="pay_due_bill.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Pay Due Bill"/></a></div>-->
					
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
		          <table border="0" cellpadding="0" cellspacing="0" class="expense_table" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
                           <th width="20%">UMR No.</th>
							  <th width="20%">Bill No.</th>
                              <th width="30%">Patient Name</th>
							   
							    <th width="30%">P Type</th>
							  <th width="10%">Total</th>
							  <th width="10%">Paid</th>
							  <th width="10%">Due</th>
							  <!--<th>Edit</th>-->
							  <th width="10%">Print</th>
                                                    
							  <th width="10%">Edit</th>
							   <th width="10%">Add</th>
							   <th width="10%">Due</th>
							   <th width="10%">Delete</th>
                          </tr>
						  <?php
							include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = trim($_REQUEST['pname']);
								if($prdname != "" & $pname != ""){
									$sql = mysql_query("select distinct mrno, BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1 where BillNO='$prdname' and PatientName='$pname' order by bid desc");
								}elseif($prdname != ""){
								 $s="select distinct mrno, BillNO,PatientName,ptype,NetAmount,PaidAmount,BalanceAmount from bill1 where BillNO='$prdname' order by bid desc";
									$sql = mysql_query($s);
								
								}
								elseif($pname != ""){
								 $s1="select distinct mrno,BillNO,PatientName,ptype,NetAmount,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' ";
								//echo $p="select distinct BillNO,PatientName,Total,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' order by bid desc";
									$sql = mysql_query($s1);
								
								}
							}else{
								$sql = mysql_query("select  a.mrno,a.BillNO,a.PatientName,a.NetAmount ,a.PaidAmount,a.BalanceAmount,b.ptype,b.conce_type,b.BillNO  from bill1 a,bill b where a.BillNO=b.BillNO     GROUP BY  a.BillNO  order by a.bid desc limit 150");
							}
							if($sql){
								$rows=mysql_num_rows($sql);
								if($rows > 0){
								while($row = mysql_fetch_array($sql)){
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
                            <td><?php echo $row['mrno'] ?></td>
							  
                              <td><?php echo $row['BillNO'] ?></td>
							  <td><?php echo $row['PatientName'] ?></td>
							 
							  <td><?php echo $row['ptype'] ?></td>
							  <td><?php echo $row['NetAmount'] ?></td>
							  <td><?php echo $row['PaidAmount'] ?></td>
							   <td><?php echo $row['BalanceAmount'] ?></td>
							   
							  <td><a href="#" onclick="window.open('bill_rec2.php?bno=<?php echo $row['BillNO'] ?>','mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')" target="new"><img src="images/green.png" height="22"/></a></td> 
                                                          
                                                          <td><a href="edit_lab_bill1.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/edit1.jpg" height="21"/></a></td>
														  <td><a href="add_lab_bill.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/add.png" height="21"/></a></td>
														  <td><a href="pay_due_bill.php?q=<?php echo $row['BillNO'] ?>"><img src="images/pay.png" height="21"/></a></td>
														   <td><a href="deletebill.php?q=<?php echo $row['BillNO'] ?>"><img src="images/Icon_Delete.png" height="21"/></a></td>
                          
						  </tr>
						 <?php } } } } ?>
						 </tbody> 
						 
				</table>
				
				
				
				<?php }?>
				<table>
					<tr >
					   <td colspan="5"><?php if($rows<=0) {?><div align="right"><font color="#FF6600">No More Records</font> </div><?php }?>
					   </td>
					</tr> 
                   </table> 
				   <table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody><tr>
					<td width="813">&nbsp;</td>
					<td align="left" width="34"></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a href="new_lab_bill.php?next=0" ><?php } ?><img src="images/first.gif" alt="First" border="0" ></a></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a  href="new_lab_bill.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" border="0" ></a></td>
				   <td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="new_lab_bill.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" alt="Next" border="0" ></a></td>
					<td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="new_lab_bill.php?next=<?php echo (($records - 1) / $nd) ?>"><?php } ?><img src="images/last.gif" alt="Last" border="0" ></a></td>
				  </tr>
				</tbody>
				</table>
				<table>
				<?php if ($rowscounts == 0) { ?>
					   <div align="right"><font color="#FF6600">No More Records</font> </div>
						
				<?php } ?>
				</table>			
			</div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 
mysql_close();

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>