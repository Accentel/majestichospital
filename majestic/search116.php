<?php
include("config.php");

$q=$_GET["q"];
//$itype=$_GET['itype'];

	$sql="SELECT  amount FROM sevices WHERE serv_name = '$q'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$amount=$row['amount'];
	echo ":" . $amount;




	
	
	
	

?>	

