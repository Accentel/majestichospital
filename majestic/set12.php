<?php
include("config.php");
?>

<?php
$q=$_GET["q"];



$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {

   echo ":" . $row[0];
   $sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
    echo ":" . $sum;
	 
     
  
  }

?> 