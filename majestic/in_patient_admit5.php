<?php include('config.php');
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if($_SESSION['name1'])
{
?>
<!DOCTYPE html >
<html>
	<head>
		<?php
			include("header.php");
		?>
	<script>
function card_pop(str){
window.open('view_in_patient_admit.php?id='+str+'','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes');
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
		<!--<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	-->	<?php
	include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">IN PATIENT ADMISSION</h1>
          
                       <form name="frm" method="post" >
           
                
<table width="70%" style="margin-left:300px;"cellspacing="2">

<tr><td></td><td>Search By Patient Name : <input type="text" name="name" id="name"  /></td>
<td>Search By UMR No. : <input type="text" name="reg" id="reg"  /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_in_patient_admit.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO.</TH><TH>UMR No.</TH><TH>PATIENT NO.</TH><TH>PATIENT NAME</TH><TH>AGE/SEX</TH><TH>BED NO.</TH><TH>ADMISSION DATE</TH><TH>EDIT</TH><TH>REPORT</TH></tr>
<?php 
			  include("config.php");
			  
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  $r=$_REQUEST['reg'];

				if($n != "" && $r != "")
				{
					$sq = mysqli_query($link,"SELECT a.PAT_ID,a.PAT_NO,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a inner join patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged') and b.patientname='$n' and a.pat_regno = '$r' order by a.pat_id desc")or die(mysqli_error($link));
				}
			    else if($n != "")
				{
					$sq = mysqli_query($link,"SELECT a.PAT_ID,a.PAT_NO,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a inner join patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged') and b.patientname='$n' order by a.pat_id desc")or die(mysqli_error($link));
				
				}
			    else if($r != "")
				{
					$sq = mysqli_query($link,"SELECT a.PAT_ID,a.PAT_NO,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a inner join patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged') and a.pat_regno = '$r' order by a.pat_id desc")or die(mysqli_error($link));
				
				}
			  
			   if($sq)
			   {
			   $tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			  $h=$res['patientname'];
			  $adate = $res['ADMIT_DATE'];
			  $b=date("d-m-Y", strtotime($adate));
			 // $c=$res['doc_name'];
			  $d = $res['BED_NO'];
			  $e = $res['pat_regno'];
			   $age = $res['age'];
			    $gender = $res['gender'];
				$PAT_ID=$res['PAT_ID'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $e;?></td>
             <td><?php echo $a;?></td><td><?php echo $h;?></td><td><?php echo $age."/".$gender;?></td>
             <td><?php echo $d;?></td><td><?php echo $b;?></td></td>
             <td style="text-align:center;"><a href="edit_in_patient_admit.php?pat=<?php echo $a?>&id=<?php echo $PAT_ID;?>"><img src="images/edit.gif" /></a></td><td style="text-align:center;"><a onclick="javascript:card_pop('<?php echo $a?>')"><img src="images/print.png" /></a></td></tr>
             <?php }
			 }
			 }
			 else{
				 
			 $a1="SELECT a.PAT_ID,a.PAT_NO,a.ADMIT_DATE,d.dname1,a.BED_NO,a.PAT_REGNO FROM ip_pat_admit as a ,doct_infor as d where  d.id=a.doc_code and a.DIS_STATUS='ADMITTED'   order by a.PAT_ID  desc ";
			 //$a1="SELECT a.PAT_NO,b.date,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a ,patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged')  order by a.PAT_ID  desc ";
			$sq=mysqli_query($link,$a1)or die(mysqli_error($link));
			if($sq){	
				$tot=mysqli_num_rows($sq);
		  $i = 1;
		  while($res=mysqli_fetch_array($sq)){
			  $a = $res['PAT_NO'];
			   $e = $res['PAT_REGNO'];
			  $iu="select * from patientregister where registerno='$e'";
			 $u20=mysqli_query($link,$iu) or die(mysqli_error($link));
			 $u1=mysqli_fetch_array($u20);
			  $h=$u1['patientname'];
			  $adate = $res['ADMIT_DATE'];
			  $b=date("d-m-Y", strtotime($adate));
			  //$c=$res['doc_name'];
			  $d = $res['BED_NO'];
			 
			   //$age = $u1['age'];
			    //$gender = $u1['gender'];
				$PAT_ID=$res['PAT_ID'];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $e;?></td>
             <td><?php echo $a;?></td><td><?php echo $h;?></td><td><?php echo $age."/".$gender;?></td>
             <td><?php echo $d;?></td><td><?php echo $b;?></td></td><td style="text-align:center;">
             <a href="edit_in_patient_admit.php?pat=<?php echo $a?>&id=<?php echo $PAT_ID;?>"><img src="images/edit.gif" /></a></td><td style="text-align:center;"><a onclick="javascript:card_pop('<?php echo $a?>')"><img src="images/print.png" /></a></td></tr>
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
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="in_patient_admit.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="in_patient_admit.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="in_patient_admit.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="in_patient_admit.php?next=<?php echo (($records - 1) / $nd) ?> ">  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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