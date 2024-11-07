<?php
include_once("connection.php");
$q=$_GET["q"];
//$itype=$_GET['itype'];

	$sql="SELECT  desc1 FROM doctor WHERE id = '$q'";
	//$result = mysql_query($sql);
	$rsd=mysqli_query($link,$sql) or die(mysqli_error($link));
	foreach($rsd  as $key=>$r){
	//$cname = $rs['registerno'];
	 $amount=  $r['desc1'];
//	echo "$cname\n";
}
	//$row = mysql_fetch_array($result);
	//$amount=$row['amount'];
	echo ":" . $amount;




	
	
	
	

?>	

