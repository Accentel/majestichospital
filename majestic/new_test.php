<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	

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
	$("#prd").autocomplete("set3.php", {
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
	$("#prd1").autocomplete("set4.php", {
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

	<div id="conteneur container">

		  <?php
				include("logo.php");
			  ?>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto; min-height:390px;">
		  
			
         <h1>Lab Tests Details</h1>
                
					<div align="left" style="margin-bottom:2px;float:left;">
                    
                    <a href="add_test.php" title="Add New Record"><img src="images/add1.gif"></a>
                   </div>
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Department Name :
                    <input id=\"prd\" list=\"city1\" class="text" name="prd" required >
<datalist id=\"city1\" >

<?php  include("config.php");
$sql="select distinct Department from testdetails ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[Department]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                    
                     <!--<input type="text" class="text" name="prd" id="prd"/>--> Test Name :
                     
                     <input id=\"prd1\" list=\"city2\" class="text" name="prd1" required >
<datalist id=\"city2\" >

<?php  include("config.php");
$sql="select distinct TestName from testdetails ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[TestName]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                      <!--<input type="text" class="text" name="prd1" id="prd1"/>--> 
                    
                    <input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" />
                      <!--<input type="submit" name="submit" class="butt" value="Go"/>--></div>
					</form>
					<div class="table-responsive">
		          <table border="0" cellpadding="0" cellspacing="0" class="table" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
							  <th>S No</th>
                              <th>Department Name</th>
							  <th>Test Name</th>
							  <th>Amount</th>
							  <th>Insurance</th>
							  <th>L Type</th>
                              <th>Edit</th>
							  <th>Delete</th>
                          </tr>
						  <?php
							include("config.php");
							if(isset($_REQUEST['submit'])){
								if($_REQUEST['prd'] != ""){
									$prdname = $_REQUEST['prd'];
									$sql = mysqli_query($link,"select distinct Department,TestName,Amount,ltype,iprice,id from testdetails where Department='$prdname' order by id desc")or die(mysqli_error($link));
								}
								if($_REQUEST['prd1'] != ""){
									$phone = $_REQUEST['prd1'];
									$sql = mysqli_query($link,"select distinct Department,TestName,Amount,ltype,iprice,id from testdetails where TestName='$phone' order by id desc")or die(mysqli_error($link));
								}
								if($_REQUEST['prd'] != "" && $_REQUEST['prd1'] != ""){
									$prdname = $_REQUEST['prd'];
									$phone = $_REQUEST['prd1'];
									$sql = mysqli_query($link,"select distinct Department,TestName,Amount,ltype,iprice,id from testdetails where Department='$prdname' and TestName='$phone' order by id desc")or die(mysqli_error($link));
								}
							}else{
								$sql = mysqli_query($link,"select  Department,TestName,Amount,ltype,iprice,id from testdetails order by TestName asc")or die(mysqli_error($link));
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
									$i=1;
								while($row = mysqli_fetch_array($sql)){
								
							?>	
						   <tr>
							  <td><?php echo $i; ?></td>
                              <td><?php echo $row['Department'] ?></td>
							  <td><?php echo $row['TestName'] ?></td>
							  
							  <td><?php echo $row['Amount'] ?></td>
							   <td><?php echo $row['iprice'] ?></td>
							  <td><?php echo $row['ltype'] ?></td>
                              <td><a href="edit_test.php?dept=<?php echo $row['Department'] ?>&tname=<?php echo $row['TestName'] ?>"><img src="images/edit.gif"/></a></td>
							  <td><a onclick="return confirm('Are you sure you want to delete this item?');"  href="delete_test.php?dept=<?php echo $row['id'] ?>"><img src="images/Icon_Delete.png" height="18"/></a></td>
                          </tr>
						 <?php $i++; } } }  ?>
						</tbody>
						 
				</table>
				<table>
					<tr >
					   <td colspan="5"><?php if($rows<=0) {?><div align="right"><font color="#FF6600">No More Records</font> </div><?php }?>
					   </td>
					</tr> 
                   </table> 
				  
				
</div>				
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