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
function card_pop(b,a){
	
window.open('bill_ipexp.php?id='+b+'&a='+a+'','mywindow1','width=1024,height=568,toolbar=no,menubar=no,scrollbars=yes');
	}

</script>
	</head>

	<body>

	<div id="conteneur">
		
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">EXPENSES LIST</h1>
          
<form name="frm" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Date: <input type="text" class="tcal" value="<?php echo date('d-m-Y'); ?>" name="name" id="name" /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_direct.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO</TH><TH>DATE</TH><TH>PAID TO</TH><TH>AMOUNT</TH><TH>TOWARDS</TH><TH>EDIT</TH><TH>BILL</TH></tr>
<?php 
			  include("config.php");
			  if(isset($_REQUEST['submit'])){
				$n=date('Y-m-d',strtotime($_REQUEST['name']));
			  
			  $sq = mysqli_query($link,"select * from addexpenses where bill_date = '$n' order by id desc")or die(mysqli_error($link));
			  }else{
			  $sq = mysqli_query($link,"select a.bill_date,a.paid_to,a.amount,a.id,b.exptype from addexpenses a,expensetype b where a.towards=b.id  order by a.id desc")or die(mysqli_error($link));
		
			  }
			  $tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
				
				$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td>
             <td><?php echo date('d-m-Y',strtotime($res['bill_date'])); ?></td>
             <td><?php echo $res['paid_to'];?></td>
             <td><?php echo $res['amount'];?></td>
             <td><?php echo $res['exptype'];?></td>
             <td style="text-align:center;"><a href="edit_direct.php?id=<?php echo $res['id'] ?>"><img src="images/edit.gif" /></a></td><td style="text-align:center;"><a onclick="card_pop('<?php echo $res['id'] ?>','DI')"><img src="images/pdf_icon.jpg" /></a></td></tr>
             <?php } $i++;
			 }
			 }
?>
</table>
<?php if($tot==0){ ?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="direct_expenses.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="direct_expenses.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="direct_expenses.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="direct_expenses.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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