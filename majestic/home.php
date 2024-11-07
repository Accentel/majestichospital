<?php //include('config.php');
session_start();
if($_SESSION['name1'])
{
$name=$_SESSION['name1'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
	<?php
			include("header.php");
		?>
	</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<body>
    

	<div id="conteneur container">

		  <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			//include("menu/menu.php");
			?>
	<div id="centre">
		  <br />
			
       <!--   <h1 style="color:#06F;" align="center">HOSPITAL MANAGEMENT SYSTEM</h1>-->
          <!--<table align="center" cellspacing="20" border="1" width="700px">
          <tr>
          <td><a href="frontoffice.php"><img src="images/reception_icon.jpg" title="FRONT OFFICE" width="150px" height="150px" />
          <br /><h5 style="color:orange;">FRONT OFFICE</h5></a></td>
          <td><a href="pharmacy.php"><img src="images/pharmacy.jpg" title="PHARMACY" width="150px" height="150px"/>
          <br /><h5 style="color:orange;">PHARMACY</h5></a></td>
          <td><img src="images/laboratory_icon.jpg" title="LABORATORY" width="150px" height="150px"/><br /><h5 style="color:orange;">LABORATORY</h5></td>
          </tr>
           <tr>
          <td><a href="pharmacyemployee.php"><img src="images/employee.png" title="EMPLOYEE" width="150px" height="150px" /><br /><h5 style="color:orange;">EMPLOYEE</h5></a></td>
          <td><img src="images/report.jpg" title="REPORT" width="150px" height="150px"/><br /><h5 style="color:orange;">REPORTS</h5></td>
          <td><a href="admin.php"><img src="images/admin.png" title="ADMIN" width="150px" height="150px"/><br /><h5 style="color:orange;">ADMIN</h5></a></td>
          </tr>
           
          
          </table>--><div align="center">
              <!--<h2 style="color:red;">YOUR SERVER WILL BE EXPIRED 22ND MARCH 2020! KINDLY RENEW TO CONTINUE USE!</h2>-->  
                        
          <img src="images/logo  Final.jpg"  width="50%" height="40%"  /></div>
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