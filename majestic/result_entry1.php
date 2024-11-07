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
	$("#prd").autocomplete("set8.php", {
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
	$("#pname").autocomplete("set08.php", {
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
				include("main_menu.php");
			  ?>
			   <?php 
			   if($name != "admin"){
			   
			   ?>
		<div id="centre" style="height:390px;">
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Result Entry</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="add_result_entry.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Add"/></a></div>
					<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="edit_result.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Edit"/></a></div>
					
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
		          <table border="0" cellpadding="0" cellspacing="0" class="expense_table" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
                          	  <th>UMR No.</th>
							  <th>Bill No.</th>
                              <th>Patient Name</th>
							  <th>Age</th>
							  <th>Gender</th>
							  <th>Status</th>
							   <th>Edit</th>
							   <th>No of prints taken</th>
                          </tr>
						  <?php
							include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = $_REQUEST['pname'];
								if($prdname != "" & $pname != ""){
									$sql = mysqli_query($link,"select distinct mrno, BillNo,Pname,Age,Sex from reportentry1 where BillNo='$prdname' and Pname='$pname' order by id desc")or die(mysqli_error($link));
								}elseif($prdname != ""){
									$sql = mysqli_query($link,"select  distinct a.mrno,a.BillNO,b.BillNo,b.Pname,b.Age,b.Sex from reportentry1 b ,mbill1 a where b.BillNo='$prdname'and a.BillNo=b.BillNo order by b.id desc")or die(mysqli_error($link));
								
								}elseif($pname != ""){
									$sql = mysqli_query($link,"select  a.mrno,a.BillNO,b.BillNo,b.Pname,b.Age,b.Sex from reportentry1 b ,bill a where b.Pname='$pname'and a.BillNo=b.BillNo order by b.id desc")or die(mysqli_error($link));
								
								}
							}else{
								$sql = mysqli_query($link,"select distinct a.mrno,a.BillNo,b.BillNo,b.Pname,b.Age,b.Sex from reportentry1 b,bill a  where a.BillNo=b.BillNo and  b.user='$name' order by b.id desc")or die(mysqli_error($link));
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
									$blno = $row[1];
									$sql1 = mysqli_query($link,"select * from mbill1 where BillNO='$blno'")or die(mysqli_error($link));
									if($sql1){
										$row1 = mysqli_fetch_array($sql1);
										 $bamt = $row1['BalanceAmount'];
										
									}
									$pq="select * from click_count where billno='$blno'";
									$sql1=mysqli_query($link,$pq)or die(mysqli_error($link));
									if($sql1){
									$r=mysqli_fetch_array($sql1);
									$count2=$r['count1'];
									$b=$r['billno'];
									}
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
							  
                              <td><?php echo $row[0] ?></td>
							  <td><?php echo $row[1] ?></td>
							  <td><?php echo $row[3] ?></td>
							  <td><?php echo $row[4] ?></td>
                               <td><?php echo $row[5] ?></td>
							 <td>
								<?php  if($bamt <= 0){ ?>
									<a href="#" onclick="window.open('sample2.php?bno=<?php echo $row['BillNo'] ?>','mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')"><img src="images/green.png" height="22"/></a>
								<?php }else{ ?>
									<a href="#" ><input type="button" value="Pay Due" style="color:#FFF;font-size:11px;font-weight:bold;width:70px;height:22px;background-image:url(images/red.jpg);border-style:none;" /></a>
								<?php } ?>
							 </td>
							 <td><a href="edit_result1.php?bno=<?php echo $row['BillNo'] ?>"><img src="images/edit1.jpg" height="21"/></a></td>
							 <td><?php if($b == $blno){ ?>
									<?php echo $count2; ?>
								<?php }else{?>
							<?php 	echo "0"; ?>
								<?php }?></td>
                          </tr>
						 <?php } } } } ?>
						 </tbody> 
						 
				</table>
				
				<?php }else{?>
				
				<div id="centre" style="height:390px;">
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Result Entry</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="madd_result_entry.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Add"/></a></div>
					<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="edit_result.php"><input type="button" class="butt" style="width:120px;height:35px;" value="Edit"/></a></div>
					
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
		          <table border="0" cellpadding="0" cellspacing="0" class="expense_table" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
                              <th>UMR No.</th>
							  <th>Bill No.</th>
                              <th>Patient Name</th>
							  <th>Age</th>
							  <th>Gender</th>
							  <th>Status</th>
							   <th>Edit</th>
							   <th>No of prints taken</th>
                          </tr>
						  <?php
							include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = $_REQUEST['pname'];
								if($prdname != "" & $pname != ""){
									$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry1 where BillNo='$prdname' and Pname='$pname' order by id desc")or die(mysqli_error($link));
								}elseif($prdname != ""){
									$sql = mysqli_query($link,"select  distinct a.mrno,a.BillNO,b.BillNo,b.Pname,b.Age,b.Sex from reportentry1 b ,mbill1 a where b.BillNo='$prdname'and a.BillNo=b.BillNo order by b.id desc")or die(mysqli_error($link));
								
								}elseif($pname != ""){
									$sql = mysqli_query($link,"select  a.mrno,a.BillNO,b.BillNo,b.Pname,b.Age,b.Sex from reportentry1 b ,mbill a where b.Pname='$pname'and a.BillNo=b.BillNo order by b.id desc")or die(mysqli_error($link));
								
								}
							}else{
								$sql = mysqli_query($link,"select distinct a.mrno,a.BillNo,b.BillNo,b.Pname,b.Age,b.Sex from reportentry1 b,mbill1 a  where a.BillNo=b.BillNo and  b.user='$name' order by b.id desc")or die(mysqli_error($link));
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
									$blno = $row[1];
									$sql1 = mysqli_query($link,"select a.BillNo,b.BalanceAmount from mbill a,mbill1 b where a.BillNo=b.BillNo and b.BillNO='$blno'")or die(mysqli_error($link));
									if($sql1){
										$row1 = mysqli_fetch_array($sql1);
										$bamt = $row1['BalanceAmount'];
										
									}
									$pq="select * from click_count where billno='$blno'";
									$sql1=mysqli_query($link,$pq)or die(mysqli_error($link));
									if($sql1){
									$r=mysqli_fetch_array($sql1);
									$count2=$r['count1'];
									$b=$r['billno'];
									}
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
							  
                              <td><?php echo $row[0] ?></td>
							  <td><?php echo $row[1] ?></td>
							  <td><?php echo $row[3] ?></td>
							  <td><?php echo $row[4] ?></td>
                              <td><?php echo $row[5] ?></td>
							 <td>
								<?php if($bamt <= 0 ){ ?>
									<a href="#" onclick="window.open('sample5.php?bno=<?php echo $row['BillNo'] ?>','mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')"><img src="images/green.png" height="22"/></a>
								<?php }else{ ?>
									<a href="#" ><input type="button" value="Pay Due" style="color:#FFF;font-size:11px;font-weight:bold;width:70px;height:22px;background-image:url(images/red.jpg);border-style:none;" /></a>
								<?php } ?>
							 </td>
							 <td><a href="edit_result1.php?bno=<?php echo $row['BillNo'] ?>"><img src="images/edit1.jpg" height="21"/></a></td>
                          <td><?php if($b == $blno){ ?>
									<?php echo $count2; ?>
								<?php }else{?>
							<?php 	echo "0"; ?>
								<?php }?></td>
						  </tr>
						 <?php } } } } ?>
						 </tbody> 
						 
				</table>
				
				<?php }?>
				
				
				   <table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody><tr>
					<td width="813">&nbsp;</td>
					<td align="left" width="34"></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a href="result_entry.php?next=0" ><?php } ?><img src="images/first.gif" alt="First" border="0" ></a></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a  href="result_entry.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" border="0" ></a></td>
				   <td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="result_entry.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" alt="Next" border="0" ></a></td>
					<td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="result_entry.php?next=<?php echo (($records - 1) / $nd) ?>"><?php } ?><img src="images/last.gif" alt="Last" border="0" ></a></td>
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