<?php
include("config.php");

$q=$_GET["q"];
//$roomtype=$_GET['roomtype'];
 $x="SELECT * FROM `package` WHERE pkg_name = '$q'";
$sql1=mysqli_query($link,$x);
$r=mysqli_fetch_array($sql1);
 $id=$r['room_type'];
 $amnt=$r['amount'];

	 $sql="SELECT * FROM `roomtype` WHERE ROOMTYPE_ID ='$id'";

$result = mysqli_query($link,$sql);
	
	
	

echo "<select>";
echo "<option value=''>Select  Room Type</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option>" . $row['ROOMTYPE'] . "</option>";
  }
echo "</select>";
	//echo ":" . $amnt;
	//echo ":" . $row['amount'];
	//$date=$row['registerdate'];
	//$d=date('Y-m-d',strtotime($date));
	//echo ":" . $d;
	//echo ":" . $row['bed']." .".$row['patientname'];
	//echo ":" . $row['ROOM_NO'];
	//echo ":" . $row['NURSE_FEE']*$q;
	//echo ":" . $row['OTHER_FEE']*$q;
	
	//echo ":" . $d;
	
		
	
	


?>	

