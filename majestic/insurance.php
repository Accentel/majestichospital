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
	$("#name").autocomplete("se1.php", {
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

	<div id="conteneur container ">
		 <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">Insurance  List</h1>
         
                       <form name="frm" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Insurance  Name :

<input id=\"name\" list=\"city1\" name="name" class="text" required >
<datalist id=\"city1\" >

<?php  include("config.php");
$sql="select distinct ins_name from insurance ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[ins_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
<!-- <input type="text" name="name" id="name" required />--></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_insurance.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table><br />
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO</TH><TH>INSURANCE NAME</TH><TH>EDIT</TH></tr>
<?php 
			 
			   if(isset($_REQUEST['submit'])){
			  $d=$_REQUEST['name'];
			  
			  $sq = mysqli_query("select * from insurance where ins_name = '$d'");
			  
			  $i = 1;
			  if($sq){
			  $tot=mysqli_num_rows($sq);
			  while($res=mysqli_fetch_array($sq)){
			 
			  $lid = $res['id'];
			  $locname=$res['ins_name'];
			 // $remarks=$res['REMARKS'];
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $locname;?></td><td style="text-align:center;"><a href="insurance.php?id=<?php echo $lid?>"><img src="images/edit.gif" /></a></td></tr>
             <?php $i++;}}
			 }else{ 
			 $sq = mysqli_query($link,"select * from insurance")or die(mysqli_error($link));
			  
			  $i = 1;
			  if($sq){
			  $tot=mysqli_num_rows($sq);
			  while($res=mysqli_fetch_array($sq)){
			 
			  $lid = $res['id'];
			  $locname=$res['ins_name'];
			  //$remarks=$res['REMARKS'];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
			 <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $locname;?></td><td style="text-align:center;"><a href="edit_insurance.php?id=<?php echo $lid?>"><img src="images/edit.gif" /></a></td></tr>
			 <?php }$i++;}
			 }}?>
			 </table>
              <?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="insurance.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="insurance.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="insurance.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="insurance.php?next=<?php echo (($records - 1) / $nd) ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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