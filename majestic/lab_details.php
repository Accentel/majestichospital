<?php 
session_start();

// include('config.php');

if($_SESSION['name1'])

{
	$name=$_SESSION['name1'];

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

	  <?php include('logo.php'); ?>
		<?php
		include("main_menu.php");
		?>
	<div id="centre" class="table-responsive" style="height:auto;">
		  
			
          <h1 style="color:red;" align="center">LAB DETAILS</h1>
			<div style="width:100%" align="center">
            <fieldset style="border:1px solid; height:auto; padding:10px;
          width:auto;">
            <form action="lab_insert.php" method="post" autocomplete="off">
			
					<table  border="0" class="table" cellpadding="4" cellspacing="10">
						
						<?php 
						include("config.php");
						$sq=mysqli_query($link,"select * from lab")or die(mysqli_error($link));
						if($sq){
						while($res=mysqli_fetch_array($sq)){
							$a=$res['labname'];
							$a1=$res['address'];
							$a2=$res['phone'];
							$a3=$res['email'];
							$a4=$res['mobile'];
							$a5=$res['website'];
							$a6=$res['id'];
							 }
							 }?>
						<tr>
							<td></td>
							<td class="label1"><label for="cname">Laboratory Name :</label></td>
							<td><input name="cname" id="cname" type="text" class="text" value="<?php echo $a?>"/></td><input type="hidden" value="<?php echo $a6?>" name="id"> 
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="addr">Address :</label></td>
							<td> <textarea name="addr" class="textarea1" style="width:100%"><?php echo $a1?></textarea>
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="tin">E-mail :</label></td>
							<td> <input name="tin" id="tin" type="email" class="text" value="<?php echo $a3?>"/></td>
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="phone">Phone No :</label></td>
							<td> <input name="phone" id="phone" type="text" class="text" value="<?php echo $a2?>"/></td>
						</tr>
							
						<tr>
							<td></td>
							<td class="label1"><label for="phone">Mobile No :</label></td>
							<td> <input name="mob" id="mob" type="text" class="text" value="<?php echo $a4?>"/></td>
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="phone">Website :</label></td>
							<td> <input name="web" id="web" type="text" class="text" value="<?php echo $a5?>"/></td>
						</tr>
						
						<tr>
							<td colspan="4" align="center" ><input type="submit" name="submit" class="butt" value="Save"/>&nbsp;<input type="button" class="butt" value="Close" onclick="window.location.href='home.php'"/></td>
					   </tr>
					</table>
			</form>
            </fieldset>
            </div>
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