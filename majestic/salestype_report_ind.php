<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])

{

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
   		if (document.form.fdate.value == "") {
				alert("Please enter From Date.");
				document.fdate.focus();
				return (false);
				}
//	if (document.form.tdate.value == "") {
				//alert("Please enter To Date.");
				//document.tdate.focus();
				//return (false);
				//}
      var s_date=document.form.fdate.value;
	  //var e_date=document.form.tdate.value;
	   var prdcode=document.form.prdcode.value;
	  // alert(prdcode)
	 // window.open('PDF_SalesEntry_Report_ind.jsp?s_date='+s_date+'&e_date='+e_date+'&prdcode='+prdcode,'mywindow1','width=1020,height=800,toolbar=no,menubar=no,scrollbars=yes')
	  
window.open('pdf_salesentry_report_ind.php?s_date='+s_date+'&prdcode='+prdcode,'mywindow1','width=1020,height=800,toolbar=no,menubar=no,scrollbars=yes')	  
	  
	
}
</script>
<script>
function product(){
var fdate=document.form.fdate.value
//var tdate=document.form.tdate.value;
//var url="get_saleproduct1.jsp?fdate="+fdate+"&tdate="+tdate;
var url="get_saleproduct1.php?fdate="+fdate;
//alert(url);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

	
}

function stateChanged() 
{ 
	if(xmlHttp.readyState==4)
	{ 
      // alert(	xmlHttp.responseText);
		document.getElementById("retrive1").innerHTML=xmlHttp.responseText;
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

	<body onload="product()">

	<div id="conteneur">

		<?php /*?>  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
			<?php
			include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">SALES ENTRY & RETURN INFO</h1>
          
          <form name ="form" method="post" action="">
          <table style="margin-left:310px;" cellspacing="10">
          
          <tr height="30px">
          <td class="label1">Date : </td>
          <td><input type="text" name="fdate" id="fdate" style="height:26px;padding-left:5px;" value="<?php echo $today = date("d-m-Y"); ?>" class="tcal"/></td>
          </tr>
		
		<tr>
		 <td class="label1" ><div align="right">Product Name : </div></td>
		<td  align="left"  >
        
        
      <?php /*?>   <input id=\"prdcode\" list=\"city1\" name="prdcode"  class="text"required >
<datalist id=\"city1\" >

<?php  include("config.php");
$sql="select  distinct product_code,prd_name from phr_salent_dtl as a,phr_prddetails_mast as b where a.product_code=b.prd_code ";  // Query to collect records
$r=mysqli_query($sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[prd_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist><?php */?>
        
        
		<select name="prdcode" id="prdcode" style="width:230px;height:22px;">
		<option value="">--Select Product Name--</option>
		<?php
		$query =  mysqli_query($link,"select distinct product_code,prd_name from phr_salent_dtl as a,phr_prddetails_mast as b where a.product_code=b.prd_code ")or die(mysqli_error($link));
		if($query)
		{
			while($row = mysqli_fetch_array($query))
			{
		?>
		<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
		<?php
			}
		}
		?>
		</select>
		
		</td>
		</tr>
		
          <tr height="50px">
          <td colspan="2" align="center"><input type="submit" name="submit" value="Report" class="butt" onclick="report();"/> <input type="button" name="but" value="Close" class="butt" onclick="window.location.href='home.php'"/></td>
          
          </tr>
          </table>
          </form>
          
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