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
		<script>
		function report()
		{
			var f = document.getElementById("fdate").value;
			var t = document.getElementById("tdate").value;
			var k = document.getElementById("lab").value;
			
			window.open('pdf_abc_report.php?f='+f+'&t='+t+'&k='+k+'','mypatwindow','width=1020,height=800,toolbar=no,resizable=yes,menubar=no,scrollbar=yes');
		}
		</script>
	</head>

	<body>

	<div id="conteneur">
		<?php include("logo.php");?>
		<?php
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">In/Out/Lab Reports</h1>
          
                       <form name="myform" method="post" >
           
                
<table width="100%" cellspacing="2">
<tr align="right">
<td >From Date : <input type="text" class="tcal" name="fdate" id="fdate" value="<?php echo date("d-m-Y");?>" required/>
 To Date : <input name="tdate" id="tdate" type="text" class="tcal" value="<?php echo date("d-m-Y");?>" required/>
 Patient Type :<select name="lab" id="lab">
 <option value="OP">Out Patient</option>
 <option value="IP">In Patient</option>
 <option value="Lab">Lab</option>
  <option value="All">All</option>
 
 </select>
 </td>

<td ><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
<td><input type="button" value="Report" class="butt" onclick="report()"/>
 <!--<input type="button" value="Delete" class="butt" onclick="window.location.href='delete_abc_report.php'"/>--></td>
</tr>

</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>REG NO</TH><TH>PATIENT NAME</TH><th>PATIENT TYPE</th><TH>REGISTRATION DATE</TH></tr>
<?php 
			  include("config.php");
			  if(isset($_REQUEST['submit'])){
				  $f1=$_REQUEST['fdate'];
				   $f=date('Y-m-d', strtotime($f1));
				  $t1=$_REQUEST['tdate'];
				  $t=date('Y-m-d', strtotime($t1));
				  $lab=$_REQUEST['lab'];
				  
				 //$dd="select * from patientregister1 where STR_TO_DATE(date, '%Y-%m-%d') between 
				//STR_TO_DATE('$f', '%d-%m-%Y') and STR_TO_DATE('$t', '%d-%m-%Y')";
				if($lab!='All'){
				
				 $dd="select * from patientregister where   pat_type='$lab' and date between '$f' and '$t'";
				} else {
					$dd="select * from patientregister where   date between '$f' and '$t'";
					
				}
				
			   $sq=mysql_query($dd);
			  
			   $tot=mysql_num_rows($sq);
			  
			  while($res=mysql_fetch_array($sq)){
			 
			  $h=$res['reg_id'];
			  $a=$res['registerno'];
			  $b=$res['patientname'];
			  $c=$res['date'];
			  $pat_type=$res['pat_type'];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $a;?></td><td><?php echo $b;?></td>
             <td><?php echo $pat_type?></td>
             <td><?php echo $c;?></td></tr>
             <?php }}}
			 ?>
			 </table>
              <?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="abc_report.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="abc_report.php?next=<?php echo ($pagecount - 1) ?>&fdate=<?php echo $f ?>&tdate=<?php echo $t ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="abc_report.php?next=<?php echo ($pagecount + 1) ?>&fdate=<?php echo $f ?>&tdate=<?php echo $t ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="abc_report.php?next=<?php echo (($records - 1) / $nd) ?>&fdate=<?php echo $f ?>&tdate=<?php echo $t ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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