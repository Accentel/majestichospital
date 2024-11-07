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
function save_fun(str,id)
{ 

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	//var ttt=document.getElementById('tott').value;
	//alert(ttt);

var qty1=document.getElementById("vat"+str).value;
var qty2=document.getElementById("sgst"+str).value;
var qty3=document.getElementById("cgst"+str).value

//if(qty1=="" || qty1==null){alert("Enter Modified Qty ");document.getElementById("vat"+str).focus(); return;}

//alert(qty1);
//if(qty1 < 0)
//{
//alert("Modified.Qty is not less than zero");
//document.getElementById("vat"+str).focus();
//document.getElementById("vat"+str).value='';
//document.getElementById("sgst"+str).focus();
//document.getElementById("sgst"+str).value='';
//document.getElementById("cgst"+str).focus();
//document.getElementById("cgst"+str).value='';

//return ;


//}
//alert(qty1);
//alert(qty2);
//alert(qty3);

	var url="product_insert.php";
	url=url+"?qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&id="+id;
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

	<div id="conteneur" >
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">PRODUCT EDIT</h1>
          
<!--<form name="frm" method="post" >               
<table align="right" cellspacing="2">
<tr><td>Search By Product Name : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>-->
<form name="frm" method="post" >               
<table align="right" cellspacing="2">
<tr>
   <td width="46%" class="label1">Product Type Name <span class="style2">*</span> : </td>
	<td width="54%">
	<select name="tname" id="tname" required style="width:230px;height:22px;">
	<option value=""> -- Select Type -- </option>
	 <?php
	    include("config.php");
		$sql = mysqli_query($link,"select prdtype_code,prdtype_name from phr_prdtype_mast order by prdtype_name")or die(mysqli_error($link));
		if($sql){
			while($row = mysqli_fetch_array($sql))
			{
				$prdcode=$row[1];
				$prdname=$row[1];
				
	?>
	<option value="<?php echo $prdcode ?>"><?php echo $prdname ?></option>
	<?php
			}
		}
	?>
	</select></td> 
    <td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>

    </tr></table>
</form>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
	<thead>
	  <tr>
		<!--<th class="TH1">Prd.Code</th>-->
					  <th class="TH1">Prd.Name</th>
					<!--  <th class="TH1">UOM </th>-->
					  <th class="TH1">GST(%) </th>
					  <th class="TH1">SGST(%) </th>
					 <!--  <th class="TH1">Cost</th> -->
					   <th class="TH1">CGST(%)</th>
					  <!-- <th class="TH1">Modified.Qty</th>-->
					   <th class="TH1">Save</th>
	  </tr>
	</thead>
	<?php 
			 
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['tname'];
			  
			  $sq = mysqli_query($link,"select * from  phr_prddetails_mast where `TYPE`='$n'")or die(mysqli_error($link));
				$tot=mysqli_num_rows($sq);
				$fintot = 0;
			  $row = 0;
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			 
			 //$prdcode=$prd_code;
		$id=$res['id'];
		 //$prdtype_code=$row['PRD_NAME'];
		 $prd_name=$res['PRD_NAME'];
	 	// $unit_code=$row[2];
		$vat=$res['vattax']; 
		// $pck_id=$row[4];
		 $type_name=$res['TYPE'];
		 $sgst=$res['sgst'];
		 $cgst=$res['cgst'];
			 
			 
			  //$tot1=$res[4];  
				//$fintot=$fintot+$tot1;
				   
				//$unitcost=$res[3];  
				//$nitem=$res[7];  
				//$eachcost=($unitcost/$nitem);

				//$eachcost=round(($eachcost*100)/100);
						 $row++;
			 ?>
             <tr height="25px">
			 
			 <td><?php  echo $prd_name;?></td>
     
             
			 <td>
             <select name="vat<?php echo $row ?>" id="vat<?php echo $row ?>">
	<option> --- Select GST Tax --- </option>
             <option value="5" <?php if($vat=='5'){echo "selected";}  ?>>5</option>
	<option value="12" <?php if($vat=='12'){echo "selected";}  ?>>12</option>
	<option value="18" <?php if($vat=='18'){echo "selected";}  ?>>18</option>
    <option value="28" <?php if($vat=='28'){echo "selected";}  ?>>28</option>
       </select>      
             
           <?php /*?>  <input name="vat<?php echo $row ?>" size="5" value="<?php echo $vat;  ?>"  id="vat<?php echo $row ?>" type="text"  /><?php */?>
             </td>
			<!-- <td><?php  $row['sgst'];  ?></td>-->
			 <td>
           
            
             <select name="sgst<?php echo $row ?>" id="sgst<?php echo $row ?>">
	<option> --- Select SGST Tax --- </option>
	<option value="2.5" <?php if($sgst=='2.5'){echo "selected";}  ?>>2.5</option>
	<option value="6" <?php if($sgst=='6'){echo "selected";}  ?>>6</option>
	<option value="9" <?php if($sgst=='9'){echo "selected";}  ?>>9</option>
    <option value="18" <?php if($sgst=='14'){echo "selected";}  ?>>14</option>
       </select>   
             </td>
			
			 <td>
             
             
              <select name="cgst<?php echo $row ?>" id="cgst<?php echo $row ?>">
	<option> --- Select CGST Tax --- </option>
	<option value="2.5" <?php if($cgst=='2.5'){echo "selected";}  ?>>2.5</option>
	<option value="6" <?php if($cgst=='6'){echo "selected";}  ?>>6</option>
	<option value="9" <?php if($cgst=='9'){echo "selected";}  ?>>9</option>
    <option value="18" <?php if($cgst=='14'){echo "selected";}  ?>>14</option>
       </select>   
             
			 <td style="text-align:center;"><A href="javascript:save_fun(<?php echo $row ?>,<?php echo $id ?> );"><img src="images/save1.gif" border="0"></A></td></tr>
             <div id="aa"> <input type="hidden" name="ccc" id="ccc" value=""/></div>
					<input type="hidden" name="tott" id="tott" value="<?php echo $tot ?>" />
					<?php $i++;}
			  }
		
			   }
			 
			 ?>
			</table>
              <?php /*?><?php if($tot==0){?>
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
<?php */?>
 
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