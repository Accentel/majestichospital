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
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#name").autocomplete("se.php", {
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

	<div id="conteneur container" >
		 <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">DEPARTMENTS LIST</h1>
          
                       <form name="frm" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Department Name : 

<input id=\"name\" list=\"city1\" name="name" required >
<datalist id=\"city1\" >

<?php  include("config.php");
$sql="select distinct DEPT_NAME from dept ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[DEPT_NAME]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
<!--<input type="text" name="name" id="name" required/>--></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_dept.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO</TH><TH>DEPARTMENT NAME</TH><TH>MAIN DEPARTMENT NAME</TH><TH>LOCATION</TH><TH>VIEW</TH></tr>
<?php 
			  include("config.php");
			   if(isset($_REQUEST['submit'])){
			  $d=$_REQUEST['name'];
			   $ee="select a.DEPT_CODE, a.DEPT_NAME,b.FLOOR_NAME,c.FLOOR_CODE,c.FLOOR_NAME koti from dept a,location b,department c where 
				 b.FLOOR_CODE = a.LOC and c.FLOOR_CODE=a.UDEPT_CODE and  a.DEPT_NAME='$d'";
			 
			 //"select d.DEPT_CODE, d.DEPT_NAME,m.DEPT_NAME,l.FLOOR_NAME from dept as d inner join dept as m,location as l where m.UDEPT_CODE = d.DEPT_CODE and l.FLOOR_CODE = d.LOC and m.DEPT_NAME='$d'"
			  $sq = mysqli_query($link,$ee)or die(mysqli_error($link));
			 
			 
			  $tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $did = $res[0];
			  $depname=$res[2];
			  $mdepname=$res[1];
			  $locname=$res[2];
			  $m=$res[4];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
            <?php /*?> <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $depname;?></td><td><?php echo $mdepname;?></td><td><?php echo $locname;?></td><td style="text-align:center;"><a href="edit_dept.php?id=<?php echo $did?>"><img src="images/edit.gif" /></a></td></tr>
             <?php */?>
			 
			 <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $mdepname;?></td><td><?php echo $m;?></td><td><?php echo $locname;?></td><td style="text-align:center;"><a href="edit_dept.php?id=<?php echo $did?>"><img src="images/edit.gif" /></a></td>
             </tr>
			 <?php }$i++;}}
			 }else{
				 
				 //$ee="select d.DEPT_CODE, d.DEPT_NAME,m.DEPT_NAME,l.FLOOR_NAME,n.FLOOR_CODE from dept as d inner join dept as m,location as l,k department where  l.FLOOR_CODE = d.LOC";
				
				$ee="select a.DEPT_CODE, a.DEPT_NAME,b.FLOOR_NAME,c.FLOOR_CODE,c.FLOOR_NAME koti from dept a,location b,department c where 
				 b.FLOOR_CODE = a.LOC and c.FLOOR_CODE=a.UDEPT_CODE";
				
				$sq = mysqli_query($link,$ee)or die(mysqli_error($link));
			  $tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $did = $res[0];
			  $depname=$res[2];
			  $mdepname=$res[1];
			  $locname=$res[2];
			  $m=$res[4];
				$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
			 <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $mdepname;?></td><td><?php echo $m;?></td><td><?php echo $locname;?></td><td style="text-align:center;"><a href="edit_dept.php?id=<?php echo $did?>"><img src="images/edit.gif" /></a></td>
             </tr>
             <?php }$i++;}
			 } }?>
			 
			 </table>
              <?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="deptview.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="deptview.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="deptview.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="deptview.php?next=<?php echo (($records - 1) / $nd) ?> ">  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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