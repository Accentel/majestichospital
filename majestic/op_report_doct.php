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
	  var doct=document.form.doctor.value;
	  window.open('view_in_patient_admit11.php?s_date='+s_date+'&e_date='+e_date+'&doct='+doct,'mywindow1','width=1020,height=700,toolbar=no,menubar=no')

}
</script>	
	</head>

	<body>

	<div id="conteneur container">

		 <!-- <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		-->	<?php
		include("logo.php");
			include("main_menu.php");
			?>
		 <div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
          <h1 style="color:red;" align="center">OUT PATIENT REPORT</h1>
           <fieldset style="border:1px solid; height:auto; padding:10px;
          width:auto;">
          <form name ="form" method="post" action="">
          <table  class="table" cellspacing="10">
          
          <tr height="30px">
          <td class="label1">From Date:</td>
          <td><input name="fromdate" class="text" type="date"  value="<?php echo $today = date("d-m-Y"); ?>"  id="fromdate"/></td>
          </tr>
          <tr height="30px">
          <td class="label1">To Date:</td>
          <td><input type="date" name="todate" id="todate"  value="<?php echo $today = date("d-m-Y"); ?>" class="text"/></td>
          </tr>
          <tr height="30px">
          <td class="label1">Doctor:</td>
          <td>
          <select name="doctor" id="doctor" class="text" required >
          
          <option value="">Select Doctor</option>
          <?php $sq=mysqli_query($link,"SELECT distinct `doctorname` FROM `patientregister`")or die(mysqli_error($link));
		  while($r=mysqli_fetch_array($sq)){
			  ?> 
          <option value="<?php echo $r['doctorname'];?>"><?php echo $r['doctorname'];?></option>
          <?php }?>
          </select>
         </td>
         
          </tr>
          <tr height="50px">
          <td colspan="2" align="center"><input type="submit" name="submit" value="Report" class="butt" onclick="report();"/> 
          <input type="button" name="but" value="Close" class="butt" onclick="window.location.href='home.php'"/></td>
         
          </tr>
          </table>
          </form>
          </fieldset>
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