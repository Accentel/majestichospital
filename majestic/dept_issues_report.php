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
	if (document.form.tdate.value == "") {
				alert("Please enter To Date.");
				document.tdate.focus();
				return (false);
				}
      var s_date=document.form.fdate.value;
	  var e_date=document.form.tdate.value;
	   var deptcode=document.form.deptcode.value;
	  window.open('PDF_DeptIssues.php?s_date='+s_date+'&e_date='+e_date+'&deptcode='+deptcode,'mywindow1','width=1020,height=800,toolbar=no,menubar=no,scrollbars=yes')

	
}
</script>
<script>
function product(){
var fdate=document.form.fdate.value
var tdate=document.form.tdate.value;
var url="get_deptnames.php?fdate="+fdate+"&tdate="+tdate;
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

	<body>

	<div id="conteneur">

		 <?php /*?> <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
			<?php
			include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">DEPARTMENT ISSUES REPORT</h1>
          
          <form name ="form" method="post" action="">
          <table style="margin-left:380px;" cellspacing="10">
          
          <tr height="30px">
          <td class="label1">From Date:</td>
          <td><input name="fdate" class="tcal" type="text" style="height:26px;padding-left:5px;" value="<?php echo $today = date("d-m-Y"); ?>"  id="fdate"/></td>
          </tr>
          <tr height="30px">
          <td class="label1">To Date:</td>
          <td><input type="text" name="tdate" id="tdate" style="height:26px;padding-left:5px;" value="<?php echo $today = date("d-m-Y"); ?>" class="tcal"/></td>
          </tr>
		
			<tr>
			 <td class="label1" ><div align="right">Department Name: </div></td>
						  <td  align="left"><div id="retrive1">
			<select name="deptcode" id="deptcode" style="width:160px;height:22px;" >
			<option value="">--Select Dept Name--</option>
			<?php
				$query =mysql_query("select distinct b.dept_name,a.dept from stock_transfer as a,dept as b where a.dept=b.dept_code ");

				  
				  while($row = mysql_fetch_array($query))
				  {
					$ss=$row[0];
				 
				 //out.print(ss);
			?>

			<option value="<?php echo $row[1] ?>"><?php echo $ss; ?></option>
			<?php } ?>
			</select>

						</div>  </td>

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