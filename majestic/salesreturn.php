<?php
error_reporting(E_ERROR | E_PARSE); // Display errors only for fatal errors and parse errors

// Your PHP code
// ...
?>
<?php
ini_set('display_errors', '0'); // Turn off error display
ini_set('display_startup_errors', '0'); // Turn off display of PHP startup errors

// Your PHP code
// ...
?>
<?php //include('config.php');

session_start();

if($_SESSION['name1'])
{
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
	</head>

	<body>

	<div id="conteneur">

		 <?php /*?> <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
			<?php
			include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">SALES RETURN LIST</h1>
          <form name="frm" method="post" >
                
<table width="100%" border="0" cellspacing="5" cellpadding="1">
             <tr>
                <td width="68" class="label1"><a href="addsalesereturn.php" title="Add New Record"><img src="images/add1.gif"></a></td>
          
                <td width="463" class="label1" ></td>
                <td width="153">
                </td><td style="text-align:right;">Sales Date:</td>
                <td ><input name="reg" class="tcal" type="text" class="textbox1" id="searchingpop" autocomplete="off"/>
                </td>
                 
<td ><input name="submit" type="submit" value="" style="background-image:url(images/go1.gif);width:42px;height:22px;border:0;" title="Enter Text and Click GO"/></td>
              </tr>
            </table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="expense_table" style="font-size:14px;">
              <thead>
                <tr>
                <th>INVOICE NO</th>
                 <th class="TH1">CUSTOMER NAME</th>
                  <th class="TH1">SALE DATE</th>
                  <th class="TH1">TOTAL AMOUNT</th>
				     <th class="TH1">VIEW</th>
                     <th class="TH1">BILL</th>
  					<!----------- <th class="TH1">View </th>-->
                 
				
                </tr>
                <?php
				include("config.php");
				if(isset($_REQUEST['submit'])){
				$d = $row['reg'];
				if($d != ""){
				$d1 = date('Y-m-d',strtotime($d));
				$sqls=mysqli_query($link,"select distinct a.lr_no,a.cust_name,a.total,a.sal_date from phr_salreturn_mast as a,phr_salreturn_dtl as b  where a.lr_no=b.lr_no and a.sal_date = '$d1' order by a.sal_date desc ")or die(mysqli_error($link));
				}
				if($sqls){	  
				$tot=mysqli_num_rows($sqls);
				while($row=mysqli_fetch_array($sqls)){
				$cust_name=$row[1];
				$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
				while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}
				 $sdate = date('d-m-Y',strtotime($row[3]));
				$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
				?>
                <tr><td><?php echo $row[0] ?></td><td><?php echo $cust_name ?></td><td><?php echo $sdate ?></td><td><?php echo $row[2] ?></td><td><a href="salesreturn_view.php?lr_id=<?php echo $row[0] ?>"><img src="images/view.gif" /></a></td><td><a href="medbill_sr.php?lr_id=<?php echo $row[0] ?>" target="_blank"><img src="images/print.png" /></a></td></tr>
				<?php } } }
				}else{
				$sqls=mysqli_query($link,"select distinct a.lr_no,a.cust_name,a.total,a.sal_date from phr_salreturn_mast as a,phr_salreturn_dtl as b  where a.lr_no=b.lr_no order by a.sal_date desc ")or die(mysqli_error($link));
				if($sqls){	  
				$tot=mysqli_num_rows($sqls);
				while($row=mysqli_fetch_array($sqls)){
				$cust_name=$row[1];
				$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
				while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}
				 $sdate = date('d-m-Y',strtotime($row[3]));
				$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
				?>
                <tr><td><?php echo $row[0] ?></td><td><?php echo $cust_name ?></td><td><?php echo $sdate ?></td><td><?php echo $row[2] ?></td><td><a href="salesreturn_view.php?lr_id=<?php echo $row[0] ?>"><img src="images/view.gif" /></a></td><td><a href="medbill_sr.php?lr_id=<?php echo $row[0] ?>" target="_blank"><img src="images/print.png" /></a></td></tr>
				<?php } }} }?>
                </thead></table></form>
<?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="salesreturn.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="salesreturn.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="salesreturn.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="salesreturn.php?next=<?php echo (($records - 1) / $nd) ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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