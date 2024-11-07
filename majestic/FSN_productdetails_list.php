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
	<script>
function card_pop(b){
	
window.open('Advance_Report_HTML.jsp?adv_no='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
	</head>

	<body>

	<div id="conteneur">
	<?php /*?>	<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">FSN Analysis</h1>
          
                       <form name="frm" method="get" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Product Name : <input type="text" name="name" id="name" /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO</TH><TH>PRODUCT NAME</TH><TH>FSN</TH></tr>
<?php 
			  include("config.php");
			   if(isset($_REQUEST['submit'])){
			  $d=$_REQUEST['name'];
			  
			  $sq = mysqli_query($link,"SELECT c.product_code,c.product_name,count(sal_date) FROM phr_salent_mast as p,phr_salent_dtl as d,phr_purinv_dtl as c where d.lr_no=p.lr_no and d.inv_id=c.inv_id and c.product_name = '$d' group by c.product_code")or die(mysqli_error($link));
				$tot=mysqli_num_rows($sq);
			  $i = 1;
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $pc = $res['product_code'];
			  $pn=$res['product_name'];
			  
				if($res[2] < 5)
				 {
					$stat="Non Moving";
				 }
				 else if($res[2] >= 5 && $res[2] < 15)
				 {
					$stat="Slow Moving";
				 }
				 else if($res[2] >= 15)
				 {
					$stat="Fast Moving";
				 }
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $pn;?></td><td><?php echo $stat;?></td></tr>
             <?php $i++;}
			 }else{

			  $sq = mysqli_query($link,"SELECT c.product_code,c.product_name,count(sal_date) FROM phr_salent_mast as p,phr_salent_dtl as d,phr_purinv_dtl as c where d.lr_no=p.lr_no and d.inv_id=c.inv_id group by c.product_code")or die(mysqli_error($link));
			$tot=mysqli_num_rows($sq);
			  $i = 1;
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $pc = $res['product_code'];
			  $pn=$res['product_name'];
			  
				if($res[2] < 5)
				 {
					$stat="Non Moving";
				 }
				 else if($res[2] >= 5 && $res[2] < 15)
				 {
					$stat="Slow Moving";
				 }
				 else if($res[2] >= 15)
				 {
					$stat="Fast Moving";
				 }
				 $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $pn;?></td><td><?php echo $stat;?></td></tr>
             <?php }$i++;}
			 }?>
			 </table>
              <?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="FSN_productdetails_list.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="FSN_productdetails_list.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="FSN_productdetails_list.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="FSN_productdetails_list.php?next=<?php echo (($records - 1) / $nd) ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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