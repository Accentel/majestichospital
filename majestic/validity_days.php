<?php 
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
	
	</head>

	<body>

	<div id="conteneur">

		   <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			?>
	<div id="centre">
		  
			
          <h1 style="color:red;" align="center">VALIDITY DETAILS</h1>
			<form action="validity_update.php" method="post" autocomplete="off">
			
					<table width="100%"  style="margin-left:80px;" border="0" cellpadding="4" cellspacing="10">
						
						<?php 
						include("config.php");
						$sq=mysqli_query($link,"select vid,valid_days from validity_days")or die(mysqli_error($link));
						if($sq){
						while($res=mysqli_fetch_array($sq)){
							$vdays=$res['valid_days'];
							$vid = $res['vid'];
							 }
							 }?>
						<tr >
							<td style="padding-left:20px;"></td>
							<td class="label1"><label for="vdays">Valid Days :</label></td>
							<td ><input name="vdays" id="vdays" type="text" class="text" value="<?php echo $vdays ?>"/></td><input type="hidden" value="<?php echo $a6?>" name="id"> 
						</tr>
						<input type="hidden" name="id" value="<?php echo $vid ?>"/>
						
						
						<tr>
							<td colspan="4" style="padding-left:350px;" ><input type="submit" name="submit" class="butt" value="Save"/>&nbsp;<input type="button" class="butt" value="Close" onclick="window.location.href='home.php'"/></td>
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