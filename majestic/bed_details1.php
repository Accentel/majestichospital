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
		 <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
            <script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#name").autocomplete("bdetails.php", {
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
		<div id="centre">
          <h1 style="color:red;" align="center">Hospital Tariff Details</h1>
          
     <!--                  <form name="frm" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Bed Number : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>-->
<!--<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_hospitaltariff.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>-->
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO</TH><TH>Bed Charges</TH><TH>Intensivist/DR</TH><TH>Nursing Charges</TH><TH>Monitor Charge</TH><TH>EDIT</TH>
<!--<TH>DELETE</TH>--></tr>
		<?php 
			  include("config.php");
			   if(isset($_REQUEST['submit'])){
			  $d=$_REQUEST['name'];
			  
			  $sq = mysqli_query($link,"SELECT id,bed,inten, nurse, monitor from 
			  hosp_tariff where b.BEDTYPE_ID=a.BED_TYPE and  a.BED_NO = '$d'")or die(mysqli_error($link));
			  $tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $bedid = $res[0];
			  $bedno=$res[1];
			  $roomno=$res[2];
			  $bedtype = $res[3];
			  $bstatus = $res[4];
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $roomno;?></td><td><?php echo $bedno;?></td><td><?php echo $bedtype;?></td><td><?php echo $bstatus;?></td><td style="text-align:center;"><a href="edit_bed_details.php?id=<?php echo $bedid?>"><img src="images/edit.gif" /></a></td><td style="text-align:center;"><a href="delete_bed_details.php?id=<?php echo $bedid?>"><img src="images/delete.gif" /></a></td></tr>
             <?php $i++;}}
			 }else{
			 $sq = mysqli_query($link,"SELECT id,bed,inten, nurse, monitor from hosp_tariff ")or die(mysqli_error($link));
			  $tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $bedid = $res[0];
			  $bedno=$res[1];
			  $roomno=$res[2];
			  $bedtype = $res[3];
			  $bstatus = $res[4];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
			 <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $roomno;?></td>
             <td><?php echo $bedno;?></td><td><?php echo $bedtype;?></td><td><?php echo $bstatus;?></td>
             <td style="text-align:center;"><a href="add_bed_details2.php?id=<?php echo $bedid?>"><img src="images/edit.gif" /></a></td>
             <!--<td style="text-align:center;"><a href="delete_bed_details.php?id=<?php echo $bedid?>"><img src="images/delete.gif" /></a></td>--></tr>
             <?php }$i++;}}
			 } ?>
			 
			 </table>
              <?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="bed_details1.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="bed_details1.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="bed_details1.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="bed_details1.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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