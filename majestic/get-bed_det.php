<?php
include("config.php");
$q=$_GET["q"];
//$roomtype=$_GET['roomtype'];
 echo $sql="SELECT * FROM `bed_details` WHERE ROOM_NO ='$q' and BED_STATUS='Unreserved'";
$result = mysqli_query($link,$sql) or die(mysqli_error($link));
echo "<select>";
echo "<option value=''>Select  Bed No</option>";
while($row = mysqli_fetch_array($result))
  {
  echo "<option>" . $row['BED_NO'] . "</option>";
  }
echo "</select>";

?>	

