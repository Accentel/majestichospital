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
	//alert("1");
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
   if(document.form.repfor.value =="")
	{
		alert("Please Select Type for vat Report ");
		document.repfor.focus();
		return(false);
	}


	var sdate=document.form.fdate.value;
	var edate=document.form.tdate.value;
	var protype=document.form.repfor.value;
	
 window.open('PDF_VatReport.php?ptype='+protype+'&s_date='+sdate+'&e_date='+edate,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
}
</script>



	</head>

	<body>

	<div id="conteneur">

		<?php /*?>  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
			<?php
			include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">GST REPORT</h1>
          
          <form name ="form" method="post" action="">
          <table style="margin-left:400px;" cellspacing="10">
          
          <tr height="30px">
          <td class="label1">From Date:</td>
          <td><input name="fdate" class="tcal" type="text" style="height:26px;padding-left:5px;" value="<?php echo $today = date("Y-m-d"); ?>"  id="fdate"/></td>
          </tr>
          <tr height="30px">
          <td class="label1">To Date:</td>
          <td><input type="text" name="tdate" id="tdate" style="height:26px;padding-left:5px;" value="<?php echo $today = date("Y-m-d"); ?>" class="tcal"/></td>
          </tr>
		
			
			
			</tr>
			  <tr><td class="label">Report For:</td>
			  <td><select name="repfor"><option value="">----Select Any One----</option>
			  <option value="PI">Purchase Invoice</option>
			  <option value="PR">Purchase Return</option>
			  <option value="SE">Sales Entry</option>
			  <option value="SR">Sales Returns</option>
			 </select></td></tr>
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