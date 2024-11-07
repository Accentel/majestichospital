<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SESSION['name1']) {
    // Initialize variables
    $remainig_records = -1; // To determine from where the records should display
    $rowscounts = 0;        // Counter for the number of records in the next page
    $tot = 0;               // Total records
    $m = 0;
    $pagecount = 0;         // Page number
    $nd = 10;               // Number of records per page

    // Check if 'no' exists in the request and assign its value to $no2 variable
    $no2 = isset($_REQUEST['no']) ? $_REQUEST['no'] : null;
    // If 'no' exists and it's not empty or '0', update $nd (number of records per page)
    if (!empty($no2) && $no2 !== "0") {
        $nd = $no2;
    }

    // Check if 'next' exists in the request and assign its value to $pagecounter variable
    $pagecounter = isset($_REQUEST['next']) ? $_REQUEST['next'] : "";
    // If 'next' exists and it's not empty, update $pagecount (page number)
    if (!empty($pagecounter)) {
        $pagecount = $pagecounter;
    }

    // Calculate start and end rows for pagination
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
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">View Lab Patients</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="pay_bill.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Add"/></a></div>
					<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="pay_due_bill.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Pay Due Bill"/></a></div>
					
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
		          <table border="0" cellpadding="0" cellspacing="0" class="expense_table" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
                            <th width="20%">UMR No.</th>
							  <th width="20%">Bill No.</th>
                               <th width="20%">Bill Date.</th>
                              <th width="30%">Patient Name</th>
                              <th width="30%">Age/Sex</th>
							   
								  <th width="30%">P Tpe</th>
							  
							  <!--<th>Edit</th>-->
							 
                               <th width="10%">Result Entry</th>                            
							 
							   <!-- <th width="10%">Add</th>-->
							   
							  <!-- <th width="10%">Delete</th>-->
                          </tr>
						  <?php
							include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = trim($_REQUEST['pname']);
								
								if($prdname != "" & $pname != ""){
									$sql = mysqli_query($link,"select distinct mrno,BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from mbill1 where BillNO='$prdname' and PatientName='$pname' order by bid desc")or die(mysqli_error($link));
								}elseif($prdname != ""){
								 $s="select distinct mrno,BillNO,PatientName,NetAmount,ptype,PaidAmount,BalanceAmount from mbill1 where BillNO='$prdname' order by bid desc";
									$sql = mysqli_query($link,$s)or die(mysqli_error($link));
								
								}
								elseif($pname != ""){
								echo $s1="select distinct mrno,BillNO,PatientName,NetAmount,ptype,PaidAmount,BalanceAmount from mbill1 where PatientName='$pname' ";
								//echo $p="select distinct BillNO,PatientName,Total,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' order by bid desc";
									$sql = mysqli_query($link,$s1)or die(mysqli_error($link));
								
								}
							}else{
								$sql = mysqli_query($link,"select  a.mrno,a.BillNO,a.PatientName,a.NetAmount ,a.PaidAmount,a.BalanceAmount,b.ptype,b.conce_type,b.BillNO  from mbill1 a,mbill b where a.BillNO=b.BillNO and a.user='$name'  GROUP BY  a.BillNO  order by a.bid desc")or die(mysqli_error($link));
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
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
							  
							   
							  
                                                       <td><a href="add_result_entry.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/entry2.png" height="21"/></a></td>    
                                                          
														 <!-- <td><a href="add_lab_bill.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/add.png" height="21"/></a></td>-->
														 
														   <!--<td><a href="deletebill.php?q=<?php// echo $row['BillNO'] ?>"><img src="images/Icon_Delete.png" height="21"/></a></td>-->
                          
						  </tr>
						 <?php } } } } ?>
						 </tbody> 
						 
				</table>
				
				<?php }else{?>
				
				<div id="centre" style="height:420px;">
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">View Lab Patients</div>
                
					
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
		          <table border="0" cellpadding="0" cellspacing="0" class="expense_table" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
                          	<th width="20%">UMR No.</th>
							  <th width="20%">Bill No.</th>
                              <th width="20%">Bill Date.</th>
                              <th width="30%">Patient Name</th>
                               <th width="30%">Age/Sex</th>
							   
							    <th width="30%">P Type</th>
							 
							  <!--<th>Edit</th>-->
							 
                              <th width="10%">Result Entry</th>                            
							 
                          </tr>
						  <?php
							include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = trim($_REQUEST['pname']);
								if($prdname != "" & $pname != ""){
									$sql = mysqli_query($link,"select distinct mrno,BillNO,BillDate,Age,Sex,PatientName,NetAmount,PaidAmount,BalanceAmount from mbill1 where BillNO='$prdname' and PatientName='$pname' order by bid desc")or die(mysqli_error($link));
								}elseif($prdname != ""){
								 $s="select distinct mrno,BillNO,BillDate,Age,Sex,PatientName,ptype,NetAmount,PaidAmount,BalanceAmount from mbill1 where BillNO='$prdname' order by bid desc";
									$sql = mysqli_query($link,$s)or die(mysqli_error($link));
								
								}
								elseif($pname != ""){
								 $s1="select distinct mrno,BillNO,BillDate,Age,Sex,PatientName,ptype,NetAmount,PaidAmount,BalanceAmount from mbill1 where PatientName='$pname' ";
								//echo $p="select distinct BillNO,PatientName,Total,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' order by bid desc";
									$sql = mysqli_query($link,$s1)or die(mysqli_error($link));
								
								}
							}else{
								$sql = mysqli_query($link,"select  a.mrno,a.BillNO,a.PatientName,a.NetAmount ,a.PaidAmount,a.BalanceAmount,b.ptype,b.conce_type,b.BillNO,b.BillDate,b.Age,b.Sex  from mbill1 a,mbill b where a.BillNO=b.BillNO     GROUP BY  a.BillNO  order by a.bid desc")or die(mysqli_error($link));
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
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
                               <td><?php echo date('d-m-Y',strtotime($row['BillDate'])); ?></td>
							  <td><?php echo $row['PatientName'] ?></td>
                               <td><?php echo $row['Age']."/".$row['Sex'] ?></td>
							 
							  <td><?php echo $row['ptype'] ?></td>
							 
							   <td><a href="madd_result_entry.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/entry2.png" height="21"/></a></td>
                                                          
                                                        
                          
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
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a href="view_paitients1.php?next=0" ><?php } ?><img src="images/first.gif" alt="First" border="0" ></a></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a  href="view_paitients1.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" border="0" ></a></td>
				   <td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="view_paitients1.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" alt="Next" border="0" ></a></td>
					<td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="view_paitients1.php?next=<?php echo (($records - 1) / $nd) ?>"><?php } ?><img src="images/last.gif" alt="Last" border="0" ></a></td>
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

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>