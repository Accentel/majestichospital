<?php
//include('config.php');
define("HOST_NAME", "localhost");
define("USER", "accentel_clients");
define("PASSWORD", "accentel_clients");
define("DB", "accentel_clients");
$link=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);

?>


<?php 
$client="Majestic Hospital";
								//$d=date('y-m-d');
								 $d = date('Y-m-d', strtotime($day . " +30 days"));
								$sq=mysqli_query($link,"select * from client_list where client='$client'")or die(mysqli_error($link));
							$r=mysqli_fetch_array($sq);
							 $valid=$r['valid'];
							
							
							
							$date1 = new DateTime($d);
$date2 = new DateTime($valid);

 $diff = $date2->diff($date1)->format("%a"); 
							
							if($diff<='30'){
							    echo "Software is going to expiry in $diff days .";
							} else {
							    
							 
						
							}
								?>