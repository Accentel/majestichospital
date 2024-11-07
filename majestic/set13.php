<?php
include("config.php");
?>
<?php
echo $q=$_GET["q"];

if($q=='OP'){

 $date=date('Y-m-d');
 echo $sql="select * from patientregister where date='$date' and pat_type='OP'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);
echo $cnt=mysqli_num_rows($result)+1;


//while($row = mysql_fetch_array($result))
 // {

   echo ":" ."OP". $cnt;
   //$sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
  //  echo ":" . $sum;
	 
     
  
 // }
  
} elseif($q=='IP') {
	
	
	 $date=date('Y-m-d');
  $sql="select * from patientregister where  pat_type='IP'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);

$cnt=mysqli_num_rows($result)+1;
//while($row = mysql_fetch_array($result))
 // {

   echo ":" ."IP" . $cnt;
   //$sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
  //  echo ":" . $sum;
	 
     
  
 // }
	
	
	

} else if($q=='Lab')  {
	
	
	 $date=date('Y-m-d');
 echo $sql="select * from patientregister where date='$date' and pat_type='Lab'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);

$cnt=mysqli_num_rows($result)+1;
//while($row = mysql_fetch_array($result))
 // {

   echo ":" ."Lab". $cnt;
   //$sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
  //  echo ":" . $sum;
	 
     
  
 // }
	
	
	
}

else if($q=='Hospital')  {
	
	
	 $date=date('Y-m-d');
 echo $sql="select * from patientregister where date='$date' and pat_type='Hospital'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);

$cnt=mysqli_num_rows($result)+1;
//while($row = mysql_fetch_array($result))
 // {

   echo ":" ."HOSP". $cnt;
   //$sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
  //  echo ":" . $sum;
	 
     
  
 // }
	
	
	
}
?> 