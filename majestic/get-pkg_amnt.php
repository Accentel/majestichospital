<?php
include("config.php");
?>

<?php
$q=$_GET["q"];
$p=$_GET['p1'];

 $sql="SELECT * FROM `roomtype` WHERE ROOMTYPE ='$q'";

$result = mysql_query($sql);
$r1=mysql_fetch_array($result);
$rid=$r1['ROOMTYPE_ID'];

 $x="SELECT * FROM `package` WHERE room_type = '$rid'  and pkg_name='$p'";
$sql1=mysql_query($x);
$r=mysql_fetch_array($sql1);
 $id=$r['amount'];



    echo ":" . $id;
	 
     
  
  

?> 