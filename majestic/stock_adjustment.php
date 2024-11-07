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
	$("#name").autocomplete("spname.php", {
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
	<script type="text/javascript">
function reload()
{
window.location.reload();
}
</script>
<script type="text/javascript">
function save_fun(str,inv,qty)
{ 

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	//var ttt=document.getElementById('tott').value;
	//alert(ttt);

var qty1=document.getElementById("qty"+str).value;
var prd=document.getElementById("prd_name"+str).value;
//alert(prd);
var batch=document.getElementById("batch"+str).value;
if(qty1=="" || qty1==null){alert("Enter Modified Qty ");document.getElementById("qty"+str).focus(); return;}

//alert(qty1);
if(qty1 < 0)
{
alert("Modified.Qty is not less than zero");
document.getElementById("qty"+str).focus();
document.getElementById("qty"+str).value='';

return ;
}
	var url="stock_adjustment_insert.php";
	url=url+"?inv="+inv+"&qty="+qty+"&qty1="+qty1+"&prd="+prd+"&batch="+batch;
//alert("url"+url);
	xmlHttp.onreadystatechange=stateChanged12;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	
	
}

function stateChanged12() 
{  	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
	
	document.getElementById("aa").innerHTML=xmlHttp.responseText;
	
	var bb=document.getElementById("ccc").value;
	//alert(bb);
	var s=1;
		 if(bb==s)
		 {
		  reload();
		 //document.getElementById("success").innerHTML="Updated Successfully";
		alert("Successfully Updated");
		
		 }
		 else
		 {
		 reload();
		//document.getElementById("success").innerHTML="Not Updated ";
		 alert("Not Updated");
		
		 }
	}
	
}


function GetXmlHttpObject()
{

var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}

</script>	
	</head>

	<body>

	<div id="conteneur">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">STOCK ADJUSTMENT</h1>
          
<form name="frm" method="post" >               
<table align="right" cellspacing="2">
<tr><td>Search By Product Name : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
	<thead>
	  <tr>
		<!--<th class="TH1">Prd.Code</th>-->
					  <th class="TH1">Prd.Name</th>
					<!--  <th class="TH1">UOM </th>-->
					  <th class="TH1">Batch No </th>
					  <th class="TH1">Exp.Dt </th>
					 <!--  <th class="TH1">Cost</th> -->
					   <th class="TH1">Aval.Qty</th>
					   <th class="TH1">Modified.Qty</th>
					   <th class="TH1">Save</th>
	  </tr>
	</thead>
	<?php 
			  include("config.php");
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  
			  $sq = mysqli_query($link,"select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.inv_id from phr_purinv_dtl as a,phr_prddetails_mast as b where a.PRODUCT_NAME=b.PRD_NAME and upper(a.product_name) like ('$n%')")or die(mysqli_error($link));
				$tot=mysqli_num_rows($sq);
				$fintot = 0;
			  $row = 0;
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $tot1=$res[4];  
				$fintot=$fintot+$tot1;
				   
				$unitcost=$res[3];  
				$nitem=$res[7];  
				$eachcost=($unitcost/$nitem);

				$eachcost=round(($eachcost*100)/100);
						 $row++;
			 ?>
             <tr height="25px">
			 
			<!-- <td><?php  $res[0];  ;?></td>-->
			 <td><?php echo $res[1];  ?>
             <input type="hidden" name="prd_name<?php echo $row ?>" id="prd_name<?php echo $row ?>" value="<?php echo $res[1];  ?>" />
             </td>
			<!-- <td><?php  $res[2];  ?></td>-->
			 <td><?php echo $res[5];  ?></td>
              <input type="hidden" name="batch<?php echo $row ?>" id="batch<?php echo $row ?>" value="<?php echo $res[5];  ?>" />
			 <td><?php $d=$res[6];  echo date('d-m-Y',strtotime($d));?></td>
			 <td><?php echo $res[4];  ?></td>
			 <td><input name="qty<?php echo $row ?>" size="5"  id="qty<?php echo $row ?>" type="text"  /></td>
			 
			 <td style="text-align:center;"><A href="javascript:save_fun(<?php echo $row ?>,<?php echo $res[4];  ?> ,<?php echo $res[7];  ?> );"><img src="images/save1.gif" border="0"></A></td></tr>
             <div id="aa"> <input type="hidden" name="ccc" id="ccc" value=""/></div>
					<input type="hidden" name="tott" id="tott" value="<?php echo $tot ?>" />
                     <input type="text" name="prd_name" id="prd_name" value="<?php echo $res[1];  ?>" />
					<?php $i++;}
			 }
			 }else{ ?>
			 <?php
			 
			 $sq = mysqli_query($link,"select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.inv_id from phr_purinv_dtl as a,phr_prddetails_mast as b where a.PRODUCT_NAME=b.PRD_NAME group by a.PRODUCT_NAME")or die(mysqli_error($link));
	 
			  $tot=mysqli_num_rows($sq);
			  $fintot = 0;
			  $row = 0;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
				$tot1=$res[4];  
				$fintot=$fintot+$tot1;
				   
				$unitcost=$res[3];  
				$nitem=$res[7];  
				$eachcost=($unitcost/$nitem);

				$eachcost=round(($eachcost*100)/100);
						 $row++;
			 
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			  
			 ?>
             <tr height="25px">
			 
			<!-- <td><?php  $res[0];  ;?></td>-->
			 <td><?php echo $res[1];  ?>
              <input type="hidden" name="prd_name<?php echo $row ?>" id="prd_name<?php echo $row ?>" value="<?php echo $res[1];  ?>" />
             </td>
		<!--	 <td><?php  $res[2];  ?></td>-->
			 <td><?php echo $res[5];  ?>
              <input type="hidden" name="batch<?php echo $row ?>" id="batch<?php echo $row ?>" value="<?php echo $res[5];  ?>" />
             </td>
			 <td><?php $d=$res[6];  echo date('d-m-Y',strtotime($d));?></td>
			 <td><?php echo $res[4];  ?></td>
			 <td><input name="qty<?php echo $row ?>" size="5"  id="qty<?php echo $row ?>" type="text"  /></td>
			 
			 <td style="text-align:center;"><A href="javascript:save_fun(<?php echo $row ?>,<?php echo $res[4];  ?> ,<?php echo $res[7];  ?>  );"><img src="images/save1.gif" border="0"></A></td></tr>
             <div id="aa"> <input type="hidden" name="ccc" id="ccc" value=""/></div>
					<input type="hidden" name="tott" id="tott" value="<?php echo $tot ?>" />
                   
			 <?php $i++;}}
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
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="stock_adjustment.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="stock_adjustment.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="stock_adjustment.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="stock_adjustment.php?next=<?php echo (($records - 1) / $nd) ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
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