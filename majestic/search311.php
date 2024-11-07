<?php
//ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("config.php");
 $q=$_GET["q"];?>

 
 <?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 $sql1 = mysqli_query($link,"select registerdate from patientregister where registerno='$q'");
							$row1 = mysqli_fetch_array($sql1);
						echo	$registerdate = $row1['registerdate'];
							
						
							
							
					
 ?>
