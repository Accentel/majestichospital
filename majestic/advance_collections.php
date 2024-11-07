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
        <div id="conteneur">

		  <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			?>
<script>
function card_pop(b){
	
window.open('advance_report.php?adv_no='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#name").autocomplete("advname.php", {
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
	$("#reg").autocomplete("advreg.php", {
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

	<?php /*?><div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?><?php */?>
            
            
		<div id="centre">
          <h1 style="color:red;" align="center">PATIENT ADVANCE COLLECTIONS</h1>
          
                       <form name="frm" method="post" >
           
                
<table width="70%" style="margin-left:300px;"cellspacing="2">

<tr><td></td><td>Search By Patient Name : <input type="text" name="name" id="name"  /></td>
<td>Search By UMR No. : <input type="text" name="reg" id="reg"  /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_advances.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO.</TH><TH>PATIENT UMR No.</TH><TH>PATIENT NAME</TH>
<th>ADMIT DATE</th>
<TH>ADVANCE DATE</TH><TH>ADVANCE PAID</TH><TH>EDIT</TH><TH>REPORT</TH></tr>
<?php 
			  include("config.php");
			  
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  $r=$_REQUEST['reg'];

				if($n != "" && $r != "")
				{
					$sq=mysqli_query($link,"select H.ADV_ID,H.PAT_NO,H.ADV_AMT,A.PAT_REGNO,A.ADMIT_DATE,M.patientname,H.ADV_DATE from adv_collection as H,ip_pat_admit as A,patientregister as M WHERE H.PAT_NO=A.PAT_NO AND A.PAT_REGNO=M.registerno and M.patientname = '$n' and M.registerno = '$r' and dis_status not like 'Discharged' order by ADV_ID desc")or die(mysqli_error($link));
		
				}
			    else if($n != "")
				{
					$sq=mysqli_query($link,"select H.ADV_ID,H.PAT_NO,H.ADV_AMT,A.PAT_REGNO,A.ADMIT_DATE,M.patientname,H.ADV_DATE from adv_collection as H,ip_pat_admit as A,patientregister as M WHERE H.PAT_NO=A.PAT_NO AND A.PAT_REGNO=M.registerno and M.patientname = '$n' and dis_status not like 'Discharged' order by ADV_ID desc")or die(mysqli_error($link));
		
				
				}
			    else if($r != "")
				{
					$sq=mysqli_query($link,"select H.ADV_ID,H.PAT_NO,H.ADV_AMT,A.PAT_REGNO,A.ADMIT_DATE,M.patientname,H.ADV_DATE from adv_collection as H,ip_pat_admit as A,patientregister as M WHERE H.PAT_NO=A.PAT_NO AND A.PAT_REGNO=M.registerno and M.registerno = '$r' and dis_status not like 'Discharged' order by ADV_ID desc")or die(mysqli_error($link));
		
				
				}
			  
			   if($sq)
			   {
			   $tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_REGNO'];
			  $h=$res['patientname'];
			  $adate = $res['ADV_DATE'];
			  $b=date("d-m-Y", strtotime($adate));
			  $c=$res['ADV_AMT'];
			  $advid = $res['ADV_ID'];
			    $ADMIT_DATE=$res['ADMIT_DATE'];
			  
			  $b1=date("d-m-Y", strtotime($ADMIT_DATE));
			  //$outid = $res['OUT_CONSNO'];
			  //$conname = $res['ANAE_DOCNAME'];
			  //$contype=$res['ANAEST_TYPE'];
			  //$spec=$res['CONS_SPECALIZATION'];
			  //$concharge = $res['ANAE_CHARGES'];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $a;?></td><td><?php echo $h;?></td>
             <td><?php echo $b1?></td>
             <td><?php echo $b;?></td><td><?php echo $c;?></td></td><td style="text-align:center;"><a href="edit_advances.php?id=<?php echo $advid?>"><img src="images/edit.gif" /></a></td><td style="text-align:center;"><A onclick="card_pop('<?php echo $advid ?>')">
				 <img src="images/view.gif"></A></td></tr>
             <?php }$i++;}
			 }
			 }
			 else{
			     $tdate=date('Y-m-d');
				  $q="select H.ADV_ID,H.PAT_NO,H.ADV_AMT,A.PAT_REGNO,A.ADMIT_DATE,M.patientname,H.ADV_DATE
				 from adv_collection as H,ip_pat_admit as A,patientregister as M WHERE H.PAT_NO=A.PAT_NO AND A.PAT_REGNO=M.registerno and H.ADV_DATE='$tdate' and  dis_status not like 'Discharged' order by ADV_ID desc";
				 
				 $sq=mysqli_query($link,$q)or die(mysqli_error($link));
		
			if($sq){	
				$tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_REGNO'];
			  $h=$res['patientname'];
			  $adate = $res['ADV_DATE'];
			  $b=date("d-m-Y", strtotime($adate));
			  $c=$res['ADV_AMT'];
			  $advid = $res['ADV_ID'];
			  $ADMIT_DATE=$res['ADMIT_DATE'];
			  
			  $b1=date("d-m-Y", strtotime($ADMIT_DATE));
			 // $outid = $res['OUT_CONSNO'];
			  //$conname = $res['ANAE_DOCNAME'];
			  //$contype=$res['ANAEST_TYPE'];
			  //$spec=$res['CONS_SPECALIZATION'];
			  //$concharge = $res['ANAE_CHARGES'];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td>
             <td><?php echo $a;?></td><td><?php echo $h;?></td>
             
             <td><?php echo $b1?></td>
             <td><?php echo $b;?></td><td><?php echo $c;?></td></td><td style="text-align:center;"><a href="edit_advances.php?id=<?php echo $advid?>"><img src="images/edit.gif" /></a></td><td style="text-align:center;"><A onclick="card_pop('<?php echo $advid ?>')">
				 <img src="images/view.gif"></A></td></tr>
             <?php }$i++;}
			 
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
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="advance_collections.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="advance_collections.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="advance_collections.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="advance_collections.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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