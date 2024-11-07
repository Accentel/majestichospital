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
			include("header1.php");
		?>
		<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#name").autocomplete("set60.php", {
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

	<div id="conteneur" class="container"> 
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?><?php */?>
            
            <?php
			include("logo.php");
			include("main_menu.php");
			?>

         
		 <div align="center" style="height:auto; min-height:500px;">
          <h1 style="color:red;" align="center">Search Medicine   </h1>
                       <form name="frm" method="post" >
           
                
<table align="center" cellspacing="2" class="table">
<tr><td> Medicine Name : <input type="text" name="name" id="name" required/></td>
<td align="left"><input name="submit" type="submit" value="Search"  /></td></tr>
</table>
</form>


<table width="100%" align="center" border="1" cellpadding="0" cellspacing="0">	
		
		<tr><td><br /></td></tr>
		 
			<tr><th align="center"><b><u>SNO </u></b></th>
            
            <th ><b><u>SUPL NAME</u></th> 
            <th ><b><u>PRODUCT NAME</u></th>
            
            <th ><b><u>BATCH NO</u></th>
            <th colspan="3"><b><u>TOTAL QTY </u>
            <th ><b><u>RATE </u></b></th>
            </th>
             <th><b><u>PRICE </u></th>
            
            </tr>
            
            <tr> <th></th><th></th><th></th><th></th> <th ><b><u> QTY </u></b></th> <th ><b><u>FREE </u></b></th>
            
            <th>TOTAL </th><th></th>
            <th></th></tr>
             <tr><td><br /></td></tr>
<?php 
include('config.php');
if(isset($_POST['submit'])){
$name=$_POST['name'];

$sql = "select  (a.S_RATE / a. balance_qty) as final_count,a.PRODUCT_NAME,a.packing_type,a.batch_no,a.mrp,a.exp_date,a.BATCH_NO,
a.s_qty,a.s_free,a.s_rate,a.noitems,a.cost,b.suppl_name,a.S_RATE from phr_purinv_dtl a,phr_supplier_mast as b,phr_purinv_mast c
 where  a.lr_no=c.lr_no  and b.suppl_code=c.suppl_code and a.PRODUCT_NAME='$name' order by final_count   ";
 
// $sql="select * from phr_purinv_dtl where PRODUCT_NAME='$name'  order by S_RATE desc";
$res=mysqli_query($link,$sql) or die(mysqli_error($link));
$i=1;
while($row=mysqli_fetch_array($res)){
?>
<tr>

<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $row['suppl_name']; ?></td>
<td align="center"><?php echo $row['PRODUCT_NAME']; ?></td>
<td align="center"><?php echo $row['BATCH_NO']; ?></td>

<?php   $x=$row['s_qty']; $x1=$row['s_free'];  $x2=$x+$x1; $r=$row['S_RATE']; ?>

<td align="center"><?php echo $x?> 
</td>
<td align="center"><?php echo $x1?> 
</td>
<td align="center"><?php echo $x2?> 
</td>
<td align="center"><?php echo $row['S_RATE'];?>
<td align="center"><?php echo $row['final_count']; ?> </td>
</tr>
			<?php $i++; } }?><!--	
<tr>
<td colspan="4" align="center"> <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></td>
</tr>-->
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

header('Location:login.php');

}

?>