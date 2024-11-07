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
function card_pop(str){
	
	window.open('print.php?id='+str+'','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes');
	
	
	}

</script>
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
<script>
$().ready(function() {
	$("#name").autocomplete("ipname.php", {
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
<script>
$().ready(function() {
	$("#reg").autocomplete("ipreg.php", {
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
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php */?><?php
		include('logo.php');	
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">IP PATIENT LAB BILL</h1>
          
                       <form name="frm" method="post" >
           
                
<table width="70%" style="margin-left:300px;"cellspacing="2">

<tr><td></td><td>Search By Patient Name : <input type="text" name="name" id="name"  /></td>
<td>Search By UMR No. : <input type="text" name="reg" id="reg"  /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<!--<tr><td width="68" class="label1"><a href="patientregister.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
--></table>
<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO.</TH><TH>UMR No.</TH><TH>PATIENT TYPE</TH><TH>PATIENT NAME</TH><TH>ADMISSION DATE</TH><TH>ADD</TH></tr>
<?php 
			  include("config.php");
			  
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  $r=$_REQUEST['reg'];

				if($n != "" && $r != "")
				{
					$sq = mysqli_query($link,"SELECT a.PAT_NO,b.patientname,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM IP_PAT_ADMIT as a inner join patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged') and b.patientname='$n' and a.pat_regno = '$r' order by a.pat_id desc")or die(mysqli_error($link));
				}
			    else if($n != "")
				{
					$sq = mysqli_query($link,"SELECT a.PAT_NO,b.patientname,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM IP_PAT_ADMIT as a inner join patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged') and b.patientname='$n' order by a.pat_id desc")or die(mysqli_error($link));
				
				}
			    else if($r != "")
				{
					$sq = mysqli_query($link,"SELECT a.PAT_NO,b.patientname,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM IP_PAT_ADMIT as a inner join patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged') and a.pat_regno = '$r' order by a.pat_id desc")or die(mysqli_error($link));
				
				}
			  
			   if($sq)
			   {
			   $tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['pay_type'];
			  $h=$res['patientname'];
			  $adate = $res['ADMIT_DATE'];
			  $b=date("d-m-Y", strtotime($adate));
			  $c=$res['doc_name'];
			  $d = $res['BED_NO'];
			  $e = $res['pat_regno'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $e;?></td><td><?php echo $a;?></td>
             <td><?php echo $h;?></td><td><?php echo $d;?></td><td><?php echo $b;?></td></td>
             <td style="text-align:center;"><a href="oppay_bill.php?id=<?php echo $a?>"><img src="images/edit.gif" /></a></td>
             </tr>
             <?php }
			 }
			 }
			 else{
				 $d=date('Y-m-d');
				 $fff="SELECT * FROM `bill5` where BillDate='$d' and ptype='IP' order by bid desc";
				$sq=mysqli_query($link,$fff);
				
			if($sq){	
				$tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 //$registerno=$res['registerno'];
			  $mrno = $res['mrno'];
			  $optype = $res['ptype'];
			  $pname=$res['PatientName'];
			  $adate = $res['BillDate'];
			  $b=date("d-m-Y", strtotime($adate));
			  $id=$res['bid'];
			  //$d = $res['phoneno'];
			 // $e = $res['registerno'];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td>
             <td><?php echo $mrno;?></td><td><?php  if($optype=='OP'){ echo 'Out Patient' ; } else if($optype=='IP') { echo 'IN Patient'; }
			 else if($optype=='Lab') { echo 'Lab'; }
			 ?></td><td><?php echo $pname;?></td>
             <td><?php echo $b;?></td></td><td style="text-align:center;">
             <a href="oppay_bill1.php?id=<?php echo $mrno?>"><img src="images/add.gif" /></a></td>
             </tr>
             <?php }$i++;
			 }
			 }
			 }
			 ?></table>
              <?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="patient-reg.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="patient-reg.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="patient-reg.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="patient-reg.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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