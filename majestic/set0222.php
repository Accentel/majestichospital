<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT amount,amount  FROM sevices WHERE serv_name = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
 
	  echo ":" . $row[0];
	  echo ":" . $row[1];
	  
  }
?> 