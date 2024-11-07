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
function report()
{
   if (document.form.fromdate.value == "") {
				alert("Please enter From Date.");
				document.fromdate.focus();
				return (false);
				}
	if (document.form.todate.value == "") {
				alert("Please enter To Date.");
				document.todate.focus();
				return (false);
				}
	
      var s_date=document.form.fromdate.value;
	  var e_date=document.form.todate.value;
	  window.open('gst_rpt1.php?s_date='+s_date+'&e_date='+e_date,'mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')

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
          <h1 style="color:red;" align="center">PURCHASE ENTRY GST REPORT</h1>
          
          <form name ="form" method="post" action="">
          <table style="margin-left:400px;" cellspacing="10">
          
          <tr height="30px">
          <td class="label1">From Date:</td>
          <td><input name="fromdate" class="tcal" type="text" style="height:26px;padding-left:5px;" value="<?php echo $today = date("Y-m-d"); ?>"  id="fromdate"/></td>
          </tr>
          <tr height="30px">
          <td class="label1">To Date:</td>
          <td><input type="text" name="todate" id="todate" style="height:26px;padding-left:5px;" value="<?php echo $today = date("Y-m-d"); ?>" class="tcal"/></td>
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