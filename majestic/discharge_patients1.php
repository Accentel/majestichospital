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
<style>

.button1 {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}


</style>
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

    function ConfirmDialog() {
  var x=confirm("Are you sure to Discharge a Patient?")
  if (x) {
    return true;
  } else {
    return false;
  }
}

</script>

	</head>

	<body>

	<div id="conteneur">
		<?php
			include("logo.php");
			?>
		<?php
			include("main_menu.php");
			?>
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">Discharge Patients</h1>
          
                       <form name="frm" method="post" >
           
                
<table width="70%" style="margin-left:300px;"cellspacing="2">

<tr><td></td><td>Search By Patient Name : <input type="text" name="name" id="name"  /></td>
<td>Search By UMR No. : <input type="text" name="reg" id="reg"  /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO.</TH><TH>PATIENT UMR No.</TH><TH>PATIENT NO.</TH><TH>PATIENT NAME</TH><TH>AGE/SEX</TH><TH>ADMISSION DATE</TH><TH>ROOM NO.</TH><TH>BED NO.</TH><TH>Discharge Status.</TH><TH>Discharge Date.</TH></tr>
<?php 
			  include("config.php");
			  
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  $r=$_REQUEST['reg'];
$date=date('Y-m-d');
				if($n != "" && $r != "")
				{
					
					$sq=mysqli_query($link,"select a.PAT_NO,m.patientname,m.age,m.gender,a.ADMIT_DATE,a.DIS_STATUS,b.ROOM_NO,a.BED_NO,m.registerno FROM ip_pat_admit as a,patientregister as m,bed_details as b WHERE a.PAT_REGNO=m.registerno AND a.BED_NO=b.BED_NO and Discharge_date='$date' and m.registerno='$r' and m.patientname='$n' order by a.ADMIT_DATE desc")or die(mysqli_error($link));
				}
			    else if($n != "")
				{
				$f="select a.PAT_NO,m.patientname,m.age,m.gender,a.ADMIT_DATE,a.DIS_STATUS,b.ROOM_NO,a.BED_NO,m.registerno FROM ip_pat_admit as a,patientregister as m,bed_details as b WHERE a.PAT_REGNO=m.registerno AND a.BED_NO=b.BED_NO and Discharge_date='$date' and m.patientname='$n' order by a.ADMIT_DATE desc";
					$sq=mysqli_query($link,$f) or die(mysqli_error($link));
				
				}
			    else if($r != "")
				{
					$sq=mysqli_query($link,"select a.PAT_NO,m.patientname,m.age,a.DIS_STATUS,m.gender,a.ADMIT_DATE,a.Discharge_date,b.ROOM_NO,a.BED_NO,m.registerno FROM ip_pat_admit as a,patientregister as m,bed_details as b WHERE a.PAT_REGNO=m.registerno AND a.BED_NO=b.BED_NO and Discharge_date='$date' and m.registerno='$r' order by a.ADMIT_DATE desc")or die(mysqli_error($link));
				
				}
			  
			   if($sq)
			   {
			   $tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 $date=date('Y-m-d');
			  $a = $res['PAT_NO'];
			  $h=$res['patientname'];
			  $adate = $res['ADMIT_DATE'];
			  $b=date("d-m-Y", strtotime($adate));
			   $ddate = $res['Discharge_date'];
			  $dd=date("d-m-Y", strtotime($ddate));
			 // $c=$res['doc_name'];
			  $rno = $res['ROOM_NO'];
			  $d = $res['BED_NO'];
			  $e = $res['registerno'];
			  $age = $res['age'];
			  $DIS_STATUS = $res['DIS_STATUS'];
			  $gender = $res['gender'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $e;?></td><td><?php echo $a;?></td><td><?php echo $h;?></td><td><?php echo $age."/".$gender;?></td><td><?php echo $b;?></td><td><?php echo $rno;?></td>
             <td><?php echo $d;?></td><td><?php echo $DIS_STATUS;?></td><td><?php echo $dd;?></td></tr>
             <?php $i++;}
			 }
			 }
			 else{
				 $date=date('Y-m-d');
				$sq=mysqli_query($link,"select a.PAT_NO,m.patientname,m.age,m.gender,a.ADMIT_DATE,a.DIS_STATUS,b.ROOM_NO,a.Discharge_date,a.BED_NO,m.registerno FROM ip_pat_admit as a,patientregister as m,bed_details as b WHERE a.PAT_REGNO=m.registerno AND a.BED_NO=b.BED_NO and Discharge_date='$date' ")or die(mysqli_error($link));
		
					
			if($sq){	
				$tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			  $h=$res['patientname'];
			  $adate = $res['ADMIT_DATE'];
			  $b=date("d-m-Y", strtotime($adate));
			  
			  $ddate = $res['Discharge_date'];
			  $dd=date("d-m-Y", strtotime($ddate));
			 // $c=$res['doc_name'];
			  $rno = $res['ROOM_NO'];
			  $d = $res['BED_NO'];
			  $e = $res['registerno'];
			   $age = $res['age'];
			     $DIS_STATUS = $res['DIS_STATUS'];
			  $gender = $res['gender'];
			   $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $e;?></td><td><?php echo $a;?></td><td><?php echo $h;?></td><td><?php echo $age."/".$gender;?></td><td><?php echo $b;?></td><td><?php echo $rno;?></td>
             <td><?php echo $d;?></td> <td><?php echo $DIS_STATUS;?></td><td><?php echo $dd;?></td></tr>
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
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="in_patient_enquiry.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="in_patient_enquiry.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="in_patient_enquiry.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="in_patient_enquiry.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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