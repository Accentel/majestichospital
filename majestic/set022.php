<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT mobile  FROM referal_doctor WHERE refcode = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
 
	  echo ":" . $row[0];
	  
  }
?> 