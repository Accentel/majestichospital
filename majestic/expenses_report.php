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
	 // var etype=document.form.etype.value;
	  window.open('expenses_print.php?s_date='+s_date+'&e_date='+e_date,'mywindow1','width=1020,height=700,toolbar=no,menubar=no')

}
</script>	
	</head>

	<body>

	<div id="conteneur">

		  
			<?php
			include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">EXPENSES REPORT</h1>
          
          <form name ="form" method="post" action="">
          <table style="margin-left:400px;" cellspacing="10">
          
          <tr height="30px">
          <td class="label1">From Date:</td>
          <td><input name="fromdate" class="tcal" type="text" style="height:26px;padding-left:5px;" value="<?php echo $today = date("d-m-Y"); ?>"  id="fromdate"/></td>
          </tr>
          <tr height="30px">
          <td class="label1">To Date:</td>
          <td><input type="text" name="todate" id="todate" style="height:26px;padding-left:5px;" value="<?php echo $today = date("d-m-Y"); ?>" class="tcal"/></td>
          </tr>
		  <?php /*?><tr height="30px">
          <td class="label1">Expense Type:</td>
          <td>
			<select name="etype" id="etype" style="width:160px;height:26px;" >
			<option value=""> -- Select -- </option>
			<?php
		$sql = mysql_query("select * from expensetype ");
		if($sql){
			while($res = mysql_fetch_array($sql)){
	?>
	<option value="<?php echo $res['id'] ?>"><?php echo $res['exptype'] ?></option>	
	<?php } }	?>
			</select>
		  </td>
          </tr><?php */?>
         
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