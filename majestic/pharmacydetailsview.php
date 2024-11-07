<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
	$name=$_SESSION['name1'];

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
		include("header.php");
		?>
	</head>

	<body>

	<div id="conteneur container">

		   <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">HOSPITIAL DETAILS VIEW</h1>
		  <table border="0" cellpadding="2" cellspacing="2">
			<tr><td width="68" class="label1"><!--<a href="pharmacydetails.php"><img src="images/add1.gif"></a>--></td></tr>
			</table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" id="expense_table" style="font-size:14px;">
          <tr height="30px">
		  <th>S.No.</th>
          <th>HOSPITIAL NAME</th>
          <th>PHONE NO</th>
          <th>EDIT</th>
          </tr>
          <?php
		  include('config.php');
		  $sql="select *from  pharmacy";
		  $result=mysqli_query($link,$sql) or die(mysqli_error($link));
		  $i=1;
		  while($row=mysqli_fetch_array($result))
		  {
			  
		  ?>
          <tr height="30px">
		  <td align="center"><?php echo $i ?></td>
          <td align="center"><?php echo $row['orgname']; ?></td>
          <td align="center"><?php echo $row['phone']; ?></td>
          <td align="center"><a href="org2.php"><img src="images/edit.gif"/></a></td>
          <?php $i++; }?>
          </tr>
          
          </table>
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