<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SESSION['name1']) {
    $remainig_records = -1;
    $rowscounts = 0;
    $tot = 0;
    $m = 0;
    $pagecount = 0;
    $nd = 10;

    $no2 = isset($_REQUEST['no']) ? $_REQUEST['no'] : null;	
    if (!empty($no2) && $no2 !== "0") {
        $nd = $no2;
    }

    $pagecounter = isset($_REQUEST['next']) ? $_REQUEST['next'] : "";
    if (!empty($pagecounter)) {
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
	$("#name").autocomplete("pemp.php", {
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
		<div id="centre">
			
          <h1 style="color:red;" align="center">EMPLOYEE LIST</h1>
          
          
          <form name="frm" method="post" >
                
<table width="100%" border="0" cellspacing="1" cellpadding="1">
             <tr>
                <td width="68" class="label1"><a href="addemployee.php" title="Add New Record"><img src="images/add1.gif"></a></td>
				<form name="frm" method="post" >
                <td class="label1">Search By Employee Name: 
                <input id=\"prd\" list=\"city1\" name="name"  class="text"required >
<datalist id=\"city1\" >

<?php  include("config.php");
$sql="select distinct emp_name from hr_emp ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[emp_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                <!--<input type="text" name="name" id="name" required/>--></td>
				<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
				</form>
                </td>
                                   
			</tr>
            </table></td>
          </tr>
		  <tr height="10"></tr>
		   <tr>
            <td><table width="100%" border="0" cellpadding="0"  cellspacing="0"  id="expense_table" style="font-size:14px;">
              <thead>
                <tr height="30px">
				<th >S.No.</th>
                 <th >Employee Name </th>
                  <th >Designation</th>
                  <th >Qualification</th>
                   <th >Salary</th>
				     <th >Edit </th>
  					<!----------- <th class="TH1">View </th>-->
                 
				
                </tr>
                <?php
				include("config.php");
				if(isset($_REQUEST['submit'])){
				$d=$_REQUEST['name'];
				$sqls=mysqli_query($link,"SELECT * FROM hr_emp where EMP_NAME ='$d'")or die(mysqli_error($link));
				
				$i=1;
				if($sqls){
				$tot=mysqli_num_rows($sqls);
				while($row=mysqli_fetch_array($sqls)){
				$id=$row['EMP_CODE'];
				 $rk=$row['EMP_NAME'];
				 $rk1=$row['DESIGNATION'];
				  $rk3=$row['salary'];
				 $rk2=$row['QUALIFICATION'];

				  //$rk3=$row['tknum1'];

				?>
                <tr height="25px"><td style="text-align:center;"><?php echo $i?></td><td><?php echo $rk?></td><td><?php echo $rk1?></td><td><?php echo $rk2?></td><td style="text-align:center;"><?php echo $rk3?>.00</td><td align="center"><a href="employeeedit.php?id1=<?php echo $id?>"><img src="images/edit.gif" /></a></td></tr>
				<?php $i++; }
				}
				}else{
				$sqls=mysqli_query($link,"SELECT * FROM hr_emp")or die(mysqli_error($link));
				
				$i=1;
				if($sqls){
				$tot=mysqli_num_rows($sqls);
				while($row=mysqli_fetch_array($sqls)){
				$id=$row['EMP_CODE'];
				 $rk=$row['EMP_NAME'];
				 $rk1=$row['DESIGNATION'];
				  $rk3=$row['salary'];
				 $rk2=$row['QUALIFICATION'];
				$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
				?>
				<tr height="25px"><td style="text-align:center;"><?php echo $i?></td><td><?php echo $rk?></td><td><?php echo $rk1?></td><td><?php echo $rk2?></td><td style="text-align:center;"><?php echo $rk3?>.00</td><td align="center"><a href="employeeedit.php?id1=<?php echo $id?>"><img src="images/edit.gif" /></a></td></tr>
				<?php  }$i++;}
				}
				} ?>
                </thead></table></td></tr></table>
				
				<?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>


          
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="pemployee.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="pemployee.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="pemployee.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="pemployee.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
	  </tr>
	</table>
	<table>
	<?php if ($rowscounts == 0) { ?>
           <tr >
           <td colspan="9" ><div align="right"><font color="#FF6600">No More Records</font> </div></td>
            </tr> 
	<?php } ?>
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