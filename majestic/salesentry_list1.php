<?php //include('config.php');

session_start();

if($_SESSION['name1'])
{
    $remainig_records = -1;//this is used from where the records should display
    $rowscounts = 0;        // if there is any records in next page it became >0 else rowscounts is 0 
    $tot=0;
    $m=0;
    $pagecount = 0;// it is used for page number
    $nd =30;//no of records per page
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

	<div id="conteneur" >
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?><?php */?>
            <?php
			include("logo.php");
			?>
		<?php
			include("main_menu.php");
			?>
            
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">SALES LIST</h1>
          <form name="frm" method="post" >
                

      
      <table width="100%" border="0" cellspacing="5" cellpadding="1">
             <tr>
                <td width="68" class="label1"><a href="addsalesentry.php" title="Add New Record"><img src="images/add1.gif"></a></td>
          
                <td width="463" class="label1" ><div align="right">
                  <td style="text-align:right;">Mr Num:</td>
                <td ><input name="sdate"  type="text"  id="searchingpop"  autocomplete="off"/>
                </td>
                          
			<td align="left"><input name="submit" type="submit" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" value="" /></td>
              </tr>
            </table>
			</form>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="expense_table" style="font-size:14px;">
              <thead>
                <tr height="30px">
				<th class="TH1">S.No.</th>	
                 <th class="TH1">Customer Name </th>
				 <th class="TH1">Customer Type </th>
                  <th class="TH1">Sale Date</th>
                  <th class="TH1">Total Amount</th>
				     <th class="TH1">View </th>
                     <th class="TH1">Bill </th>
  					<!----------- <th class="TH1">View </th>-->
                 
				
                </tr>
                <?php
				include("config.php");
				if(isset($_REQUEST['submit'])){
				
				 $d = $_REQUEST['sdate'];
				
				if($d != ""){
					
					 $s="select distinct a.lr_no,a.cust_name,a.inv_no,a.total,a.sal_date,a.customer_type from
					 phr_salent_mast as a,phr_salent_dtl as b where a.lr_no=b.lr_no and a.mrnum='$d' order by a.lr_no desc";
					$sqls=mysql_query("$s");
				
				}
				}else{
				
				
			
				
				 $x="select distinct a.lr_no,a.cust_name,a.inv_no,a.total,a.sal_date,a.customer_type
				 from phr_salent_mast as a,phr_salent_dtl as b where a.lr_no=b.lr_no order by a.lr_no desc limit 0,100";
				$sqls=mysql_query($x);
				
				}
				$tot=mysql_num_rows($sqls);
				
				
				$i=1;
				while($row=mysql_fetch_array($sqls)){
				 $cust_name=$row[1];
				   $cust_type = $row[5];
				if($cust_type=="p"){$ctype="Patient";}elseif($cust_type=="c"){$ctype="Customer";}else if($cust_type=="p1"){$ctype="Patient";}
				
				  //$rs1=mysql_query("Select patientname from patientregister where registerno='$cust_name' ");
				  
				  
				  
				   $rest = substr("$cust_name", 0, 3); 
				if($rest=='DHS'){
					$ctype="Out Patient";
				$rs1=mysql_query("Select a.patientname from patientregister a,`op_pat_dlt` b where
				 a.registerno=b.PAT_REGNO and a.registerno='$cust_name'");
				} else {
					$ctype="In Patient";
				$rs1=mysql_query("Select a.patientname from patientregister a,`ip_pat_admit` b where a.registerno=b.PAT_REGNO and
				 b.pat_no='$cust_name'");
				}
				  
					while($rw1 = mysql_fetch_array($rs1)){ $cust_name =$rw1[0];}
					$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;

?>
                <tr height="25px"><td><?php echo $i?></td><td><?php echo $cust_name ?></td><td><?php if($cust_type=='c'){ echo "Customer";
				} else if($cust_type=='p1'){ echo "Out Patient"; }else if($cust_type=='p'){ echo "In Patient"; }?></td><td><?php echo date('d-m-Y',strtotime($row[4])) ?></td><td><?php echo $row[3] ?></td><td><a href="salesentry_view.php?lr_id=<?php echo $row[0] ?>"><img src="images/view.gif" /></a></td><td><a href="medbill.php?lr_id=<?php echo $row[0] ?>" target="_blank"><img src="images/print.png" /></a>
				
				<a href="deletesale.php?lr_id=<?php echo $row[0] ?>" target="_blank"><img src="images/delete.gif" /></a>
				<a href="duesale.php?lr_id=<?php echo $row[0] ?>" target="_blank">Pay</a>
				</td></tr>
				<?php }$i++;}
				 ?>
                </thead></table>
<?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="salesentry_list.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="salesentry_list.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="salesentry_list.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="salesentry_list.php?next=<?php echo (($records - 1) / $nd) ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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