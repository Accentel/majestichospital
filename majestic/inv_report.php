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
	<script type="text/javascript">
function report()
{
   		
	//if (document.form.tdate.value == "") {
				//alert("Please enter To Date.");
				//document.tdate.focus();
				//return (false);
				//}
      var batchno=document.form.batchno.value;
      var pname=document.form.pname.value;
	 // var e_date=document.form.tdate.value;
	   //var prdcode=document.form.prdcode.value;
	  //window.open('PDF_SalesEntry.jsp?s_date='+s_date+'&e_date='+e_date+'&prdcode='+prdcode,'mywindow1','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
    window.open('inv_report1.php?batchno='+batchno+'&pname='+pname,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
<script type="text/javascript">
function product(){
//var fdate=document.form.fdate.value
//var tdate=document.form.tdate.value;
//var url="get_saleproduct_1.jsp?fdate="+fdate+"&tdate="+tdate;
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

	<body>

	<div id="conteneur">

		  <?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
			<?php
			include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">Invoice REPORT</h1>
          
          <form name ="form" method="post" action="">
          <table style="margin-left:400px;" cellspacing="10">
          
          <tr height="30px">
          <td class="label1">Batch No : </td>
          <td><input type="text" name="batchno" id="batchno" style="height:26px;padding-left:5px;"  class=""/></td>
          </tr>
           <tr height="30px">
          <td class="label1">OR : </td>
         
          </tr>
 <tr height="30px">
          <td class="label1">Product Name : </td>
          <td><input type="text" name="pname" id="pname" style="height:26px;padding-left:5px;"  class=""/></td>
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