<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header1.php");
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
	  window.open('pdf_salesreturn.php?s_date='+s_date+'&e_date='+e_date,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
	
}
</script>
	</head>

	<body>

	<div id="conteneur container">
	 <?php /*?> <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php */?>	
    
    <?php
			include("logo.php");
			include("main_menu.php");
			?>
    	
		  <div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
          <h1 style="color:red;" align="center">SALES RETURN REPORT</h1>
          
          <form method="post" action="" name="form">
          <table   class="table" cellspacing="10">
          
          <tr height="30px">
          <td class="label1">From Date:</td>
          <td><input name="fdate" class="tcal text" type="date" value="<?php echo $today = date("d-m-Y"); ?>"  id="fdate"/></td>
          </tr>
          <tr height="30px">
          <td class="label1">To Date:</td>
          <td><input type="date" name="tdate" id="tdate"  value="<?php echo $today = date("d-m-Y"); ?>" class="tcal text"/></td>
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