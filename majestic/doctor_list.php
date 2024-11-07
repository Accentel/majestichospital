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
	$("#name").autocomplete("dinfo.php", {
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
		 <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">Doctors Information</h1>
          
                <form name="frm" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Doctor Name :<!-- <input type="text" name="name" id="name" required/>-->

<input id=\"prd\" list=\"city1\" name="name"  class="text"required >
<datalist id=\"city1\" >

<?php  include("config.php");
$sql="select  distinct dname1 from doct_infor ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[dname1]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
</td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>      
				<table border="0" cellpadding="2" cellspacing="2">
				<tr><td width="68" class="label1"><a href="doctor_information.php" ><img src="images/add1.gif"></a></td></tr>
				</table>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="100%" id="expense_table" style="font-size:14px;">
				<tr height="25px"><th>S.No.</th><th>DOCTOR NAME</th><th>DESIGNATION </th><th>DEPARTMENT NAME</th><th>VIEW</th><th>DELETE</th></tr>
				
				
				<?php 
				include("config.php");
				 if(isset($_REQUEST['submit'])){
				$d=$_REQUEST['name'];
				$sqls=mysqli_query($link,"SELECT * FROM doct_infor where dname1='$d'")or die(mysqli_error($link));
				}else{
				$sqls=mysqli_query($link,"SELECT * FROM doct_infor order by id asc")or die(mysqli_error($link));
				
				}
				$tot=mysqli_num_rows($sqls);
				if($tot > 0){
				$i=1;	
				while($row=mysqli_fetch_array($sqls)){
				$id=$row['id'];
				 $rk=$row['dname1'];
				 $rk1=$row['desc1'];
				 $rk2=$row['dept1'];
				 $sql = mysqli_query($link,"select dept_name from dept where dept_code=$rk2")or die(mysqli_error($link));
				 if($sql){
					$res = mysqli_fetch_array($sql);
					$dept = $res[0];
				 }
				 
				  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;

				?>
				<tr height="25px"><td><?php echo $i?></td><td><?php echo $rk?></td><td><?php echo $rk1?></td><td><?php echo $dept?></td><td><a href="doctoredit.php?id1=<?php echo $id?>"><img src="images/edit.gif" /></a></td><td><a href="delet_doct.php?id=<?php echo $id?>"><img src="images/delete.gif" /></a></td></tr>
				<?php }$i++;}
				}
				else{
					echo "No Doctors Information Found";
				}
				?>
				</table>    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="doctor_list.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="doctor_list.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="doctor_list.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="doctor_list.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
	  </tr>
	</table>
	<table>
	<?php if ($rowscounts == 0) { ?>
           <tr >
           <td colspan="9" ><div align="right"><font color="#FF6600">No More Records</font> </div></td>
            </tr> 
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

header('Location:login.php');

}

?>