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

	</head>

	<body>

	<div id="conteneur container">
		<!--<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		-->	
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
          <h1 style="color:red;" align="center">EDIT DUE PATIENT DETAILS</h1>
         <fieldset style="border:1px solid; height:auto; padding:10px;
          width:auto;">
      <?php 
	  include('config.php');
	  $id=$_REQUEST['pat_no'];
	  $sql=mysqli_query($link,"SELECT cust_name,age,sex,total_amount,(total_amount-paid_amount),sal_date ,if(customer_type='c','Customer','Patient') from due_patients as b ,phr_salent_mast as p where b.lr_no=p.lr_no and id=$id")or die(mysqli_error($link));
	  if($sql){
	  while($row=mysqli_fetch_array($sql)){
	  $cust_name=$row[0];
	  $rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
		while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}
		$age=$row[1];
		$gender=$row[2];
		$saledate=date('d-m-Y', strtotime($row[5]));
		$ctype=$row[6];
		$dueamount=$row[4];
		$tot = $row[3];
		} 
}		
	  ?>    
      <form name="form" method="post" action="due_patient_update.php">
      <table width="100%" class="table" cellspacing="10">
      <tr>
      <td class="label1"><?php echo $ctype ?> Name:</td>
      <td><?php echo $cust_name; ?></td>
      
	  </tr>
      
      <tr>
      <td class="label1">Age:</td>
      <td><?php echo $age; ?></td>
	  </tr>
      
      <tr>
	  <td class="label1">Gender:</td>
      <td><?php echo $gender; ?></td>
      
      </tr>
      
      <tr>
      <td class="label1">Sale Date:</td>
      <td><?php echo $saledate; ?></td>
	 
      </tr>
      
       <tr>
      <td class="label1">Total Amount:</td>
      <td ><?php echo $tot; ?></td>
      </tr>
      <tr>
      <td class="label1">Due Amount:</td>
      <td ><?php echo $dueamount ?></td>
      </tr>
      <tr>	
      <td class="label1">Paid Amount:</td>
      <td><input type="text" class="text" name="bill"  id="bill" /></td>
      </tr>
      <input name="pat_no"  id="pat_no" type="hidden"  value="<?php echo $id ?>"/>
      <tr>
      <td colspan="4" align="center"><input type="submit" name="submit" value="Paid" class="butt"/> <input type="button" name="but" value="Close" class="butt" onclick="window.location.href='duecustomer.php'"/></td>
      </tr>
      </table>
      </form></fieldset>
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