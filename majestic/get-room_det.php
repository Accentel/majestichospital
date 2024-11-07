<?php
include("config.php");

$q=$_GET["q"];
//$roomtype=$_GET['roomtype'];
 $x="SELECT * FROM `roomtype` WHERE ROOMTYPE = '$q'";
$sql1=mysqli_query($link,$x);
$r=mysqli_fetch_array($sql1);
 $id=$r['ROOMTYPE_ID'];

	 $sql="SELECT * FROM `room_tariff` WHERE ROOM_TYPE ='$id'";

$result = mysqli_query($link,$sql);
	
	
	

echo "<select>";
echo "<option value=''>Select  Room No</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option>" . $row['ROOM_NO'] . "</option>";
  }
echo "</select>";
	
	
	//$date=$row['registerdate'];
	//$d=date('Y-m-d',strtotime($date));
	//echo ":" . $d;
	//echo ":" . $row['bed']." .".$row['patientname'];
	//echo ":" . $row['ROOM_NO'];
	//echo ":" . $row['NURSE_FEE']*$q;
	//echo ":" . $row['OTHER_FEE']*$q;
	
	//echo ":" . $d;
	
		
	
	


?>	

