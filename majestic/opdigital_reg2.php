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
          <h1 style="color:red;" align="center">Discharge Patients List</h1>
          
                       <form name="frm" method="post" >
           
                
<table width="70%" style="margin-left:300px;"cellspacing="2">

<tr><td></td>
<td align="right">Search By UMR No. : <input type="text" name="reg" id="reg"  /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>
<!--<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="patientregister.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>-->
<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO.</TH><TH>UMR No.</TH><TH>PATIENT NAME</TH><TH>ADMISSION DATE</TH><TH>ADD</TH></tr>
<?php 
			  include("config.php");
			 
			  
			  if(isset($_REQUEST['submit'])){ 
			  $n=$_REQUEST['name'];
			  $r=$_REQUEST['reg'];
			  $d=date('Y-m-d');

				if($n != "" && $r != "")
				{
					$sq = mysql_query("SELECT * FROM `dischargemedical` where mrno='$r' and pname='$n'");
				}
			    else if($n != "")
				{
					$sq = mysql_query("SELECT * FROM `dischargemedical` where pname='$n'");
				
				}
			    else if($r != "")
				{
					//$sq = mysql_query("SELECT * FROM `dischargemedical` where mrno='$r'");
					  $sq1="SELECT a.mid,a.mrno,b.pname,b.admit FROM `dischargemedical` a, adddischarge b where a.date1='$d' and a.mrno=b.mrno and a.mrno='$r' order by a.mid desc";
			
				$sq = mysql_query($sq1);
				}
			  
			   if($sq)
			   {
			   $tot=mysql_num_rows($sq);
			  $i = 1;
			  while($res=mysql_fetch_array($sq)){
			 
			 $mrno = $res['mrno'];
			  //$optype = $res['optype'];
			  $pname=$res['pname'];
			  //$adate = $res['admit'];
			  $adate = $res['admit'];
			  $b=date("d-m-Y", strtotime($adate));
			  $id=$res['mid'];
			 ?>
            <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td>
           <td><?php echo $mrno;?></td><td><?php echo $pname;?></td>
             <td><?php echo $b;?></td></td><td style="text-align:center;">
             <a href="addsalesentry2.php?mrnum=<?php echo $mrno?>&optype=<?php echo $optype?>&id=<?php echo $id?>"><img src="images/add.gif" /></a></td>
             </tr>
             <?php }
			 }
			 }
			 else{
				 $d=date('Y-m-d');
				  $fff="SELECT a.mid,a.mrno,b.pname,b.admit FROM `dischargemedical` a, adddischarge b where a.date1='$d' and a.mrno=b.mrno order by a.mid desc";
				$sq=mysql_query($fff);
				
			if($sq){	
				$tot=mysql_num_rows($sq);
			  $i = 1;
			  while($res=mysql_fetch_array($sq)){
			 //$registerno=$res['registerno'];
			  $mrno = $res['mrno'];
			  //$optype = $res['optype'];
			  $pname=$res['pname'];
			  //$adate = $res['admit'];
			  $adate = $res['admit'];
			  $b=date("d-m-Y", strtotime($adate));
			  $id=$res['mid'];
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
             <td><?php echo $mrno;?></td><td><?php echo $pname;?></td>
             <td><?php echo $b;?></td></td><td style="text-align:center;">
             <a href="addsalesentry2.php?mrnum=<?php echo $mrno?>&id=<?php echo $id?>"><img src="images/add.gif" /></a></td>
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
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="opdigital-reg2.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="opdigital-reg2.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="opdigital-reg2.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="opdigital-reg2.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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