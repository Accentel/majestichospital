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
<div id="conteneur">

		  <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			?>
<script>
 function dis_fun(str){

window.open('final_bill_print1.php?id='+str+'&p=0','mywindow1','width=1020,height=800,toolbar=no,menubar=no,scrollbars=yes')
 }
 </script>
 <script>
function dis_fun1(){//alert(str)
	
    if (confirm('Are you sure Want to Discharge This Patient?'))
    {
      return true;
    }
	else{
		return false;
	}
    }
</script>
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#name").autocomplete("fname.php", {
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

<?php /*?>	<div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?><?php */?>
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">FINAL BILL</h1>
          
                       <form name="frm" method="post" >
           
                
<table width="70%" style="margin-left:300px;"cellspacing="2">

<tr><td></td><td>Search By Patient Name : <input type="text" name="name" id="name"  /></td>
<td>Search By Bill Date: <input type="text" name="reg" id="reg" class="tcal" /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_final_bill.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO.</TH><TH>UMR.NO</TH><TH>PAT.NO</TH><TH>PATIENT NAME</TH><TH>BILL DATE</TH><TH>ADMISSION DATE</TH><TH>DISCHARGE DATE</TH><TH>TOTAL</TH><TH>PAID</TH><TH>BALANCE</TH><TH>EDIT</TH><TH>DUE</TH><TH>REPORT</TH><TH>DISCHARGE</TH></tr>
<?php 
			  include("config.php");
			  
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  $r=$_REQUEST['reg'];

				if($n != "" && $r != "")
				{
					$r=date('Y-m-d',strtotime($_REQUEST['reg']));
					$sq=mysqli_query($link,"SELECT * FROM final_bill  where PatientName = '$n' and a.BILL_DATE = '$r'");
		
				}
			    else if($n != "")
				{
					$sq=mysqli_query($link,"SELECT * FROM final_bill  where PatientName = '$n'");
		
				
				}
			    else if($r != "")
				{
					$r=date('Y-m-d',strtotime($_REQUEST['reg']));
					$sq=mysqli_query($link,"SELECT * FROM final_bill  where BILL_DATE = '$r'");
		
				
				}
			  
			   if($sq)
			   {
			   $tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 $mrno=$res['PatientMRNo'];
			  $a = $res['PatientNo'];
			  $h=$res['PatientName'];
			  $adate = $res['AdmissionDate'];
			  $b=date("d-m-Y", strtotime($adate));
			  $disdate = $res['DischargeDate'];
			  $d=date("d-m-Y", strtotime($disdate));
			 // $c=$res['NETAMOUT'];
			//$ctype = $res['CONCESSION_TYPE'];
			  $billno =$res['BILL_NO'];
			  $billdate = $res['BILL_DATE'];
			  $netamt = $res['netamt'];
			  $totpaid = $res['totpaid'];
			  $totdue = $res['totdue'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $mrno;?></td><td><?php echo $a;?></td><td><?php echo $h;?></td><td><?php echo $billdate;?></td><td><?php echo $b;?></td><td><?php echo $d;?></td><td><?php echo $netamt;?></td><td><?php echo $totpaid;?></td><td><?php echo $totdue;?></td><td><a href="edit_final_bill.php?id=<?php echo $billno?>"><img src="images/edit.gif" /></a></td>
             
            <td><?php if($totdue=='0.00'){ ?>
   
   <img src="images/pay.png" height="21" />
   <?php }else{?>
    <a href="due_final_bill.php?id=<?php echo $billno?>"><img src="images/pay.png" height="21" /></a>
   <?php }?></td> 
             
             
             <td style="text-align:center;">
             
             <?php if($totdue=='0.00'){ ?>
   
   <img src="images/pdf_icon.gif" height="21" />
   <?php }else{?>
    <a href="javascript:dis_fun(<?php echo $billno ?>)"><img src="images/pdf_icon.gif" /></a>
   <?php }?>
             
            
             
             
             
             
             </td><td style="text-align:center;"><A href="final_bill_print1.php?id=<?php echo $billno ?>" onclick="return dis_fun1();"><img src="images/dis.png"></A></td></tr>
             	 
				 <?php $i++;}
			 }
			 }
			 else{
				 $t="SELECT * from final_bill order by BILL_NO desc" ;
				$sq=mysqli_query($link,$t);
		
			if($sq){	
				$tot=mysqli_num_rows($sq);
			  $i = 1;
			  while($res=mysqli_fetch_array($sq)){
			 $mrno=$res['PatientMRNo'];
			  $a = $res['PatientNo'];
			  $h=$res['PatientName'];
			  $adate = $res['AdmissionDate'];
			  $b=date("d-m-Y", strtotime($adate));
			  $disdate = $res['DischargeDate'];
			  $d=date("d-m-Y", strtotime($disdate));
			  $c=$res['netamt'];
			   $netamt = $res['netamt'];
			  $totpaid = $res['totpaid'];
			  $totdue = $res['totdue'];
			 // $ctype = $res['CONCESSION_TYPE'];if($ctype == ""){ $ctype="----";}
			  $billno =$res['BILL_NO'];
			  $billdate = date('d-m-Y',strtotime($res['BILL_DATE']));
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $mrno;?></td><td><?php echo $a;?></td><td><?php echo $h;?></td><td><?php echo $billdate;?></td><td><?php echo $b;?></td><td><?php echo $d;?></td><td><?php echo $netamt;?></td>
             <td><?php echo $totpaid;?></td><td><?php echo $totdue;?></td><td><a href="edit_final_bill.php?id=<?php echo $billno?>"><img src="images/edit.gif" /></a></td>
   <td>
   
   <?php if($totdue=='0.00'){ ?>
   
   <img src="images/pay.png" height="21" />
   <?php }else{?>
    <a href="due_final_bill.php?id=<?php echo $billno?>"><img src="images/pay.png" height="21" /></a>
   <?php }?>
   
   
   </td>           
             <td style="text-align:center;"> <?php if($totdue=='0.00'){ ?>
   
    <a href="final_bill_print1.php?id=<?php echo $billno ?>" onclick="return dis_fun1();"><img src="images/pdf_icon.gif" height="21" /></a>
   <?php }else{?>
    <img src="images/pdf_icon.gif" />
   <?php }?>
   <td>
           <img src="images/dis.png"></A></td></tr>
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
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="final_bill.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="final_bill.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="final_bill.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="final_bill.php?next=<?php echo (($records - 1) / $nd) ?> >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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