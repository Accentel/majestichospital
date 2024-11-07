<?php //include('config.php');

session_start();

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
$().ready(function() {
	$("#prdcode").autocomplete("get_saleproduct02.php", {
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
function report()
{
   		if (document.form.fdate.value == "") {
				alert("Please enter From Date.");
				document.fdate.focus();
				return (false);
				}
	if (document.form.tdate.value == "") {
				alert("Please enter To Date.");
				document.tdate.focus();
				return (false);
				}
      var s_date=document.form.fdate.value;
	  var e_date=document.form.tdate.value;
	   var prdcode=document.form.prdcode.value;
	   var ctype=document.form.ctype.value;
	   var cname=document.form.cname.value;
	   var cname1=document.form.cname1.value;
	  window.open('pdf_salesentry.php?s_date='+s_date+'&e_date='+e_date+'&prdcode='+prdcode+'&ctype='+ctype+'&cname='+cname+'&cname1='+cname1,'mywindow1','width=1020,height=800,toolbar=no,menubar=no,scrollbars=yes')

	
}
</script>
<script type="text/javascript">
function product(){
var fdate=document.form.fdate.value
var tdate=document.form.tdate.value;
var url="get_saleproduct2.php?fdate="+fdate+"&tdate="+tdate;
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
		document.getElementById("prdcode").innerHTML=xmlHttp.responseText;
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
<script>
	function fun1()
	{
		var ctype = document.getElementById("ctype").value;
		if(ctype == "c"){
			document.getElementById("op").style.display='';
			document.getElementById("ip").style.display='none';
		}else if(ctype == "p"){
			document.getElementById("ip").style.display='';
			document.getElementById("op").style.display='none';
		}
	}
</script>
	</head>

	<body >

	<div id="conteneur">

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
			<?php
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">SALES ENTRY REPORT</h1>
          
          <form name="form" method="post" action="">
          <table width="100%" cellspacing="10">
          
          <tr height="30px">
          <td width="40%" class="label1">From Date:</td>
          <td><input name="fdate" class="tcal" type="text" style="width:225px;height:20px;padding-left:5px;" value="<?php echo $today = date("d-m-Y"); ?>"  id="fdate"/></td>
          </tr>
          <tr height="30px">
          <td class="label1">To Date:</td>
          <td><input type="text" name="tdate" id="tdate" style="width:225px;height:20px;padding-left:5px;" value="<?php echo $today = date("d-m-Y"); ?>" class="tcal"/></td>
          </tr>
         <tr>
			 <td class="label1" >Product Name: </td>
			<td  align="left">
			<select name="prdcode" id="prdcode" style="width:230px;height:22px;">
		<option value="">--Select Product Name--</option>
			<?php
		$query =  mysql_query("select distinct product_code,prd_name from phr_salent_dtl as a,phr_prddetails_mast as b where a.product_code=b.prd_code ");
		if($query)
		{
			while($row = mysql_fetch_array($query))
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
		<tr>
			 <td class="label1" >Customer Type: </td>
			<td  align="left">
			<select name="ctype" id="ctype" style="width:230px;height:22px;" onchange="fun1();">
			<option value="">--Select Type--</option>
			<option value="c">Customer / OP</option>
			<option value="p">IP Patient</option>
			
			</select>
		</td>
		</tr>
		<tr style="display:none"  id="ip">
			 <td  class="label1" >Consultant Name: </td>
			<td  align="left">
			<select name="cname" id="cname" style="width:230px;height:22px;">
			<option value="">--Select Consultant--</option>
			<?php
			$query =  mysql_query("select distinct Consultant_Name from phr_salent_mast as a,phr_salent_dtl as b where a.lr_no=b.lr_no ");
			if($query)
			{
				while($row = mysql_fetch_array($query))
				{
			?>
			<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
			<?php
				}
			}
			?>		
			</select>
		</td>
		</tr>
		<tr style="display:none"  id="op">
			 <td width="40%" class="label1" >Consultant Name: </td>
			<td  align="left">
			<select name="cname1" id="cname1" style="width:230px;height:22px;">
			<option value="">--Select Consultant--</option>
			<option value="Lotus Hospital">Lotus Hospital</option>
			<option value="Dr. CH.Veeramma">Dr. CH.Veeramma</option>
			
			</select>
		</td>
		</tr>	
          <tr height="50px">
          <td colspan="2" align="center"><input type="submit" name="submit" value="Report" onclick="report();" class="butt"/> <input type="button" name="but" value="Close" class="butt" onclick="window.location.href='home.php'"/></td>
          
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