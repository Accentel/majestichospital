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
		?><link rel="stylesheet" href="js/jquery-ui.min.css" type="text/css" /> 
			</head>

	<body>

	<div id="conteneur">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre" >
          <h1 style="color:red;" align="center">PRODUCT DETAILS</h1>
          <!--
                       <form name="frm" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Product Name : <input type="text" name="name" id="name1" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>-->

<form name="frm" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Product Name : <input type="text" name="name" id="name" required/></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_product_details.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO</TH><!--<TH>PRODUCT CODE</TH>--><TH>PRODUCT NAME</TH><TH>TYPE NAME</TH><TH>MANF.BY</TH><TH>HSN</TH><TH>EDIT</TH><TH>DELETE</TH></tr>
<?php 
			  include("config.php");
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  $sq=mysqli_query($link,"select * from phr_prddetails_mast  where  upper(PRD_NAME) like upper('$n%')")or die(mysqli_error($link));
			  //$sq = mysqli_query("select prd_name,prd_code,prdtype_name,hsn from phr_prddetails_mast as a,phr_prdtype_mast as b where a.type=b.prdtype_code and upper(prd_name) like upper('$n%')");
		
			  $i = 1;
			  if($sq){
			  $tot=mysqli_num_rows($sq);
			  while($res=mysqli_fetch_array($sq)){
				
			  $prc = $res['prd_code'];
			  $prn=$res['PRD_NAME'];
			  $ptn = $res['TYPE'];
			  $id=$res['id'];
			   $mani_by=$res['mani_by'];
			   $hsn=$res['HSN'];
			   
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td>
             <!--<td><?php// echo $prc;?></td>--><td><?php echo $prn;?></td><td><?php echo $ptn;?></td>
              <td><?php echo $mani_by?></td><td><?php echo $hsn?></td>
             <td style="text-align:center;"><a href="edit_product_details.php?id=<?php echo $id?>"><img src="images/edit.gif" /></a></td>
             <td style="text-align:center;"><a href="delet_prd.php?id=<?php echo $id?>"  onClick="return confirm('Are you sure you want to delete this item?');"><img src="images/delete.gif" /></a></td>
             </tr>
           
             <?php $i++;}
			 }
			 }else{ ?>
			 <?php
			 //echo $xx="select prd_name,prd_code,prdtype_name from phr_prddetails_mast as a,
			// phr_prdtype_mast as b where a.type=b.prdtype_code";
			 //$sq = mysqli_query($xx);
		$sq=mysqli_query($link,"select * from phr_prddetails_mast order by id desc")or die(mysqli_error($link));
			  $i = 1;
			  if($sq){
			  $tot=mysqli_num_rows($sq);
			  while($res=mysqli_fetch_array($sq)){
			 $id=$res['id'];
			  $prc = $res['PRD_CODE'];
			  $prn=$res['PRD_NAME'];
			  $ptn = $res['TYPE'];
			  $mani_by=$res['mani_by'];
			  $hsn=$res['HSN'];
			  
			  
				$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td>
             <!--<td><?php// echo $prc;?></td>--><td><?php echo $prn;?></td><td><?php echo $ptn;?></td>
             <td><?php echo $mani_by?></td><td><?php echo $hsn?></td>
             
             
             <td style="text-align:center;"><a href="edit_product_details.php?id=<?php echo $id?>"><img src="images/edit.gif" /></a></td>
              <td style="text-align:center;"><a href="delet_prd.php?id=<?php echo $id?>"  onClick="return confirm('Are you sure you want to delete this item?');"><img src="images/delete.gif" /></a></td>
			  
             </tr>
             <?php }$i++;}
			 }
			 }
			 ?></table>
              <?php if($records==0){ ?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found"; } ?></th></tr></table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="product_details_list.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="product_details_list.php?next=<?php echo ($pagecount - 1) ?>&amp;searchname=<?php echo $n ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="product_details_list.php?next=<?php echo ($pagecount + 1) ?>&amp;searchname=<?php echo $n ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="product_details_list.php?next=<?php echo (($records - 1) / $nd) ?>&amp;searchname=<?php echo $n ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
	  </tr>
	</table>
	<table>
	<?php if ($rowscounts == 0) { ?>
           <tr >
           <td colspan="9" ><div align="right"><font color="#FF6600">No More Records</font> </div></td>
            </tr> 
	<?php } ?>
	</table>		
 <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {

    $("#name").autocomplete({
        source: "se2.php",
        minLength: 1
    });                });
</script>
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