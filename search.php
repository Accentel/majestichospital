<?php
include("connection.php");
 $q=$_GET["q"];

  $a="select name,desc1 from  doctor where name='$q'";
$sq=mysqli_query($link,$a);
while($row=mysqli_fetch_array($sq)){
 $rk=$row['name'];
  $desc1=$row['desc1'];
 
}
echo $rk."#".$desc1;

?> 	

